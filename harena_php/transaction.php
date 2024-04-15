<?php
    require("Insertion.php");

    $type = $_POST["type"];
    $montant = $_POST["montant"];
    $description = (int) $_POST["description"];

    Insertion::insert($type, $description, $montant);
    header("Location: display.php");
?>