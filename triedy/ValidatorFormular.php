<?php


class ValidatorFormular {
    private $vzor = [];
    private $polozky = [];
    
    public function __construct($vzor, $polozky) {
        $this->vzor = $vzor;
        $this->polozky = $polozky;
    }
    
    public function getVzor() {
        return $this->vzor;
    }
    
    public function getPolozky() {
        return $this->polozky;
    }

        public function skontrolujPrazdne(array $vzor, array $polozky) {
        $rozdiel = array_diff_key($vzor, $polozky);
        if (count($rozdiel)) {
            $pocet = count($rozdiel);
            $sklonovanie = [];
            $sklonovanie[] = ($pocet == 1 ? "Pole " : "Polia ");
            $sklonovanie[] = ($pocet == 1 ? " musí" : " musia");
            throw new ChybaFormular($sklonovanie[0]. implode(", ", $rozdiel). $sklonovanie[1]. " byť vyplnené");
        }
        
        $chyba = [];
        foreach ($polozky as $kluc => $polozka) {
            if (trim($polozka) === "") {
                $chyba[] = $kluc;
                }
            }
            if ($chyba) {
                $pocet = count($chyba);
                $sklonovanie = [];
                $sklonovanie[] = ($pocet == 1 ? "Pole " : "Polia ");
                $sklonovanie[] = ($pocet == 1 ? " musí" : " musia");
                throw new ChybaFormular($sklonovanie[0]. implode(", ", $chyba). $sklonovanie[1]. " byť vyplnené");
            }
    }
}