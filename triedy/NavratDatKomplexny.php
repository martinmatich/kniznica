<?php


class NavratDatKomplexny extends NavratDat {
    private $vysledkyPodlaCeny = [];

    public function getVysledky() {
        return $this->vysledky;
    }

    
    public function getVysledkyPodlaCeny() {
        return $this->vysledkyPodlaCeny;
    }

    public function vratPole(mysqli $mysqli, $tabulka = "", $stlpec = "") {
        $vysledky = [];
        $dotaz = "SELECT nazov as `Názov knihy`, isbn as `ISBN`, cena as `Cena`, kat.kategoria as `Kategória`, a.meno as `Autor` FROM `knihy` k INNER JOIN autori a USING (id_autora) INNER JOIN kategorie kat USING (id_kategorie) ORDER BY id";
        $query = $mysqli->query($dotaz);
        if ($query) {
            if ($query->num_rows == 0) {
                throw new NenajdenyZaznam("Neexistuje žiadny záznam.");
            }
            
            while ($riadok = $query->fetch_assoc()) {
                $vysledky[] = $riadok;
            }
        }
        
        
        $this->vysledky = $vysledky;
    }
    
    public function hlavickaTabulky(array $pole) {
        return array_keys($pole[0]);
    }
    
    public function zoradPodlaKluca(array $pole, $index) {
        
        if (in_array($index, array_keys($pole[0]))) {
        $kopiaPola = $pole;
        $zoradPodla = array_column($kopiaPola, $index);
        array_multisort($zoradPodla, SORT_ASC, $kopiaPola);
        $this->vysledkyPodlaCeny = $kopiaPola;
        }
    }
}
