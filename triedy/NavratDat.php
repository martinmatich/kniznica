<?php

abstract class NavratDat {
    private $mysqli;
    private $vysledky = [];


    public function __construct(mysqli $mysqli) {
        $this->mysqli = $mysqli;
    }
    
    abstract public function vratPole(mysqli $mysqli, $tabulka = "", $stlpec = "");
    
    }
