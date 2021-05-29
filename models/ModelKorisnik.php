<?php
/**
 * Viktor Galindo 655/13
 * 
* ModelKorisnik – model klasa za pristup bazi i izvrsavanje RK funkcionalnosti
*
* @version 1.0
*/
class ModelKorisnik extends CI_Model {
    public $korisnik;
   	/**
    * Kreiranje nove instance
    *
    * @return void
    */
    public function __construct() {
        parent::__construct();
        $this->korisnik=NULL;
    }
    /**
    * promenaPasswordaProvera funkcija koja proverava da li se podudaraju zadata lozinka i lozinka trenutnog ulogovanog korisnika
    *
    * @param String $oldpass
    *
    * @return Boolean
    *
    */    
    public function promenaPasswordaProvera($oldpass){
        $username = $this->session->userdata("username");
        $result=$this->db->where('username',$username)->get('korisnik');
        $korisnik=$result->row();

        if($korisnik->Password == $oldpass){ 
           return TRUE;
        }else{
            return FALSE;
        }
    }
    /**
    * korisnikPostoji funkcija koja proverava da li postoji korisnik sa zadatim username
    *
    * @param String $username
    *
    * @return Boolean
    *
    */ 
    public function korisnikPostoji($username){
        $result=$this->db->where('username',$username)->get('korisnik');
        $korisnik=$result->row();
        if ($korisnik!=NULL) {
            $this->korisnik=$korisnik;
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /**
    * ispravanPassword funkcija koja proverava da li je unet korektan password
    *
    * @param String $username
    *
    * @return Boolean
    *
    */ 
    public function ispravanPassword($password){
        if ($this->korisnik->Password == $password) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /**
    * dodajKorisnika funkcija koja insertuje u bazu novog korisnika
    *
    * @param String $username
    * @param String $password
    * @param String $tip
    *
    * @return void
    *
    */ 
    public function dodajKorisnika($username, $password, $tip){
        $this->db->set("Username", $username);
        $this->db->set("Password", $password);
        $this->db->set("Tip", $tip);
        $this->db->insert("korisnik");
    }
    /**
    * updatePassword funkcija koja menja username i password korisniku
    *
    * @param String $username
    * @param String $password
    *
    * @return void
    *
    */ 
    function updatePassword($username,$password){
        // $query=$this->db->query("update Korisnik SET Password='$password' where Username='".$username."'");
        $data = array( 'Password' => $password );
        $this->db->where('Username', $username);
        $this->db->update('Korisnik', $data); 
    }
    /**
    * updateProfil funkcija koja menja podatke zadatom korisniku
    *
    * @param data $data
    *
    * @return void
    *
    */ 
    function updateProfil($data){
        $username = $this->session->userdata("username");
        // $query=$this->db->query("update Korisnik SET AvatarPath='$data' where Username='".$username."'");
        $data = array( 'AvatarPath' => $data );
        $this->db->where('Username', $username);
        $this->db->update('Korisnik', $data); 
    }
    /**
    * deleteOldImg funkcija koja brise iz baze sliku za zadati uo i poziciju slike
    *
    * @param Integer $rbr
    * @param Integer $id
    *
    * @return void
    *
    */
    function deleteOldImg(){
        $username = $this->session->userdata("username");
        $this->db->select('AvatarPath');
        $query1=$this->db->get_where('Korisnik',array('Username'=>$username));
        foreach($query1->result()as $row){
            unlink("img/profil/".$row->AvatarPath);
        }
    }
    /**
    * getSlikaKorisnik funkcija koja vraca putanju profilne slike za zadatog registovanog korisnika
    *
    * @param Integer $idkor
    *
    * @return String
    *
    */ 
    public function getSlikaKorisnik($idkor){
        // $query=$this->db->query("SELECT AvatarPath FROM Korisnik WHERE IDKorisnik='".$idkor."'");
        $query=$this->db->select('AvatarPath')->from('Korisnik')->where('IDKorisnik',$idkor)->get();
        return $query->result();
    }
    
}