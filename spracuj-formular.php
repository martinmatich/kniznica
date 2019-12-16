<?php


$nazvyInputov = array_flip(array_column($inputy, "name"));
$formular = new ValidatorFormular($nazvyInputov, $_POST);
try {
    $formular->skontrolujPrazdne($formular->getVzor(), $formular->getPolozky());
    $isbn = new Isbn($_POST["isbn"]);
    $cena = new Cena($_POST["cena"]);
    $format = new ChybyValidacie();
    $format->vypisChyby($isbn, $cena);
    $kniha = new PridajKnihu($spojenie, $_POST["nazov"], $isbn->getUpravenyObsah(), $cena->getUpravenyObsah(), $_POST["autor"], $_POST["kategoria"]);
    $kniha->pridajKnihu();
    $_SESSION["kniha"] = "<p class='alert alert-success'>Kniha sa úspešne uložila. Ďakujeme za pridanie</p>";
    header("Location: $_SERVER[PHP_SELF]", TRUE, 303);
} catch (ChybaFormular $ex) {
    echo $ex->getMessage();
}
    catch (ChybaDatabazy $ex) {
        echo $ex->getMessage();
    }
