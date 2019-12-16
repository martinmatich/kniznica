<?php


class NavratDatKategorie extends NavratDat {
    
    public function vratPole(mysqli $mysqli, $tabulka = "", $stlpec = "") {
        $vysledky = [];
        $dotaz = "SELECT `$stlpec` FROM $tabulka ORDER BY kategoria";
        $query = $mysqli->query($dotaz);
        if ($query) {
            while ($riadok = $query->fetch_assoc()) {
                $vysledky[] = $riadok;
            }
        }
        
        return $vysledky;
    }
}
