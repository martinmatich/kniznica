<?php


class ZoznamAutorov {
    private $mysqli;
    public $diakritika = ["á", "ä", "č", "ć", "ď", "é", "ě", "í", "ľ", "ĺ", "ň", "ó", "ô", "ö", "ŕ", "ř", "š", "ś", "ť", "ú", "ů", "ü", "ý", "ž", "ź", "Á", "Ä", "Č", "Ć", "Ď", "É", "Ě", "Í", "Ľ", "Ĺ", "Ň", "Ô", "Ó", "Ö", "Ŕ", "Ř", "Š". "Ś", "Ť", "Ú", "Ü", "Ů", "Ý", "Ž", "Ź",];
    public $bezDiakritiky = ["a", "a", "c", "c", "d", "e", "e", "i", "l", "l", "n", "o", "o", "o", "r", "r", "s", "s", "t", "u", "u", "u", "y", "z", "z", "A", "A", "C", "C", "D", "E", "E", "I", "L", "L", "N", "O", "O", "O", "R", "R", "S", "S", "T", "U", "U", "U", "Y", "Z", "Z",];


    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function vygenerujZoznam(mysqli $mysqli) {
        $autori = [];
        $dotaz = "SELECT meno FROM autori ORDER BY meno";
        $query = $mysqli->query($dotaz);
            if (!$query->num_rows) {
                throw new Exception("Nenájdený žiadny záznam");
            }
            
            while ($riadok = $query->fetch_assoc()) {
                $autori[] = $riadok;
            }
            
            return $autori;
        }
        
        public function zoznamBezDiakritiky(array $zoznam, $diakritika, $bezDiakritiky) {
            $zoznamBezDiakritiky = [];
            foreach ($zoznam as $zoznamik) {
                foreach ($zoznamik as $polozka) {
                    $polozkaNova = str_replace($diakritika, $bezDiakritiky, $polozka);
                    $zoznamBezDiakritiky[] = [$polozkaNova => $polozka];
                }
            }
            
            return $zoznamBezDiakritiky;
        }
        
        
        //dokončiť
        public function prehladajZoznam(array $zoznam, $text) {
            $vysledok = [];
            foreach ($zoznam as $vnorene) {
                foreach ($vnorene as $bezDiakritiky => $diakritika) {
                    if (mb_stristr($diakritika, $text)) {
                        $vysledok[] = $diakritika;
                    }
                    elseif (mb_stristr($bezDiakritiky, $text)) {
                        $vysledok[] = $diakritika;
                    }
                }
            }            
            return $vysledok;
        }
}