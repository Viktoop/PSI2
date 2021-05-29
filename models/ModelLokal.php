<?php
/**
 * Lazar Ristic 658/15,Milica Soljaga 655/13
 * 
* ModelLokal – model klasa za pristup bazi i izvrsavanje gost funkcionalnosti
*  
* @version 1.0
*/

class ModelLokal extends CI_Model {
    
    public $piceTagovi      = array('Bezalkoholna pica', 'Likeri', 'Vitaminski napici', 'Kokteli', 'Vina', 'Zestina', 'Kafa special', 'Craft pivo' );
    public $hranaTagovi     = array('Sendvici', 'Sushi', 'Pecenje', 'Obrok salate', 'Pizza', 'Rostilj', 'Dnevni meni', 'Kuvana jela' );
    public $ambijentTagovi  = array('Splav', 'Chill', 'Ziva svirka', 'Balkon', 'Centar', 'Reka', 'Pogled', 'Basta' );
    public $extraTagovi     = array('TV', 'Happy hour', 'Dostava', 'No Smoking zona', 'Baby oprema', 'Parking', 'Pet Frendly', 'WiFi' );

	/**
    * Kreiranje nove instance
    *
    * @return void
    */
    public function __construct() {
        parent::__construct();
        $this->korisnik=$this->session->userdata("username");
    }
    /**
    * naprednaPretragaLokala funkcija koja iz baze izvlaci niz uo koji odgovaraju prosledjenim parametrima u obliku tagova
    *
    * @param Integer $data1
    * @param Integer $data2
    * @param Integer $data3
    * @param Integer $data4
    *
    * @return Array
    *
    */
    public function naprednaPretragaLokala($data1,$data2,$data3,$data4){
        // $query2 = $this->db->query("SELECT * FROM UO as U, PHAE AS P  WHERE P.Pice>='".$data1."' AND P.Hrana>='".$data2."' AND P.Ambijent>='".$data3."' AND P.Ekstra>='".$data4."' AND P.IDUO = U.IDUO");
        $sql =" SELECT * FROM UO, PHAE 
                WHERE (PHAE.Pice        ^ ? & ?) = 0
                AND   (PHAE.Hrana       ^ ? & ?) = 0
                AND   (PHAE.Ambijent    ^ ? & ?) = 0
                AND   (PHAE.Ekstra      ^ ? & ?) = 0
                AND UO.IDUO = PHAE.IDUO;
              ";
        $query = $this->db->query($sql, array($data1, $data1, $data2, $data2, $data3, $data3, $data4, $data4));
        return $query;
    }
    /**
    * getRestorani funkcija koja iz baze izvlaci niz uo koji su restorani
    *
    * @return Array
    *
    */
    public function getRestorani(){
        // $query = $this->db->query("SELECT * FROM UO WHERE JeRestoran = '1'");
        $query = $this->db->where('JeRestoran',1)->get('UO');
        return $query;
    }
    /**
    * getKafici funkcija koja iz baze izvlaci niz uo koji su kafici
    *
    * @return Array
    *
    */
    public function getKafici(){
    //    $query = $this->db->query("SELECT * FROM UO WHERE JeKafic = '1'");
       $query = $this->db->where('JeKafic',1)->get('UO');
       return $query;
    }
    /**
    * getBrzaHrana funkcija koja iz baze izvlaci niz uo koji su brzahrana
    *
    * @return Array
    *
    */
    public function getBrzaHrana(){
        // $query = $this->db->query("SELECT * FROM UO WHERE JeBrzaHrana = '1'");
        $query = $this->db->where('JeBrzaHrana',1)->get('UO');
        return $query;
    }
    
    public function getUO($iduo){
        // $query = $this->db->query("SELECT * FROM UO WHERE IDUO = '".$iduo."'");
        $query = $this->db->where('IDUO',$iduo)->get('UO');
        return $query->row();
    }
    /**
    * getUoZaIDVlasnika funkcija koja iz baze izvlaci niz uo za zadatog vlasnika
    *
    * @param Integer $idkor
    *
    * @return Array
    *
    */
    public function getUoZaIDVlasnika($idkor){
        //$query = $this->db->query("SELECT U.IDUO, U.Naziv,U.Vidljivost,U.Odobren FROM UO AS U, JeVlasnik AS JV WHERE JV.IDKorisnik='".$idkor."' AND U.IDUO=JV.IDUO");
        $this->db->select('UO.IDUO, UO.Naziv, UO.Vidljivost, UO.Odobren');
        $this->db->from('UO');
        $this->db->join('JeVlasnik','JeVlasnik.IDUO = UO.IDUO');
        $this->db->where('JeVlasnik.IDKorisnik',$idkor);

        return $this->db->get()->result();
    }
    /**
    * getAllUO funkcija koja iz baze izvlaci niz svih uo
    *
    * @return Array
    *
    */
    public function getAllUO(){
        // $query = $this->db->query("SELECT * FROM UO");
        return $this->db->get('UO')->result();
    }
    /**
    * getLokaliNaCekanju funkcija koja iz baze izvlaci niz uo koji jos nisu odobreni od strane admina
    *
    * @return Array
    *
    */
    public function getLokaliNaCekanju(){
        // $query = $this->db->query("SELECT * FROM UO WHERE Odobren='0'");
        $query = $this->db->select('*')->from('UO')->where('Odobren',0)->get();
        return $query->result();
    }
    /**
    * updateOdobren funkcija koja u bazi status odobren za zadati uo
    *
    * @param Integer $iduo
    *
    * @return void
    *
    */
    public function updateOdobren($iduo){
        // $query=$this->db->query("UPDATE UO SET Odobren='1' where IDUO='".$iduo."'");
        $data = array( 'Odobren' => 1 );
        $this->db->where('IDUO', $iduo);
        $this->db->update('UO', $data); 
    }
    /**
    * setVidljiva funkcija koja u bazi postavlja vidljivost za zadati uo
    *
    * @param Integer $iduo
    *
    * @return void
    *
    */
    public function setVidljiva($iduo){
        // $this->db->query("UPDATE UO SET Vidljivost='1' WHERE IDUO='".$iduo."'");
        $data = array( 'Vidljivost' => 1 );
        $this->db->where('IDUO', $iduo);
        $this->db->update('UO', $data);
    }
    /**
    * setPrivatna funkcija koja u bazi postavlja vidljivost na privatan za zadati uo
    *
    * @param Integer $iduo
    *
    * @return void
    *
    */
    public function setPrivatna($iduo){
        // $this->db->query("UPDATE UO SET Vidljivost='0' WHERE IDUO='".$iduo."'");
        $data = array( 'Vidljivost' => 0 );
        $this->db->where('IDUO', $iduo);
        $this->db->update('UO', $data);
    }
    /**
    * dohvatiTagoveUO funkcija koja iz baze vraca tagove za zadati uo
    *
    * @param Integer $iduo
    *
    * @return Data
    *
    */
    public function dohvatiTagoveUO($id){

        #Dohvatanje reda iz PHAE tabele za UO sa id-jem -> $id
        $query = $this->db->get_where('phae', array('IDUO' => $id));

        #Ukoliko red sa datim ID ne postoji vracja NULL
        if ($query->num_rows() == 0) return NULL;
        
        #Odvajanje vrednosti kolona u pojedinacne INT promenljive
        $piceINT       = $query->result()[0]->Pice;
        $hranaINT      = $query->result()[0]->Hrana;
        $ambijentINT   = $query->result()[0]->Ambijent;
        $extraINT      = $query->result()[0]->Ekstra;

        #pretvara INT u binarni broj, dodaje nule na pocetku do duzine 8 bita i vraca kao String
        $piceBIN = sprintf( "%08d", decbin( $piceINT ));
        $hranaBIN = sprintf( "%08d", decbin( $hranaINT ));
        $ambijentBIN = sprintf( "%08d", decbin( $ambijentINT ));
        $extraBIN = sprintf( "%08d", decbin( $extraINT ));

        #pretvara binarni broj u niz bita od 8 elemenata
        $piceBinArray       = str_split($piceBIN);
        $hranaBinArray      = str_split($hranaBIN);
        $ambijentBinArray   = str_split($ambijentBIN);
        $extraBinArray      = str_split($extraBIN);

        #Proverava da li je bit postavljen i ako jeste dodaje string tag u $res array
        $res = [];
        for ($i=0; $i<8; $i++) if ($piceBinArray[$i])      array_push($res, $this->piceTagovi[$i]);
        for ($i=0; $i<8; $i++) if ($hranaBinArray[$i])     array_push($res, $this->hranaTagovi[$i]);
        for ($i=0; $i<8; $i++) if ($ambijentBinArray[$i])  array_push($res, $this->ambijentTagovi[$i]);
        for ($i=0; $i<8; $i++) if ($extraBinArray[$i])     array_push($res, $this->extraTagovi[$i]);
        
        return $res;        
   }
/**
    * insertUO funkcija koja insertuje u bazu uo
    *
    * @param Integer $naziv
    * @param String $adresa
    * @param String $mapa
    * @param Boolean $restora
    * @param Boolean $kafic
    * @param Boolean $brza
    * @param String $ponpet
    * @param String $subota
    * @param String $nedelja
    * @param Integer $pic
    * @param Integer $jela
    * @param Integer $mesto
    * @param Integer $ostalo
    * @param String $opis
    * @param String $samenija
    * @param String $razlike
    * @param String $zasto
    *
    * @return void
    *
    */
    public function insertUO($naziv,$adresa,$mapa,$restoran,$kafic,$brza,$ponpet,$subota,$nedelja,$pice,$jela,$mesto,$ostalo,$opis,$samenija,$razlike,$zasto){
        $pom=0;
        $result = $this->db->where('Username',$this->korisnik)->get('Korisnik');
        $idkor = $result->row(); 
        $data = array(
            'Opis' => $opis,
            'PonPet' => $ponpet,
            'Sub' => $subota,
            'Ned' => $nedelja,
            'AvgOcena' => $pom,
            'Adresa' => $adresa,
            'Gmaps' => $mapa,
            'Odobren' => $pom,
            'Vidljivost' => $pom,
            'Info1' => $samenija,
            'Info2' => $razlike,
            'Info3' => $zasto,
            'Naziv' => $naziv,
            'JeRestoran' => $restoran,
            'JeKafic' => $kafic,
            'JeBrzaHrana' => $brza
        );
        $this->db->insert('UO', $data);
        $maxid = $this->db->select_max('IDUO', 'maxid')->get('UO')->row()->maxid;

        // $query=$this->db->query("INSERT into phae(IDUO,Pice,Hrana,Ambijent,Ekstra) values ('".$maxid."','".$pice."','".$jela."','".$mesto."','".$ostalo."')");
        $data = array(
            'IDUO' => $maxid ,
            'Pice' => $pice ,
            'Hrana' => $jela ,
            'Ambijent' => $mesto ,
            'Ekstra' => $ostalo
        );
        $this->db->insert('PHAE', $data);

        // $query=$this->db->query("INSERT into jevlasnik(IDKorisnik,IDUO) values ('".$idkor->IDKorisnik."','".$maxid."')");
        $data = array(
          'IDKorisnik' => $idkor->IDKorisnik ,
          'IDUO' => $maxid 
        );
        $this->db->insert('jeVlasnik', $data);

        return $maxid;
    }
    /**
    * insertUoImg funkcija koja insertuje putanju slike u bazu za zadati uo
    *
    * @param Data $data
    * @param Integer $id
    *
    * @return void
    *
    */
    public function insertUoImg($data,$id){ 
        foreach( $data as $rbr => $path){
            $this->db->set("IDUO", $id);
            $this->db->set("rbr", $rbr);
            $this->db->set("Path", $path);
            $this->db->insert("uoslike");
        }
    }
    /**
    * deleteUO funkcija koja brise iz baze zadati uo
    *
    * @param Integer $id
    *
    * @return void
    *
    */
    public function deleteUO($iduo){
        $query=$this->db->get_where('uoslike',array('iduo'=>$iduo));
        foreach($query->result_array() as $row){       
            unlink("img/uo/".$row['Path']);        
        }
        // $query = $this->db->query("DELETE FROM UO where iduo='".$iduo."'");
        $query = $this->db->delete('UO', array('IDUO' => $iduo)); 
    }
    /**
    * dohvatiIDSvihUO funkcija koja vraca niz id svih uo
    *
    * @return Array
    *
    */
    public function dohvatiIDSvihUO(){
        // return $this->db->query("SELECT IDUO FROM uo")->result();
        return $this->db->select('IDUO')->get('UO')->result();

    }
/**
    * updateUO funkcija koja menja uo, uoslike i phae za zadati uo
    *
    * @param Integer $iduo
    * @param String $naziv 
    * @param String $adresa
    * @param String $mapa
    * @param Boolean $restoran
    * @param Boolean $kafic
    * @param Boolean $brza
    * @param String $ponpet
    * @param String $subota
    * @param String $nedelja
    * @param String $opis
    * @param String $samenija
    * @param String $razlike
    * @param String $zasto
    * @param Integer $pice
    * @param Integer $jela
    * @param Integer $mesto
    * @param Integer $ostalo
    *
    * @return void
    *
    */
    public function updateUO($iduo,$naziv,$adresa,$mapa,$restoran,$kafic,$brza,$ponpet,$subota,$nedelja,$opis,$samenija,$razlike,$zasto,$pice,$jela,$mesto,$ostalo){
        //$this->db->query("UPDATE UO set Opis='".$opis."', PonPet='".$ponpet."', Sub='".$subota."' ,Ned='".$nedelja."', Adresa='".$adresa."', Gmaps='".$mapa."', Info1='".$samenija."', Info2='".$razlike."', Info3='".$zasto."', Naziv='".$naziv."', JeRestoran='".$restoran."', JeKafic='".$kafic."', JeBrzaHrana='".$brza."' where iduo='".$iduo."'");
        $data = array(
            'Opis' => $opis,
            'PonPet' => $ponpet,
            'Sub' => $subota,
            'Ned' => $nedelja,
            'Adresa' => $adresa,
            'Gmaps' => $mapa,
            'Info1' => $samenija,
            'Info2' => $razlike,
            'Info3' => $zasto,
            'Naziv' => $naziv,
            'JeRestoran' => $restoran,
            'JeKafic' => $kafic,
            'JeBrzaHrana' => $brza
        );
        $this->db->where('IDUO', $iduo);
        $this->db->update('UO', $data);  $this->db->query("UPDATE PHAE set Pice='".$pice."', Hrana='".$jela."', Ambijent='".$mesto."', Ekstra='".$ostalo."' where iduo='".$iduo."'");
        $data = array(
            'Pice' => $pice ,
            'Hrana' => $jela ,
            'Ambijent' => $mesto ,
            'Ekstra' => $ostalo
        );
        $this->db->where('IDUO', $iduo);
        $this->db->update('PHAE', $data);
    }
    /**
    * citajUO funkcija koja vraca uo za zadati iduo
    *
    * @param Integer $id
    *
    * @return Array
    *
    */
    public function citajUO($iduo){
        // $queryUO=$this->db->query("SELECT naziv, ponpet, sub, ned, opis, adresa, gmaps, info1, info2, info3, JeRestoran, JeKafic, JeBrzaHrana FROM uo WHERE iduo='".$iduo."'");
        $this->db->select('naziv, ponpet, sub, ned, opis, adresa, gmaps, info1, info2, info3, JeRestoran, JeKafic, JeBrzaHrana');
        $this->db->from('UO');
        $this->db->where('IDUO', $iduo);
        $queryUO=$this->db->get();

        $data_uo=[];
        //array_push($res, $this->piceTagovi[$i]);
        $data_uo['naziv']=$queryUO->row()->naziv;
        $data_uo['ponpet']=$queryUO->row()->ponpet;
        $data_uo['sub']=$queryUO->row()->sub;
        $data_uo['ned']=$queryUO->row()->ned;
        $data_uo['opis']=$queryUO->row()->opis;
        $data_uo['adresa']=$queryUO->row()->adresa;
        $data_uo['gmaps']=$queryUO->row()->gmaps;
        $data_uo['info1']=$queryUO->row()->info1;
        $data_uo['info2']=$queryUO->row()->info2;
        $data_uo['info3']=$queryUO->row()->info3;
        $data_uo['jerestoran']=$queryUO->row()->JeRestoran;
        $data_uo['jekafic']=$queryUO->row()->JeKafic;
        $data_uo['jebrzahrana']=$queryUO->row()->JeBrzaHrana;
        $data_uo['ponpet']=explode("-",$queryUO->row()->ponpet);
        $data_uo['sub']=explode("-",$queryUO->row()->sub);
        $data_uo['ned']=explode("-",$queryUO->row()->ned);
        return $data_uo;
    }
    /**
    * citajSlike funkcija koja vraca sve slike iz baze zadati uo
    *
    * @param Integer $id
    *
    * @return Array
    *
    */
    public function citajSlike($iduo){
        // $query=$this->db->query("SELECT * from UOSlike where iduo='".$iduo."'");
        $query=$this->db->where('IDUO',$iduo)->get('UOSlike');
        $rez = [];
        foreach($query->result() as $row)
                $rez[$row->rbr] = $row->Path;
        return $rez;
    }
    /**
    * citajPHAE funkcija koja vraca sve tagove zadati uo
    *
    * @param Integer $id
    *
    * @return Array
    *
    */
    public function citajPHAE($iduo){
        //$query=$this->db->query("SELECT * from PHAE where iduo='".$iduo."'");
        $query=$this->db->where('IDUO',$iduo)->get('PHAE');
        $pice=$query->row()->Pice;
        $hrana=$query->row()->Hrana;
        $ambijent=$query->row()->Ambijent;
        $ekstra=$query->row()->Ekstra;
        $rez=[];
        array_push($rez, str_split(sprintf( "%08d", decbin( $pice ))));
        array_push($rez, str_split(sprintf( "%08d", decbin( $hrana ))));
        array_push($rez, str_split(sprintf( "%08d", decbin( $ambijent ))));
        array_push($rez, str_split(sprintf( "%08d", decbin( $ekstra ))));
    
        return $rez;
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
    function deleteOldImg($rbr,$id){
   
        $this->db->select('Path');
        $query1=$this->db->get_where('uoslike',array('rbr'=>$rbr,'IDUO'=>$id));
        foreach($query1->result()as $row){
            unlink("img/uo/".$row->Path);
        }
    }
    /**
    * update_uoslike funkcija koja menja slike u baze zadati uo, ako postoje ili insertuje ako ne postoje na zadatom mestu
    *
    * @param Data $data
    * @param Integer $id
    *
    * @return void
    *
    */
    public function update_uoslike($data,$id){  

        foreach( $data as $rbr => $path){
            // $preklapa=$this->db->query("SELECT id from uoslike where rbr='".$rbr."' and iduo='".$id."'");
            $this->db->select('id');
            $this->db->from('uoslike');
            $this->db->where('rbr', $rbr );
            $this->db->where('IDUO', $id );
            $preklapa=$this->db->get();

            $novi=$preklapa->row();
            if($novi == NULL){
                $this->db->set("IDUO", $id);
                $this->db->set("rbr", $rbr);
                $this->db->set("Path", $path);
                $this->db->insert("uoslike");
            }
            else{
                 
                $this->deleteOldImg($rbr,$id);
                // $this->db->query("UPDATE uoslike set iduo='".$id."', rbr='".$rbr."', path='".$path."' where id='".$novi->id."'");
                $data = array(
                    'iduo' => $pice ,
                    'rbr' => $jela ,
                    'path' => $path
                );
                $this->db->where('id', $novi->id);
                $this->db->update('uoslike', $data);
            }
        }
    }
    /**
    * je_vlasnik funkcija koja proverava u bazi da li je korisnik vlasnik datog uo
    *
    * @param Integer $iduo
    * @param String $username
    *
    * @return Integer
    *
    */
    public function je_vlasnik($iduo,$username){
        $this->db->select('*');
        $this->db->from('Korisnik');
        $this->db->join('JeVlasnik','JeVlasnik.IDKorisnik = Korisnik.IDKorisnik');
        $this->db->where('Korisnik.Username',$username);
        $this->db->where('JeVlasnik.IDUO',$iduo);
        return $this->db->get()->num_rows();

    }
}
 
    