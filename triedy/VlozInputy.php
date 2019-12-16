<?php

class VlozInputy {
    private $dataset = [];
    private $specialneAtributy = [];


    public function __construct($dataset, $specialneAtributy) {
        $this->dataset = $dataset;
        $this->specialneAtributy = $specialneAtributy;
    }
    
    public function getDataset() {
        return $this->dataset;
    }
    
    public function getSpecialneAtributy() {
        return $this->specialneAtributy;
    }
    
    public function vypisInputy(array $pole, array $specialneAtributy) {
        $vysledok = "";
        
        foreach ($pole as $medzipole) {
            $vysledok .= "<input";
            
            foreach ($medzipole as $kluc => $hodnota) {
                 if (!in_array($kluc, $specialneAtributy)) {
                    $vysledok .= " $kluc=\"$hodnota\"";
            
                    if ($kluc == "name") {
                        $vysledok .= " placeholder=\"$hodnota\"";
                         $vysledok .= " value=\"". htmlspecialchars($_POST[$hodnota] ?? "") ."\"";
                    }
                 }
        
                elseif ($kluc == "ostatne") {
                    foreach ($hodnota as $kluc => $hodnota_2) {
                        $vysledok .= " $kluc=\"$hodnota_2\"";
                    }
                }
                    
                elseif ($kluc == "solo") {
                    foreach ($hodnota as $kluc => $hodnota_2) {
                        $vysledok .= " $hodnota_2";
                }
                }
            }
        $vysledok .= ">";
        }
        return $vysledok;
    }
}
