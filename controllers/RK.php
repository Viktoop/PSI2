<?php
/**
 * Milica Soljaga 655/13,Vikor Galino 656/13
 * 
* RK – kontroler klasa za izvrsavanje funkcijonalnosti registrovanog korisnika
*
* @version 1.0
*/
class RK extends CI_Controller {

    /**
    * Kreiranje nove instance
    *
    * @return void
    */
	public function __construct() {
        parent::__construct();
        $this->load->model("ModelKorisnik");
        $this->load->model("ModelKomentar");
        if (($this->session->userdata('username')) == NULL) redirect("Gost");
    }
    
	/**
    * Podesavanja funkcija koja koristi podstranicu
    *
    * @param String $podStranica 
    * @param Data $data
    * @param Integer $subMenu
    *
    * @return void
    *
    */
    public function podesavanja($podStranica="podesavanja-PodaciKorisnika.php", $data = NULL, $subMenu=0){
        $data = $this->getSlika();
		$this->load->view("partials/header.php");
        $this->load->view("podesavanja-prefix.php", array ("subMenu"=>$subMenu));
        $this->load->view($podStranica, array ("data"=>$data));
        $this->load->view("podesavanja-postfix.php");
        $this->load->view("partials/footer.php");
    }

    /**
    * promeni funkcija koja menja sliku korisnika u bazi
    *
    *
    * @return void
    *
    */
    public function promeni(){
        $config['upload_path'] = './img/profil';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']    = '10000';
        $config['max_width']  = '102400';
        $config['max_height']  = '76800';
        $config['overwrite'] = false;

        $this->load->library('upload', $config);
    
        if($this->upload->do_upload("profilnasrc")){
          
            $this->ModelKorisnik->deleteOldImg();
            $fajldata=$this->upload->data();
            $path=$fajldata['file_name'];
            $this->ModelKorisnik->updateProfil($path);
           
        // Za brisanje stare slike ako budemo hteli unlink($file);
        }
        $this->podaci_korisnika();
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
		redirect("Gost");
    }    

    /**
    * podaci_korisnika funkcija koja ucitava podatke korisnika
    *
    *
    * @return void
    *
    */
    public function podaci_korisnika(){
        $this->podesavanja("podesavanja-PodaciKorisnika.php", NULL, 1);
    }

    /**
    * getSlika funkcija koja getuje sliku za ulogovanog korisnika
    *
    *
    * @return String
    *
    */
    public function getSlika(){
        $slika = $this->ModelKorisnik->getSlikaKorisnik($this->session->userdata('idkor'));
        if($slika[0]->AvatarPath != NULL){
            return 'http://localhost/psi/ci/img/profil/'.$slika[0]->AvatarPath;
        }else{
            return 'http://localhost/psi/ci/img/profil/account.jpg';
        }
    }

    /**
    * promeni_lozinku funkcija koja ucitava formu za menjanje lozinke
    *
    *
    * @return void
    *
    */
    public function promeni_lozinku(){
        $this->podesavanja("podesavanja-promenaLozinke", NULL, 3);
    }

    /**
    * promeni_lozinku funkcija koja menja lozinku za ulogovanog korisnika u bazi
    *
    *
    * @return void
    *
    */
    public function promeni_password(){
        $oldpasswordIspravan = $this->ModelKorisnik->promenaPasswordaProvera($this->input->post('oldpass'));
		
		if ($oldpasswordIspravan) {
            $this->changePassIspravan();
            $pass1 = $this->input->post('newpass');
            $pass2 = $this->input->post('confnewpass');
                if ($pass1 != "") {
                    $this->passIspravan();
                    if($pass1 == $pass2){
                        $this->comparePasswordsIspravan();
                        $this->uspesnaPromenaPassworda();
                        $update = $this->ModelKorisnik->updatePassword($this->session->userdata('username'), $pass1);
                        // TODO UBACIVANJE U BAZU I PORUKA O USPEHU
                    }else{
                        $this->uspesnaPromenaPasswordaClear();
                        $this->comparePasswordsGreska();
                    }
                }else{
                    $this->uspesnaPromenaPasswordaClear();
                    $this->passGreska();
                }
		}else{
            $this->uspesnaPromenaPasswordaClear();
            $this->changePassGreska();
        }
        $this->refresh();
    }

    /**
    * refresh funkcija koja menja lozinku za korisnika u bazi
    *
    *
    * @return void
    *
    */
    public function refresh(){
        $this->podesavanja('podesavanja-promenaLozinke.php');
    }

    /**
    * changePassGreska funkcija koja setuje gresku pri unosenju neispravne stare lozinke
    *
    *
    * @return void
    *
    */
    public function changePassGreska(){
        $podaci = "Neispravan stari password!";
        $this->session->set_userdata('oldpassporuka',$podaci);
    }

    /**
    * changePassIspravan funkcija koja unsetuje gresku pri unosenju neispravne stare lozinke
    *
    *
    * @return void
    *
    */
    public function changePassIspravan(){
        $this->session->unset_userdata('oldpassporuka');
    }

    /**
    * comparePasswordsGreska funkcija koja setuje gresku pri unosenju neploklapajucih novih lozinki
    *
    *
    * @return void
    *
    */
    public function comparePasswordsGreska(){
        $podaci = "Ne poklapaju se lozinke!";
        $this->session->set_userdata('comppassgreska',$podaci);
    }
    /**
    * comparePasswordsIspravan funkcija koja unsetuje gresku pri unosenju neploklapajucih novih lozinki
    *
    *
    * @return void
    *
    */
    public function comparePasswordsIspravan(){
        $this->session->unset_userdata('comppassgreska');
    }

    /**
    * passgreska funkcija koja setuje gresku pri unosenju prazne nove lozinke
    *
    *
    * @return void
    *
    */
    public function passGreska(){
        $podaci = "Nova lozinka ne sme biti prazna!";
        $this->session->set_userdata('passgreska',$podaci);
    }

    /**
    * passIspravan funkcija koja unsetuje gresku pri unosenju prazne nove lozinke
    *
    *
    * @return void
    *
    */
    public function passIspravan(){
        $this->session->unset_userdata('passgreska');
    }

    /**
    * uspesnaPromenaPassworda funkcija koja setuje uspesnu promenu pri unosenju nove lozinke
    *
    *
    * @return void
    *
    */
    public function uspesnaPromenaPassworda(){
        $podaci = "Uspesno promenjena lozinka";
        $this->session->set_userdata('uspesnapromena',$podaci);
    }

    /**
    * uspesnaPromenaPasswordaClear funkcija koja unsetuje gresku pri unosenju prazne nove lozinke
    *
    *
    * @return void
    *
    */
    public function uspesnaPromenaPasswordaClear(){
        $this->session->unset_userdata('uspesnapromena');
    }

    /**
    * logous funkcija koja logoutuje korisnika
    *
    *
    * @return void
    *
    */
    public function logout(){
        $this->session->unset_userdata("korisnik");// brise se podatak o autoru iz sesije
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("idkor");
        $this->session->unset_userdata("tip");
        $this->session->sess_destroy(); //brise se sesija
        redirect("Gost");//kako vise nije ulogovan, treba da se ponasa kao sto je definisano u kontroleru gost
    }

    /**
    * upis_komentara funkcija koja upisuje komentar za uo 
    *
    *
    * @return void
    *
    */
    public function upis_komentara(){
        $komentar = $this->input->post('comment');
        $ocena = $this->input->post('ocena');
        $iduo = $this->input->post('uoid');                            //na stranici lokala postoji hidden polje uoid
        $this->ModelKomentar->dodaj_komentar($komentar,$ocena,$iduo);
       // $this->ModelKomentara->ispis_komentara($komentar,$ocena,$iduo);
        redirect("Gost/stranica_lokala/".$iduo);
    }

}
