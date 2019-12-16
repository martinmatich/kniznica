<?php

function nacitajTriedu($trieda) {
    require_once "./triedy/$trieda.php";
}

spl_autoload_register("nacitajTriedu");

require_once "./db.php";

$text = htmlspecialchars(file_get_contents("php://input"));


try {
    $autori = new ZoznamAutorov($spojenie);
    $zoznam = $autori->vygenerujZoznam($spojenie);
    $zoznamBezDiakritiky = $autori->zoznamBezDiakritiky($zoznam, $autori->diakritika, $autori->bezDiakritiky);
    $vysledok = $autori->prehladajZoznam($zoznamBezDiakritiky, $text);
    $json = new PoleJson($vysledok);
    echo $json->konvertuj();
} catch (Exception $ex) {
    echo $ex->getMessage();
}