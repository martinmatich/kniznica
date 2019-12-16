<?php

abstract class Input {
    public $obsah;
    
    public function __construct($obsah) {
        $this->obsah = trim($obsah);
    }
    
    
    public function getUpravenyObsah() {
        return $this->upravenyObsah;
    }

    abstract public function validuj($obsah);
}
