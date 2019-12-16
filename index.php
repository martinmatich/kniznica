<?php

//nevyhnutné funkcionality - autoloader, db spojenie...
session_start();

function nacitajTriedu($trieda) {
    require_once "./triedy/$trieda.php";
}

spl_autoload_register("nacitajTriedu");

require_once "./db.php";

$inputy = [["type" => "text", "name" => "nazov", "class" => "form-control",  "solo" => ["required"]], ["type" => "text", "name" => "isbn", "class" => "form-control", "solo" => ["required"]], ["type" => "text", "name" => "cena", "class" => "form-control", "solo" => ["required"]], ["type" => "text", "name" => "autor", "class" => "form-control", "ostatne" => ["onkeyup" => "dopln(this.value)", "id" => "autor"], "solo" => ["required"]]];
$specialneAtributy = ["ostatne", "solo",];

$zoznamAutorov = "";
//koniec nevyhnutných funkcionalít


    if (isset($_POST["odoslat"])) {
        require_once 'spracuj-formular.php';
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Knižnica</title>
    <meta name="description" content="Knižnica pre malých aj veľkých. Pridaj nejakú knihu aj ty, nech je ich tu čo najviac!">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <script type="text/javascript" src="autocomplete.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
</head>
<body onload="$('<div id=\'vysledky\'></div>').insertBefore('input[name=\'autor\']');">
    <div class="container">
        <h1>Knižnica</h1>

    <div><?= $_SESSION["kniha"] ?? "" ?></div>
    <form action="" method="post">
        <?php
        
        include_once "vloz-textove-inputy.php";
        ?>
        <select name="kategoria" class="form-control">
            <?php
            include_once "vloz-kategorie.php";
            ?>
        </select>
        <input type="submit" name="odoslat" value="Pridať knihu do knižnice" class="form-controls">
    </form>
    <h2>Zoznam všetkých kníh v knižnici</h2>
    
    <?php
            include_once "vloz-zoznam-knih.php";
            include_once "vloz-json.php";
            if (http_response_code() == 200) {
                unset($_SESSION["kniha"]);
            }
    
    ?>
    </div>
</body>
</html>