<?php

$z = new NavratDatKomplexny($spojenie);

try {
    $z->vratPole($spojenie);
} catch (NenajdenyZaznam $ex) {
    die($ex->getMessage());
}

$hlavicka = $z->hlavickaTabulky($z->getVysledky());
if (isset($_GET["zorad"])) {
    $z->zoradPodlaKluca($z->getVysledky(), $_GET["zorad"]);
    $knizky = $z->getVysledkyPodlaCeny();
    
    //neexistujúca hodnota = prázdne pole - načítame predvolený zoznam
    if (empty($knizky)) {
        $knizky = $z->getVysledky();
    }
}

 else {
     $knizky = $z->getVysledky();
}
?>

<table class="table table-striped">
    <tr>
        <?php
        foreach ($hlavicka as $polozkaHlavicky) {
            ?>
        <td>
            <?= $polozkaHlavicky == "Cena" ? (!isset($_GET["zorad"]) ?  "<a href=\"". htmlspecialchars($_SERVER["PHP_SELF"]) ."?zorad=$polozkaHlavicky\">$polozkaHlavicky</a>" : "<a href=\"". htmlspecialchars($_SERVER["PHP_SELF"]) ."\">$polozkaHlavicky</a>") : $polozkaHlavicky ?>
        </td>
            <?php
        }
        ?>
    </tr>
        <?php
                foreach ($knizky as $knizky_2) {
                    ?>
    <tr>
                    <?php
                    foreach ($knizky_2 as $knizka) {
                        
                    
                    ?>
        <td>
            <?= htmlspecialchars($knizka) ?>
        </td>

        <?php    
                    }
                    ?>
            </tr>
        <?php
                    }
        ?>
</table>
