<?php

class Cena extends Input {
    public function validuj($obsah) {
        $chyba = [];
        $nahradCiarku = str_replace(",", ".", $obsah);
        $regular = "~^\d+(?:\.\d+)?$~iu";
        if (!preg_match($regular, $nahradCiarku)) {
            $chyba[] = "Zadajte cenu v platnom formáte – číslo, v prípade desatinného čísla použite desatinnú čiarku alebo bodku.";
        }
        
        else {
            $this->upravenyObsah = $nahradCiarku;
        }
        return $chyba;
    }
}
