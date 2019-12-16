<?php


class Isbn extends Input {
    public function validuj($obsah) {
        $chyba = [];
        $bezPomlciek = str_replace("-", "", $obsah);
        $povolenaDlzka = [10, 13];
        if (!in_array(mb_strlen($bezPomlciek), $povolenaDlzka) || !is_numeric($bezPomlciek)) {
            $chyba[] = "Zadajte ISBN v platnom formáte – 10 alebo 13 číslic oddelených pomlčkou (pomlčku nie je potrebné zadávať).";
        }
        
        else {
            $this->upravenyObsah = $bezPomlciek;
        }
        
        return $chyba;
    }
}
