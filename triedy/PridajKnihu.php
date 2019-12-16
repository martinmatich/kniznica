<?php

class PridajKnihu {
    private $mysqli;
    private $nazov;
    private $isbn;
    private $cena;
    private $autor;
    private $kategoria;
    
    public function __construct($mysqli, $nazov, $isbn, $cena, $autor, $kategoria) {
        $this->mysqli = $mysqli;
        $this->nazov = $nazov;
        $this->isbn = $isbn;
        $this->cena = $cena;
        $this->autor = $autor;
        $this->kategoria = $kategoria;
    }
    
    private function overAutora(mysqli $mysqli, $autor) {
        $query = "SELECT * FROM autori WHERE meno = ?";
        $dotaz = $mysqli->prepare($query);
        $dotaz->bind_param("s", $autor);
        $dotaz->execute();
        $vysledok = $dotaz->get_result();
        
        if (!$vysledok) {
            throw new ChybaDatabazy("Pri pridávaní knihy došlo k chybe. Skúste to neskôr.");
        }
        
        $pocetAutorov = $vysledok->num_rows;
        
        //autor neexistuje
        if ($pocetAutorov === 0) {
            $dotaz->close();
            return FALSE;
        }
        
        //duplicitný záznam
        elseif ($pocetAutorov > 1) {
            $dotaz->close();
            throw new ChybaDatabazy("Pri pridávaní knihy došlo k chybe. Nepodarilo sa priradiť knihu k autorovi, zadajte iného autora a skúste to znovu.");
        }
        
        else {
            $autori = $vysledok->fetch_all(MYSQLI_ASSOC);
            $dotaz->close();
            return $autori;
        }
    }
    
    public function pridajKnihu() {
        $duplicitnyAutor = $this->overAutora($this->mysqli, $this->autor);
        $mysqli = $this->mysqli;
        $autor = $this->autor;
        
        if (!$duplicitnyAutor) {
            $query = "INSERT INTO autori (meno) VALUES (?)";
            $dotaz = $mysqli->prepare($query);
            $dotaz->bind_param("s", $autor);
            $dotaz->execute();
            $existujuciAutor = $mysqli->insert_id;
            $dotaz->close();
        }
        
        $id_autora = ($existujuciAutor ?? $duplicitnyAutor[0]["id_autora"]);
        $query = "INSERT INTO knihy (nazov, isbn, cena, id_autora, id_kategorie) VALUES (?, ?, ?, ?, ?)";
        $dotaz = $mysqli->prepare($query);
        $dotaz->bind_param("ssdii", $this->nazov, $this->isbn, $this->cena, $id_autora, $this->kategoria);
        $dotaz->execute();
        #echo $mysqli->error;
    }
}
