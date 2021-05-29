<?php
/**
 * Stupar Milos 669/15,Viktor Galindo 655/13
 * 
* Gost – kontroler klasa za izvrsavanje funkcijonalnosti gost korisnika
*
* @version 1.0
*/
class Gost extends CI_Controller {

	/**
    * Kreiranje nove instance
    *
    * @return void
    */
	public function __construct() {
        parent::__construct();
		$this->load->model("ModelKorisnik");
		$this->load->model("ModelLokal");
		$this->load->model("ModelKomentar");
		$this->load->model("ModelSearchKeywords");
	}

	/**
    * prikazi funkcija koja koristi glavni deo stranice za ucitavanje
    *
    * @param String $glavniDeo 
    * @param Data $data
    *
    * @return void
    *
    */
    private function prikazi($glavniDeo=NULL, $data=NULL){
        $this->load->view("partials/header.php");
		if ($glavniDeo != NULL) $this->load->view($glavniDeo, $data);
        $this->load->view("partials/footer.php");
	}
	/**
    * lp funkcija koja salje gosta na landing page
    *
    *
    * @return void
    *
    */
	public function lp(){
		$this->load->view("partials/header_lp.php");
		$this->load->view("lp.php");
		$this->load->view("partials/gost_dp.php");
		$this->load->view("partials/footer.php");
	}

	/**
    * index funkcija koja redirektuje logovanog korisnika na landing page
    *
    *
    * @return void
    *
    *
    */
	public function index(){
		$this->lp();
	}

	/**
    * o_nama funkcija koja poziva funkciju prikazi za stranicu o nama
    *
    *
    * @return void
    *
    */
	public function o_nama(){
		$this->prikazi("onama.php");
	}

	/**
    * napredna_pretraga funkcija koja poziva funkciju prikazi za naprednu pretragu
    *
    *
    * @return void
    *
    */
	public function napredna_pretraga(){
		$this->prikazi("naprednaPretraga.php");
	}

	/**
    * login funkcija koja poziva funkciju prikazi za login formu
    *
    *
    * @return void
    *
    */
	public function login(){
		$this->prikazi("login.php");
	}
	
	/**
    * kontakt funkcija koja poziva funkciju prikazi za kontakt stranicu
    *
    *
    * @return void
    *
    */
	public function kontakt(){
		$this->prikazi("kontakt.php");
	}

	/**
    * loginGreska funkcija koja setuje poruku o neispravnim podacima prilikom logina 
    *
    *
    * @return void
    *
    */
	public function loginGreska(){
		$podaci['poruka'] = "Neispravni podaci!";
		$this->prikazi('login.php',$podaci);
	}

	/**
    * ulogujse funkcija koja vrsi logovanje korisnika na sistem
    *
    *
    * @return void
    *
    */
	public function ulogujse(){
		$korisnikPostoji = $this->ModelKorisnik->korisnikPostoji($this->input->post('username'));
		
		if ($korisnikPostoji) {
			$passwordIspravan = $this->ModelKorisnik->ispravanPassword($this->input->post('password'));
			if ($passwordIspravan){
				$korisnik = $this->ModelKorisnik->korisnik;
				$this->session->set_userdata('idkor',$korisnik->IDKorisnik);
				$this->session->set_userdata('username',$korisnik->Username);
				$this->session->set_userdata('tip',$korisnik->Tip);
				redirect("Gost");
			}
		}
		$this->loginGreska();
	}

	/**
    * rezultat_pretrage funkcija koja poziva stranicu rezultata pretrage
    *
    *
    * @return void
    *
    */
	public function rezultat_pretrage(){
        $this->prikazi("rezultatPretrage.php");
	}


	/**
    * stranica_lokala funkcija koja otvara stranicu lokala za odredjeni iduo
    *
	* @param Integer $iduo
	*
    * @return void
    *
    */
	public function stranica_lokala($IDUO=NULL){
		$this->load->view("partials/header.php");
		$this->load->view("galerija.php");
		
		if ( $IDUO!=NULL ){
			#Ucitavanje podataka za prikaz na stranici
			$uoData = $this->ModelLokal->getUO($IDUO);
			if($uoData == NULL) redirect(site_url());
			$tagovi = $this->ModelLokal->dohvatiTagoveUO($IDUO);
			$slike = $this->ModelLokal->citajSlike($IDUO);
			$postoji_kom = $this->ModelKomentar->dohvatiKomentareZaUO($IDUO);
			$this->load->view("stranicaLokala.php", array ("data"=>$uoData, "tagovi"=>$tagovi , "slika"=>$slike, "komentari"=>$postoji_kom));
		}else 
			$this->load->view("stranicaLokala.php");
		
		
		#Ucitavanje komentara
		if ($IDUO != NULL){
			$komentari = $this->ModelKomentar->dohvatiKomentareZaUO($IDUO);
			if($this->session->userdata("tip") == 'admin'){
				foreach ( $komentari as $komentar ) {
					$this->load->view("partials/komentar-admin.php", (array)$komentar);
				}
			}else{
				foreach ( $komentari as $komentar ){
					$this->load->view("partials/komentar.php",  (array)$komentar);
				}
			}
		}
	
		#Ucitavanje forme za ostavljanje komentara
		if ($this->session->userdata("tip") != NULL) {
			$this->load->view("partials/link-stranicaLokala-Komentari.php", array("ID" => $IDUO));
		}

		$this->load->view("partials/footer.php");

	}

	/**
    * registracija funkcija koja otvara stranicu za registraciju korisnika
    *
    *
    * @return void
    *
    */
	public function registracija(){
		$this->prikazi("register.php");
	}


	/**
    * registerGreska funkcija koja proverava podatke pri registraciji
    *
	* @param String $tip
	* @param Data $data
	*
    * @return void
    *
    */
	public function registerGreska($tip, $data){
		$podaci = [];
		if (isset($tip['username'])){
			if ($tip['username'] == 'empty') $poruka['username']   = "Polje ne sme biti prazno!";
			if ($tip['username'] == 'postoji') $poruka['username'] = "Korisnik sa unetim username vec postoji!";
		}		

		if (isset($tip['emptypass'])) $poruka['password']   = "Polje ne sme biti prazno!";

		if (isset($tip['confirm'])){
			if ($tip['confirm'] == 'empty') 	$poruka['confirm']   = "Polje ne sme biti prazno!";
			if ($tip['confirm'] == 'razlicito') $poruka['confirm']   = "Unete sifre se razlikuju";
		}	
		
		$this->prikazi('register.php', array ('data'=>$data, 'poruka'=>$poruka));
	}

	/**
    * reg funkcija koja vrsi validaciju forme za registraciju
    *
    *
    * @return void
    *
    */
	public function reg(){
		// VALIDACIJA FORME
		$error = [];
		$data  = [];

		if (!$this->input->post('username')) $error['username'] = "empty";
		else $data['username'] = $this->input->post('username');

		if (!$this->input->post('password')) $error['emptypass'] = TRUE;
		else $data['password'] = $this->input->post('password');

		if (!$this->input->post('passwordconfirm'))	$error['confirm'] = "empty";

		if ( $this->input->post('passwordconfirm') != $this->input->post('password')) $error['confirm'] = "razlicito";

		$korisnikPostoji = $this->ModelKorisnik->korisnikPostoji($this->input->post('username'));
		if ($korisnikPostoji) $error['username'] = "postoji";

		if ( count($error) > 0 ) $this->registerGreska($error, $data);
		else {
			//Ubacivanje u bazu
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$confirmpass = $this->input->post('passwordconfirm');
			$tip = $this->input->post('tipKorisnika');

			$this->ModelKorisnik->dodajKorisnika($username, $password, $tip);

			$this->load->view("partials/header.php");
			$this->load->view("partials/poruka-register.php");
			$this->load->view("partials/footer.php");

			header('Refresh: 3; URL=http://localhost/psi/ci/index.php/Gost/login');
		}
	}
	
	/**
	* naprednaPretraga funkcija nalazi ugostiteljske objekte koji odgovaraju parametrima pretage 
	* i vraca JSON sa poljem za broj rezultata i poljem sa HTML-om za prikaz rezultata nadjenih UO
    *
    *
    * @return JSON
    *
    */
	public function naprednaPretraga(){
		$values = $this->pokupiPodatke();
		
		$pice = $values[0];
		$hrana = $values[1];
		$ambijent = $values[2];
		$ekstra = $values[3];

		$response = (object) array('count'=> 0, 'data' => '');

		$query = $this->ModelLokal->naprednaPretragaLokala($pice,$hrana,$ambijent,$ekstra);
		
		foreach($query->result() as $uoData){
			if( ($uoData->Pice & $pice) >= 0 || ($uoData->Hrana & $hrana) >= 0 || ($uoData->Ambijent & $ambijent) >= 0 || ($uoData->Ekstra & $ekstra) >= 0){
				if($uoData->Vidljivost != 0){
					$response->count++;
					$tagovi = $this->ModelLokal->dohvatiTagoveUO($uoData->IDUO);
					$slike = $this->ModelLokal->citajSlike($uoData->IDUO);
					$response->data .= $this->load->view("partials/rezultat_pretrage_lokal_box.php", array ("data"=>$uoData, "tagovi"=>$tagovi, "slika"=>$slike), true);
				}
			}
		}
		if ($response->count) {
			$response->data = $this->load->view("rezultat_pretrage_prefix.php", '', true).$response->data.$this->load->view("rezultat_pretrage_postfix.php",'',true);
		}
		echo json_encode($response);
	}

	/**
    * pokupiPodatke funkcija koja kupi podatke sa stranice za naprednu pretragu
    *
    *
    * @return Array
    *
    */
	public function pokupiPodatke(){
		$pice1 = $this->input->post('s1v1');
        $pice2 = $this->input->post('s1v2');
        $pice3 = $this->input->post('s1v3');
        $pice4 = $this->input->post('s1v4');
        $pice5 = $this->input->post('s1v5');
        $pice6 = $this->input->post('s1v6');
        $pice7 = $this->input->post('s1v7');
		$pice8 = $this->input->post('s1v8');
		
		$hrana1 = $this->input->post('s2v1');
        $hrana2 = $this->input->post('s2v2');
        $hrana3 = $this->input->post('s2v3');
        $hrana4 = $this->input->post('s2v4');
        $hrana5 = $this->input->post('s2v5');
        $hrana6 = $this->input->post('s2v6');
        $hrana7 = $this->input->post('s2v7');
		$hrana8 = $this->input->post('s2v8');
		
		$ambijent1 = $this->input->post('s3v1');
        $ambijent2 = $this->input->post('s3v2');
        $ambijent3 = $this->input->post('s3v3');
        $ambijent4 = $this->input->post('s3v4');
        $ambijent5 = $this->input->post('s3v5');
        $ambijent6 = $this->input->post('s3v6');
        $ambijent7 = $this->input->post('s3v7');
		$ambijent8 = $this->input->post('s3v8');
		
		$ekstra1 = $this->input->post('s4v1');
        $ekstra2 = $this->input->post('s4v2');
        $ekstra3 = $this->input->post('s4v3');
        $ekstra4 = $this->input->post('s4v4');
        $ekstra5 = $this->input->post('s4v5');
        $ekstra6 = $this->input->post('s4v6');
        $ekstra7 = $this->input->post('s4v7');
		$ekstra8 = $this->input->post('s4v8');
		
		$pice = $pice1 + $pice2 + $pice3 + $pice4 + $pice5 + $pice6 + $pice7 + $pice8;
		$hrana = $hrana1 + $hrana2 + $hrana3 + $hrana4 + $hrana5 + $hrana6 + $hrana7 + $hrana8;
		$ambijent = $ambijent1 + $ambijent2 + $ambijent3 + $ambijent4 + $ambijent5 + $ambijent6 + $ambijent7 + $ambijent8;
		$ekstra = $ekstra1 + $ekstra2 + $ekstra3 + $ekstra4 + $ekstra5 + $ekstra6 + $ekstra7 + $ekstra8;

		return $values = array($pice,$hrana,$ambijent,$ekstra);
		
	}

	/**
    * pretragaRestorani funkcija koja ucitava stranicu pretrage na restorane
    *
    *
    * @return void
    *
    */
	public function pretragaRestorani(){
		$this->load->view("partials/header.php");
		$this->load->view("rezultat_pretrage_prefix.php");

		$query = $this->ModelLokal->getRestorani();

		foreach($query->result() as $uoData){
			if($uoData->Vidljivost == 1){
				$tagovi = $this->ModelLokal->dohvatiTagoveUO($uoData->IDUO);
				$slike = $this->ModelLokal->citajSlike($uoData->IDUO);
				$this->load->view("partials/rezultat_pretrage_lokal_box.php", array ("data"=>$uoData, "tagovi"=>$tagovi, "slika"=>$slike));
			}
		}	
        $this->load->view("rezultat_pretrage_postfix.php");
        $this->load->view("partials/footer.php");
	}

	/**
    * pretragaKafici funkcija koja ucitava stranicu pretrage na kafice
    *
    *
    * @return void
    *
    */
	public function pretragaKafici(){
		$this->load->view("partials/header.php");
		$this->load->view("rezultat_pretrage_prefix.php");

		$query = $this->ModelLokal->getKafici();
		foreach($query->result() as $uoData){
			if($uoData->Vidljivost == 1){
				$tagovi = $this->ModelLokal->dohvatiTagoveUO($uoData->IDUO);
				$slike = $this->ModelLokal->citajSlike($uoData->IDUO);
				$this->load->view("partials/rezultat_pretrage_lokal_box.php", array ("data"=>$uoData, "tagovi"=>$tagovi, "slika"=>$slike));
			}
		}	
        $this->load->view("rezultat_pretrage_postfix.php");
        $this->load->view("partials/footer.php");
	}

	/**
    * pretragaBrzaHrana funkcija koja ucitava stranicu pretrage na brzu hranu
    *
    *
    * @return void
    *
    */
	public function pretragaBrzaHrana(){
		$this->load->view("partials/header.php");
		$this->load->view("rezultat_pretrage_prefix.php");

		$query = $this->ModelLokal->getBrzaHrana();
		foreach($query->result() as $uoData){
			if($uoData->Vidljivost == 1){
				$tagovi = $this->ModelLokal->dohvatiTagoveUO($uoData->IDUO);
				$slike = $this->ModelLokal->citajSlike($uoData->IDUO);
				$this->load->view("partials/rezultat_pretrage_lokal_box.php", array ("data"=>$uoData, "tagovi"=>$tagovi, "slika"=>$slike));
			}
		}
        $this->load->view("rezultat_pretrage_postfix.php");
        $this->load->view("partials/footer.php");
	}	


	/**
    * ispis_komentara funkcija koja ucitava komentare za neki uo
    *
    *
    * @return void
    *
    */
    public function ispis_komentara(){
	   $query = $this->ModelKomentar->nadji_komentar(1);
	   foreach($query->result() as $row){
		   //echo $row->komentar;
		   $data['username'] = $row->username;
		   $data['ocena'] = $row->ocena;
		   $data['komentar'] = $row->komentar;

		   $this->load->view("partials/komentari.php", $data);
		}
	}

	/**
    * prosecna_ocena funkcija koja ucitava prosecnu ocenu za odredjeni lokal
    *
    *
    * @return void
    *
    */
	public function prosecna_ocena(){
		$avg['ocena'] = $this->ModelKomentar->doh_avg_ocena(1);
		//echo $avg;
		$this->load->view("partials/komentari-prefix.php", $avg);
	}

	/**
    * pretragaKeyWords funkcija koja pretrazuje ugostiteljski objekat za unete reci
    *
    *
    * @return void
    *
    */
	public function pretragaKeyWords(){
		$data = $this->input->post('pretraga');
		if (!$data) redirect(site_url());
		$data = $this->ModelSearchKeywords->izbaciZnakoveInterpunkcije($data);
		$words = $this->ModelSearchKeywords->podeliUReci($data);
		$nizUO = $this->ModelSearchKeywords->dohvatiNizUOSaRecima($words);

		$this->load->view("partials/header.php");
		$this->load->view("rezultat_pretrage_prefix.php");

		$niJedan = true;

		if ($nizUO){
			foreach($nizUO as $key => $UO) {
				$uoData = $this->ModelLokal->getUO($UO);
				if (!$uoData->Vidljivost) continue;
				$niJedan = false;
				$tagovi = $this->ModelLokal->dohvatiTagoveUO($UO);
				$slike = $this->ModelLokal->citajSlike($uoData->IDUO);
				$this->load->view("partials/rezultat_pretrage_lokal_box.php", array ("data"=>$uoData, "tagovi"=>$tagovi, "slika"=>$slike));
			}
		}else $this->load->view("partials/pretraga-nema-rezultata.php");
		
		if ($nizUO && $niJedan) $this->load->view("partials/pretraga-nema-rezultata.php");
		$this->load->view("rezultat_pretrage_postfix.php");
		if (!$nizUO || $niJedan) $this->load->view("partials/gost_dp.php");
        $this->load->view("partials/footer.php");
	}

}
