<?php


class ChybyValidacie {
    public function vypisChyby(Isbn $isbn, Cena $cena) {
        $chyba = array_merge($isbn->validuj($isbn->obsah), $cena->validuj($cena->obsah));
        if ($chyba) {
            throw new ChybaFormular(implode(" ", $chyba));
        }
    }
}
