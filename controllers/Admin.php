<?php
/**
 * Lazar Ristic 0658/15
 * 
* Admin – kontroler klasa za izvrsavanje admin funkcijonalnosti
*
* @version 1.0
*/
class Admin extends CI_Controller {

    /**
    * Kreiranje nove instance
    *
    * @return void
    */
	public function __construct() {
        parent::__construct();

        $this->load->model("ModelLokal");
        $this->load->model("ModelKomentar");
        $this->load->model("ModelSearchKeywords");
        
        // PRISTUP DOZVOLJEN SAMO AKO JE USER TIP VLASNIK
        if (($this->session->userdata('username')) == NULL) redirect("Gost");
        if (($this->session->userdata('tip')) != 'admin') redirect("Gost");
	}
	/**
    * Podesavanja funkcija koja koristi podstranicu
    *
    * @param String $podStranica String
    *
    * @return void
    *
    */

    public function podesavanja($podStranica="podesavanja-PodaciKorisnika.php"){
		$this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php");
        $this->load->view($podStranica);
        $this->load->view("podesavanja-postfix.php");
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
        redirect(Gost);
    }

    /**
    * spisak_uo funkcija koja ucitava spisak svih ugostiteljskih objekata 
    *
    *
    * @return void
    *
    *
    */
    public function spisak_uo(){
        // ucitavanje prefiksa 
        $this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php", array("subMenu"=> 2));
        $this->load->view("partials/podesavanja-spisakUO-prefiks.php");

        // for each iz dohvacenog iz baze load view partial/single uo izlistan
        $uoList = $this->ModelLokal->getAllUO();
        foreach ($uoList as $uo){
            $this->load->view("partials/podesavanja-spisakUO-single-uo.php", array ("data"=>$uo));
        }

        //ucitavanje midfixa
        $this->load->view("partials/podesavanja-spisakUO-midfix.php");

        //foreach ispisivanje vidljivosti lokala
        foreach($uoList as $uo){
            if($uo->Odobren == 1) {
                $this->load->view("partials/podesavanja-spisakUO-single-status.php", array ("data"=>$uo));
            }else{
                $this->load->view("partials/podesavanja-spisakUO-single-odobrenje.php");
            }
        }

        //ucitavanje postfixa 
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }

    /**
    * stranice_na_cekanju funkcija koja ucitava spisak svih uo koji cekaju odobrenje
    *
    *
    * @return Response
    *
    *
    */
    public function stranice_na_cekanju(){
        // ucitavanje prefiksa 
        $this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php", array("subMenu"=> 4));
        $this->load->view("partials/podesavanja-odobri-stranicu-prefix.php");

        $uonacekanju = $this->ModelLokal->getLokaliNaCekanju();

        foreach ($uonacekanju as $uo){
            $this->load->view("partials/podesavanja-odobrenje-single-uo.php", array ("data"=>$uo));
        }

        //ucitavanje postfixa 
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }

    /**
    * odobri_stranicu funkcija koja koristi iduo i u bazi setuje odobrenost na 1 
    *
    * @param Integer $iduo Integer
    *
    * @return void
    *
    *
    */
    public function odobri_stranicu($iduo){
        $this->ModelLokal->updateOdobren($iduo);
        redirect('Admin/stranice_na_cekanju');
    }

    /**
    * obrisi_komentar funkcija koja koristi idkom i iduo za brisanje komentara 
    *
    * @param Integer $idkom Integer
    * @param Integer $iduo Integer
    *
    * @return void
    *
    *
    */
    public function obrisi_komentar($idkom, $iduo){
        $this->ModelKomentar->deleteKomentar($idkom,$iduo);
        redirect('Gost/stranica_lokala/'.$iduo);
    }

	/**
    * generisiKeyWordsZaUo POMOCNA FUNKCIJA ZA MANUELNO GENERISANJE KEYWORDS ZA UO KOJI SU VEC U BAZI
    *
    * @param Integer $IDUO Integer
    *
    * @return void
    *
    */
	public function generisiKeyWordsZaUO($IDUO=NULL){
		if ($IDUO){
			$this->ModelSearchKeywords->generisiKeywordsZaUO($IDUO);
		}
	}

	
	/**
    * initKeyWordsAll POMOCNA FUNKCIJA ZA MANUELNO GENERISANJE KEYWORDS ZA SVE UO KOJI SU U BAZI
    *
    *
    * @return void
    *
    */
	public function initKeywordsAll(){
        echo '<br>initKeywordsAll() : STATUS<br><br>';
        $this->ModelSearchKeywords->obrsiSVE();
        echo "Obrisani svi KeyWords i veze za sve UO iz baze.<br><br>";
		$lokali = $this->ModelLokal->dohvatiIDSvihUO();
        foreach ($lokali as $lokal) {
            echo "Generisani KeyWords i veze sa UO za IDUO = ".$lokal->IDUO."<br>";
            $this->ModelSearchKeywords->generisiKeywordsZaUO($lokal->IDUO);
        }
        echo "<br>All done...";
	}

}
