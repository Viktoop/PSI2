<?php
/**
 * Milica Soljaga 656/13
 * 
* ModelKomentar – ModelKlasa klasa za izvrsavanje admin funkcijonalnosti
*
* @version 1.1
*/
 class ModelKomentar extends CI_Model {
    public $korisnik;
    /**
    * Kreiranje nove instance
    *
    * @return void
    */
    public function __construct() {
        parent::__construct();
        $this->korisnik = $this->session->userdata("username");
    }
    /**
    * dodaj_komentar funkcija koja dodaje komentar u bazu podataka
    *
    * @param String $kokmentar String
    * @param String $ocena String
    * @param Int $iduo Int
    
    *
    * @return void
    *
    */
    public function dodaj_komentar($komentar,$ocena,$iduo){

        $result=$this->db->get_where('Korisnik',array('Username'=>$this->korisnik));

        //$result=$this->db->query("SELECT * from Korisnik where Username='".$this->korisnik."'");
        
        $idkor = $result->row();
        //$query=$this->db->query("INSERT into komiocena(idkorisnik, iduo, komentar,ocena) values ('".$idkor->IDKorisnik."','".$iduo."','".$komentar."','".$ocena."')");
        $this->db->set('idkorisnik',$idkor->IDKorisnik);
        $this->db->set('iduo',$iduo);
        $this->db->set('komentar',$komentar);
        $this->db->set('ocena',$ocena);
        $this->db->insert('komiocena');

        $avg = $this->avg_ocena($iduo);


       // $query=$this->db->query("UPDATE UO SET AvgOcena='".$avg."' WHERE iduo='".$iduo."'");

       
       $data=array('AvgOcena'=>$avg);
       $this->db->where('iduo',$iduo);
       $this->db->update('UO',$data);
        
    }
    /**
    * nadji_komentar funkcija koja dohvata komentar iz baze
    *

    * @param Int $iduo Int
    
    *
    * @return void
    *
    */
    public function nadji_komentar($iduo){
        //$query=$this->db->query("SELECT * from Komiocena as ko, korisnik as k where ko.IDUO='".$iduo."' and ko.idkorisnik ='k.idkorisnik'");
        //$query=$this->db->query("SELECT * from pom where IDUO='".$iduo."'");
        $query=$this->db->get_where('pom',array('IDUO'=>iduo));
        return $query;
        
    }
    /**
    * avg_ocena funkcija koja izracunava prosecnu ocenu lokala
    *
   
    * @param Int $iduo Int
    
    *
    * @return int
    *
    */
    public function avg_ocena($iduo){
        //$query=$this->db->query("SELECT avg(ocena) as average from komiocena where IDUO='".$iduo."'");
        $query=$this->db->select_avg('ocena')->from('komiocena')->where('IDUO',$iduo);
        $query = $this->db->get();
        $avg=$query->result()[0]->ocena;
        return $avg;
        
    }
    /**
    * doh_avg_ocena funkcija koja vraca prosecnu ocenu lokala iz baze
    *
   
    * @param Int $iduo Int
    
    *
    * @return Int 
    *
    */

    public function doh_avg_ocena($iduo){
        //$query=$this->db->query("SELECT avgocena from uo where IDUO='".$iduo."'");
        $query=$this->db->select('avgocena')->from('uo')->where('IDUO',$iduo);
        $avg = $query->row()->avgocena;
        return $avg;
    }
   /**
    * dohvatiKomentareZaUO funkcija koja ddohvata komentare zaddatog lokala
    *
   
    * @param Int $iduo Int
    
    *
    * @return array()
    *
    */

    public function dohvatiKomentareZaUO($IDUO){
        //$query=$this->db->query("SELECT Username, Komentar, Ocena, IDKomiOcena,AvatarPath IDUO from komiocena, korisnik where komiocena.IDKorisnik = korisnik.IDKorisnik and komiocena.IDUO=".$IDUO);
         $this->db->select();
         $this->db->from('komiocena');
         $this->db->join('korisnik','komiocena.IDKorisnik=korisnik.IDKorisnik');
         $this->db->where('IDUO',$IDUO);
         $query=$this->db->get();
  
       
        return $query->result();
    }
   /**
    * deleteKomentar funkcija koja brise zaddati komentar za zaddati lokal
    *
   
    * @param Int $iduo Int
    * @param Int $idkom Int
    *
    * @return void
    *
    */

    public function deleteKomentar($idkom,$iduo){
        //$query = $this->db->query("DELETE FROM KomiOcena WHERE IDKomiOcena='".$idkom."'");
        $query=$this->db->delete('KomiOcena',array('IDKomiOcena'=>$idkom));
        $avgOcena = $this->avg_ocena($iduo);

        $data=array('AvgOcena'=>$avgOcena);
        $this->db->where('iduo',$iduo);
        $this->db->update('UO',$data);
    }
    
}

    // ne treba da pise idkom i ocena, popraviti kad se sredi autoinc
    // this->db->query("select * from phae where pice='"$.data."' ande hrane = '".dat1."', )
    //echo $idkor->IDKorisnik;
    //foreach($idkor->result() as $row)echo $row->IDKorisnik;
    //$query=$this->db->query("SELECT * from Komiocena as ko, korisnik as k where ko.IDUO='".$iduo."' and ko.idkorisnik ='k.idkorisnik'");
    // $query = $this->db->query("UPDATE uo set avgocena where iduo='".$avg."'");
    // foreach ($query->result() as $row)
    //     {
    //         echo $row->IDUO;
    //     }

?>