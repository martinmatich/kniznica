<?php
    $k = new NavratDatKategorie($spojenie);
    $zoznamKategorii = $k->vratPole($spojenie, "kategorie", "*");
    foreach ($zoznamKategorii as $kategoria) {
        ?>
<option value="<?= (int) $kategoria["id_kategorie"] ?>"><?= htmlspecialchars($kategoria["kategoria"]) ?></option>
    <?php
    }
    ?>

