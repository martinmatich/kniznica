<?php

$server = "localhost";
$meno = "root";
$heslo = "";
$databaza = "kniznica";
$kodovanie = "utf8";
$spojenie = new mysqli($server, $meno, $heslo, $databaza);
$spojenie->set_charset($kodovanie);
