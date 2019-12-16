<?php


abstract class Vypis {
    public $data;
    
    public function __construct($data) {
        $this->data = $data;
    }
    
    abstract public function vypis($data);
}
