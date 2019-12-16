<?php

require_once "db.php";
function nacitajTriedu($trieda) {
    require_once "./triedy/$trieda.php";
}

spl_autoload_register("nacitajTriedu");


header("Content-Type: application/json");

$pripravJson = new NavratDatKomplexny($spojenie);
$pripravJson->vratPole($spojenie);
$finalnyJson = new PoleJson($pripravJson->getVysledky());
echo $finalnyJson->konvertuj();