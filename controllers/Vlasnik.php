<?php
/**
 * 
 * Lazar Ristic 0658/15,Milos Stupar 0669/15
 * 
* Vlasnik – kontroler klasa za izvrsavanje vlasnik funkcijonalnosti
*
* @version 1.0
*/
class Vlasnik extends CI_Controller {
    /**
     * @var Integer $pice 
     * @var Integer $jela 
     * @var Integer $mesto 
     * @var Integer $ostalo 
     */
    public $pice;
    public $jela;
    public $mesto;
    public $ostalo;

    /**
    * Kreiranje nove instance
    *
    * @return void
    */
	public function __construct() {
        parent::__construct();

        #MODELI
        $this->load->model("ModelLokal");
        $this->load->model("ModelSearchKeywords");
        
        
        $this->pice=0;
        $this->jela=0;
        $this->mesto=0;
        $this->ostalo=0;
      

        // PRISTUP DOZVOLJEN SAMO AKO JE USER TIP VLASNIK
        if (($this->session->userdata('username')) == NULL) redirect("Gost");
        if (($this->session->userdata('tip')) != 'vlasnik' && ($this->session->userdata('tip')) != 'admin') redirect("Gost");
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
        $this->load->view("podesavanja-prefix.php", array ("data"=>$data));
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
    * spisak_uo funkcija koja ucitava spisak svih ugostiteljskih objekata ulogovanog vlasnika
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
        $uoList = $this->ModelLokal->getUoZaIDVlasnika($this->session->userdata('idkor'));
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
    * dodaj_uo funkcija koja otvara stranicu sa formom za kreiranje uo i upadte uo. Ako je iduo postavljen radi update uo u suprotnom insert
    *
    * @param Intreger $iduo=NULL
    * @return void
    *
    *
    */

    public function dodaj_uo($iduo=NULL){
        $data_uo['id']=$iduo;
        $tag=[];
        $slike=[];
        if($iduo == NULL){           //insert uo
            $this->load->view("partials/header.php");
            $this->load->view("podesavanja-prefix.php",array("subMenu"=> 2));
            $this->load->view("podesavanja-FormaPodaciUO.php", array ("data"=>$data_uo, "tag"=>$tag,"slika"=>$slike ));
            $this->load->view("podesavanja-postfix.php");
            $this->load->view("partials/footer.php");
        }else{
            $je_vlasnik=$this->ModelLokal->je_vlasnik($iduo,$this->session->userdata('username'));
            if(!$je_vlasnik && $this->session->userdata('tip') != 'admin' ) redirect("Gost");
            $data_uo=array_merge($data_uo,$this->ModelLokal->citajUO($iduo));
        
            $slike=$this->ModelLokal->citajSlike($iduo);
            //print_r($slike);
            $tagovi = $this->ModelLokal->citajPHAE($iduo);
            
            $tag['pice']=$tagovi[0];
            $tag['hrana']=$tagovi[1];
            $tag['ambijent']=$tagovi[2];
            $tag['ekstra']=$tagovi[3];

            $this->load->view("partials/header.php");
            $this->load->view("podesavanja-prefix.php",array("subMenu"=> 2));
            $this->load->view("podesavanja-FormaPodaciUO.php", array ("data"=>$data_uo, "tag"=>$tag, "slika"=>$slike));
            $this->load->view("podesavanja-postfix.php");
            $this->load->view("partials/footer.php");
 
        }
    }

    
    /**
    * calculateInt funkcija koja izracunava int vrednost selektovanih tagova 
    *
    * @param Integer $d1
    * @param Integer $d2
    * @param Integer $d3
    * @param Integer $d4
    * @param Integer $d5
    * @param Integer $d6
    * @param Integer $d7
    * @param Integer $d8
    *
    * @return Integer 
    *
    */
    public function calculateInt($d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8){
        $sum=0;
        if((int)$d1==1) $sum=$sum+1;
        if((int)$d2==1) $sum=$sum+2;
        if((int)$d3==1) $sum=$sum+4;
        if((int)$d4==1) $sum=$sum+8;
        if((int)$d5==1) $sum=$sum+16;
        if((int)$d6==1) $sum=$sum+32;
        if((int)$d7==1) $sum=$sum+64;
        if((int)$d8==1) $sum=$sum+128;
        return $sum;
    }

    /**
    * odbaci funkcija koja odbacuje unete podatke u formi za kreiranje uo i vraca na stranicu spisak_uo 
    *
    *
    * @return void
    *
    *
    */
    public function odbaci(){
        redirect("Vlasnik/spisak_uo");
    }

    /**
    * UbaciSliku funkcija uploaduje sliku sa zadatim imenom na server 
    *
    * @param Integer $br
    *
    * @return String 
    *
    *
    */
    public function UbaciSliku($br){
        $sl="slika".$br;
        $config['upload_path'] = './img/uo';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']    = '10000';
        $config['max_width']  = '102400';
        $config['max_height']  = '76800';
        $config['overwrite'] = false;

        $this->load->library('upload', $config);
    
        if($this->upload->do_upload($sl)){
            $fajldata=$this->upload->data();
            return $path=$fajldata['file_name'];
        }else{
        //ispisivanje greske u slucaju da nije ucitao
        }
    }

    /**
    * UbaciSlike funkcija koja vadi slike sa forme za kreiranje uo i poziva UbaciSliku za svaku 
    *
    *
    * @return Array
    *
    *
    */
    public function UbaciSlike(){
        $data=array();
        for ($i = 1; $i <= 9; $i++) {
            
            if ($pom=$this->UbaciSliku($i)) $data[$i] = $pom;
        }
        return $data;
    }

    
    /**
    * ubaciUO funkcija koja ubacuje podatke u bazu sa forme za UO ili upadejtuje ako je prosledjen paramatar 
    *
    * @param Integer $newID=NULL
    * @return void
    *
    *
    */
    public function ubaciUO($newID=NULL){
        if (isset($_POST['sacuvaj'])) {
            # Publish-button was clicked

            $naziv = $this->input->post('naziv');
            
            $adresa = $this->input->post('adresa');
            $mapa = $this->input->post('mapa');

            $restoran = $this->input->post('restoran');
            $kafic = $this->input->post('kafic');
            $brza = $this->input->post('brza');

            $ponpetOd = $this->input->post('ponpetOd');
            $ponpetDo = $this->input->post('ponpetDo');
         

            $subOd = $this->input->post('subOd');
            $subDo = $this->input->post('subDo');
            
            $nedOd = $this->input->post('nedOd');
            $nedDo = $this->input->post('nedDo');

            $ponpet = $ponpetOd . "-" . $ponpetDo;
            $subota = $subOd. "-" . $subDo;
            $nedelja = $nedOd . "-" . $nedDo;
      
            // if($ponpet=="00-00") $ponpet=NULL;
            // if($subota=="00-00") $subota=NULL;
            // if($nedelja=="00-00") $nedelja=NULL;

            $pice1 = $this->input->post('craft');
            $pice2 = $this->input->post('kafaspec');
            $pice3 = $this->input->post('zestina');
            $pice4 = $this->input->post('vina');
            $pice5 = $this->input->post('kokteli');
            $pice6 = $this->input->post('vitaminski');
            $pice7 = $this->input->post('likeri');
            $pice8 = $this->input->post('bezalkoholna');


            $jela1 = $this->input->post('kuvana');
            $jela2 = $this->input->post('dnevni');
            $jela3 = $this->input->post('rostilj');
            $jela4 = $this->input->post('pizza');
            $jela5 = $this->input->post('salate');
            $jela6 = $this->input->post('pecenje');
            $jela7 = $this->input->post('sushi');
            $jela8 = $this->input->post('sendvici');

            $mesto1= $this->input->post('basta');
            $mesto2 = $this->input->post('pogled');
            $mesto3 = $this->input->post('reka');
            $mesto4 = $this->input->post('centar');
            $mesto5 = $this->input->post('balkon');
            $mesto6 = $this->input->post('svirka');
            $mesto7 = $this->input->post('chill');
            $mesto8 = $this->input->post('splav');

            $ostalo1 = $this->input->post('wifi');
            $ostalo2 = $this->input->post('pet');
            $ostalo3 = $this->input->post('parking');
            $ostalo4 = $this->input->post('baby');
            $ostalo5 = $this->input->post('nosmoking');
            $ostalo6 = $this->input->post('dostava');
            $ostalo7 = $this->input->post('happy');
            $ostalo8 = $this->input->post('tv');

            $slika1 = $this->input->post('slika1');
            $slika2 = $this->input->post('slika2');
            $slika3 = $this->input->post('slika3');
            $slika4 = $this->input->post('slika4');
            $slika5 = $this->input->post('slika5');
            $slika6 = $this->input->post('slika6');
            $slika7 = $this->input->post('slika7');
            $slika8 = $this->input->post('slika8');
            $slika9 = $this->input->post('slika9');

            $slike=[];
            array_push($slike, $slika1);
            array_push($slike, $slika2);
            array_push($slike, $slika3);
            array_push($slike, $slika4);
            array_push($slike, $slika5);
            array_push($slike, $slika6);
            array_push($slike, $slika7);
            array_push($slike, $slika8);
            array_push($slike, $slika9);
            // print_r($slike);
            // die();

            $opis = $this->input->post('opis');
            $samenija = $this->input->post('samenija');
            $razlike = $this->input->post('razlike');
            $zasto= $this->input->post('zasto');
          

            $this->pice=$this->calculateInt($pice1,$pice2,$pice3,$pice4,$pice5,$pice6,$pice7,$pice8);
            $this->jela=$this->calculateInt($jela1,$jela2,$jela3,$jela4,$jela5,$jela6,$jela7,$jela8);
            $this->mesto=$this->calculateInt($mesto1,$mesto2,$mesto3,$mesto4,$mesto5,$mesto6,$mesto7,$mesto8);
            $this->ostalo=$this->calculateInt($ostalo1,$ostalo2,$ostalo3,$ostalo4,$ostalo5,$ostalo6,$ostalo7,$ostalo8);

            if($newID==null){
                $newID = $this->ModelLokal->insertUO($naziv,$adresa,$mapa,$restoran,$kafic,$brza,$ponpet,$subota,$nedelja, $this->pice,$this->jela,$this->mesto,$this->ostalo,$opis,$samenija,$razlike,$zasto);
                $data=$this->UbaciSlike();

                $this->ModelLokal->insertUoImg($data,$newID);
            }
            else{
                $this->ModelLokal->updateUO($newID,$naziv,$adresa,$mapa,$restoran,$kafic,$brza,$ponpet,$subota,$nedelja,$opis,$samenija,$razlike,$zasto,$this->pice,$this->jela,$this->mesto,$this->ostalo);
                $this->ModelLokal->update_uoslike($this->UbaciSlike(),$newID);
            }

            #Generise keywords za dati UO i ubaci u bazu
            $this->ModelSearchKeywords->generisiKeywordsZaUO($newID);
         
            if($this->session->userdata("tip") == 'admin') redirect("Admin/spisak_uo");
            redirect("Vlasnik/spisak_uo");
         }

        elseif (isset($_POST['odbaci'])) {
            if($this->session->userdata("tip") == 'admin') redirect("Admin/spisak_uo");
            redirect("Vlasnik/spisak_uo");
        }

    }

    /**
    * postavi_vidljiva funkcija koja setuje polje JeVidljiva za UO u bazi na 1 
    *
    * @param Integer $iduo
    *
    * @return void
    *
    *
    */
    public function postavi_vidljiva($iduo){
        $this->ModelLokal->setVidljiva($iduo);
        if($this->session->userdata("tip") == 'admin') redirect("Admin/spisak_uo");
        redirect('Vlasnik/spisak_uo');
    }

    /**
    * psotavi_privatna funkcija koja setuje polje JeVidljiva za Uo u bazi na 0 
    *
    * @param Integer $iduo
    *
    * @return void
    *
    *
    */
    public function postavi_privatna($iduo){
        $this->ModelLokal->setPrivatna($iduo);
        if($this->session->userdata("tip") == 'admin') redirect("Admin/spisak_uo");
        redirect('Vlasnik/spisak_uo');
    }

    /**
    * brisi_UO funkcija koja brise ugostiteljki objekat iz baze 
    *
    * @param Integer $iduo
    *
    * @return void
    *
    *
    */
    public function brisi_UO($iduo){
        $this->ModelSearchKeywords->obrisiKeyWordsZaUO($IDUO);
        $this->ModelLokal->deleteUO($iduo);
        if($this->session->userdata("tip") == 'admin') redirect("Admin/spisak_uo");
        redirect("Vlasnik/spisak_uo");
    }

}
