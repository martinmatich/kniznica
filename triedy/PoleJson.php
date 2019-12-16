<?php


class PoleJson {
    private $pole = [];
    
    public function __construct($pole) {
        $this->pole = $pole;
    }
    
    public function konvertuj() {
        $json = json_encode($this->pole, JSON_UNESCAPED_UNICODE);
        return $json;
    }
}
