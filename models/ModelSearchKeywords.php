<?php
/**
 * 
 * Milos Stupar 0669/15,Viktor Galindo 655/13
 * 
* ModelSearchKeywords – model klasa za pristup bazi i izvrsavanje gost funkcionalnosti
*
* @version 1.0
*/
class ModelSearchKeywords extends CI_Model {
	/**
    * Kreiranje nove instance
    *
    * @return void
    */
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelLokal");
    }
    /**
    * izbaciZnakoveInterpunkcije funkcija koja brise znakove interpunkcije iz zadatog stringa
    *
    * @param String $data
    *
    * @return String
    *
    */
    function izbaciZnakoveInterpunkcije($data){

        $data = str_replace(". ", " ", $data);
        $data = str_replace(", ", " ", $data);
        $data = str_replace(".", "", $data);
        $data = str_replace(",", "", $data);

        return $data;
    }
    /**
    * podeliUReci funkcija koja deli zadati string na razmake i vraca niz reci
    *
    * @param String $data
    *
    * @return Array
    *
    */
    function podeliUReci($data){
        $words = explode(" ", $data);
        foreach ($words as $index => $word) {
            if (strlen($word) < 3) unset($words[$index]);
        }
        return $words;
    }
    /**
    * dodajUnikatneReci funkcija koja dodaje samo nove reci u niz
    *
    * @param String $allWords
    * @param String  $data
    *
    * @return Array
    *
    */
    function dodajUnikatneReci($allWords, $data){
        $data = $this->izbaciZnakoveInterpunkcije($data);
        $words = $this->podeliUReci($data);
        
        #Dodaj reci u $allWords ukoliko ne postoje
        foreach ($words as $index => $word) {

            #Konvertuje da sve budu mala slova
            $word = strtolower($word);

            #Provera da li se rac vec nalazi u nizu $allwords
            if (array_search($word, $allWords) === FALSE) {
                
                #Dodaje u array $allWords
                array_push($allWords, $word);
            }
        }

        return $allWords;
    }
    /**
    * dohvatiWordID funkcija koja vraca id zadate reci
    *
    * @param String $word
    *
    * @return Integer
    *
    */
    # Ukoliko rec postoji u tabeli vraca njen ID u suprotnom dodaje rec u tabelu i vraca ID
    function dohvatiWordID($word=NULL){
        if ($word==NULL) return;

        #Provera da li rec vec postoji u bazi
        $query = $this->db->where('Word',$word)->get('searchkeywords');
            
        if ($query->num_rows()) {

            #Ako rec vec postoji dohvati njen ID
            $wordID = $query->row()->IDSearchKeywords;
        }
        else{

            #Ako rec ne postoji dodaj je u bazu
            $this->db->set("Word", $word);
            $this->db->insert("searchkeywords");

            #Dohvati ID nakon INSERT
            $wordID = $this->db->where('Word',$word)->get('searchkeywords')->row()->IDSearchKeywords;
        }

        return $wordID;

    }
    /**
    * dodajKeywordsUBazu funkcija koja unosi rec u bazu
    *
    * @param String $allWords=NULL
    * @param Integer $IDUO=NULL
    *
    * @return void
    *
    */
    public function dodajKeywordsUBazu($allWords=NULL, $IDUO=NULL){
        if ($allWords==NULL) return;
        if ($IDUO==NULL) return;

        foreach ($allWords as $index => $word){

            #Ukoliko rec postoji u tabeli vraca njen ID u suprotnom dodaje rec u tabelu i vraca ID
            $wordID = $this->dohvatiWordID($word);

            #Dodaje par WordID i IDUO u tabelu sadrzi
            $this->db->set("IDSearchKeywords", $wordID);
            $this->db->set("IDUO", $IDUO);
            $this->db->insert("sadrzi");

        }

    }
    /**
    * izvuciKeywordsZaUO funkcija koja vraca niz reci da odredjen uo
    *
    * @param Integer $IDUO=0
    *
    * @return Array
    *
    */
    public function izvuciKeywordsZaUO($IDUO=0){
        $allWords = NULL;

        #dohvati podatke o UO
        $podaciUO = $this->ModelLokal->getUO($IDUO);
        if ($podaciUO) {

            $allWords = [];

             #Dodavanje unikatnih reci u $allWords iz odredjenih polja UO
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Naziv);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Adresa);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Opis);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Info1);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Info2);
            $allWords = $this->dodajUnikatneReci($allWords, $podaciUO->Info3);

            #Dodavanje tagova UO u $allWords
            $tagovi = $this->ModelLokal->dohvatiTagoveUO($IDUO);
            if (isset($tagovi)){
                $data = implode(" ", $tagovi);
                $allWords = $this->dodajUnikatneReci($allWords, $data);
            }
            

            #Dodavanje tipa UO u $allWords
            if ($podaciUO->JeRestoran)  $allWords = $this->dodajUnikatneReci($allWords, "restoran");
            if ($podaciUO->JeKafic)     $allWords = $this->dodajUnikatneReci($allWords, "kafic");
            if ($podaciUO->JeBrzaHrana) $allWords = $this->dodajUnikatneReci($allWords, "brza hrana");
        }

        return $allWords;
    }
    /**
    * obrisiKeyWordsZaUO funkcija koja brise iz baze reci koje su vezane samo za zadati uo
    *
    * @param Integer $IDUO=NULL
    *
    * @return void
    *
    */
    public function obrisiKeyWordsZaUO($IDUO=NULL){
        if ($IDUO == NULL) return;

        #Dohvata ID svih reci koje se koriste za UO sa ID -> $IDUO
        // $results = $this->db->query("SELECT IDSearchKeywords FROM sadrzi WHERE IDUO = $IDUO;")->result();
        $results = $this->db->select('IDSearchKeywords')->from('sadrzi')->where('IDUO', $IDUO)->get()->result();
        $WordIDzaIDUO = [];

        #Filtrira rezultat query-ja i stavlja samo ID reci u niz $WordIDzaIDUO
        foreach ($results as $key => $value) {
           array_push($WordIDzaIDUO, $value->IDSearchKeywords);
        }

        #Brise sve redove iz tabele sadrzi za UO sa ID -> $IDUO
        $this->db->delete('sadrzi', array('IDUO' => $IDUO));


        #Proverava za svaku rec koja se koristila za dati UO da li jos neki UO koristi istu rec
        foreach ($WordIDzaIDUO as $key => $WordID) {
            $brojRedova = $this->db->where('IDSearchKeywords',$WordID)->get('sadrzi')->num_rows();

            #Ako je broj redova = 0, to znaci da je UO bio jedini koji je koristio tu rec i rec moze da se obrise
            if ($brojRedova == 0) $this->db->delete('searchkeywords', array('IDSearchKeywords' => $WordID));
        }
        
    }
    /**
    * generisiKeywordsZaUO funkcija koja unosi u bazu kljucne reci zadatog uo
    *
    * @param Integer $IDUO
    *
    * @return void
    *
    */
    public function generisiKeywordsZaUO($IDUO=NULL){
		if ($IDUO==NULL) return;

		#Brise iz baze sve veze iz sadrzi i same Key words ukoliko ni jedan drugi UO ih ne koristi
		$this->obrisiKeyWordsZaUO($IDUO);

		#Izvlaci iz podataka o UO unikatne key words i vraca kao niz stringova
		$keyWords = $this->izvuciKeywordsZaUO($IDUO);

		#Dodaju u bazu key words ukoliko vec ne postoje i spaja odredjeni key word sa UO u tabeli sadrzi
		$this->dodajKeywordsUBazu($keyWords, $IDUO);
    }
    /**
    * dohvatiNizUOSaRecima funkcija koja vraca sve uo koji poseduju zadatu rez
    *
    * @param String $word
    *
    * @return Array
    *
    */   
    public function dohvatiNizUOSaRecima($words){
        if (count($words) == 0) return NULL;
        if ($words[0] == NULL) return NULL;
        // $queryStr = 'SELECT sadrzi.IDUO 
        //              FROM searchkeywords, sadrzi 
        //              WHERE searchKeywords.IDSearchKeywords = sadrzi.IDSearchKeywords AND searchKeywords.Word = "'. $words[0] .'"';

        // $query = $this->db->query($queryStr);z 
        $this->db->select('sadrzi.IDUO');
        $this->db->from('sadrzi');
        $this->db->join('searchkeywords', 'searchKeywords.IDSearchKeywords = sadrzi.IDSearchKeywords');
        $this->db->where('searchKeywords.Word', $words[0]);
        $query = $this->db->get();

        if ($query->num_rows() == 0) return NULL;
        
        $result = [];
        for ($i=0; $i<$query->num_rows(); $i++) $result[] = $query->result()[$i]->IDUO;
        
        foreach ($words as $index => $word){
            // $queryStr = "SELECT sadrzi.IDUO 
            //              FROM searchkeywords, sadrzi 
            //              WHERE searchKeywords.IDSearchKeywords = sadrzi.IDSearchKeywords AND searchKeywords.Word = '$word'";

            // $query = $this->db->query($queryStr);
            $this->db->select('sadrzi.IDUO');
            $this->db->from('sadrzi');
            $this->db->join('searchkeywords', 'searchKeywords.IDSearchKeywords = sadrzi.IDSearchKeywords');
            $this->db->where('searchKeywords.Word', $word);
            $query = $this->db->get();
            
            if ($query->num_rows() == 0) return NULL;

            $temp = [];
            for ($i=0; $i<$query->num_rows(); $i++) $temp[] = $query->result()[$i]->IDUO;

            $result = array_intersect($result, $temp);
            if (count($result) == 0) return NULL;
        }

        return $result;
    }

    /**
    * Brise sve iz tabele sadrzi i tabele searchkeywords
    *
    *
    * @return void
    *
    */ 
    public function obrsiSVE(){
        $this->db->empty_table('sadrzi');
        $this->db->empty_table('searchkeywords'); 
    }

}
 
    