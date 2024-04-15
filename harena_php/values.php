<?php
session_start();
require("connection.php");

$revenus=0;
$retrait=0;

$connection = new Connection();
$conn = $connection->getConnection();

$revenus_query = "SELECT SUM(amount) as total_revenus FROM transactions WHERE type='deposition'";
$revenus_result= mysqli_query($conn, $revenus_query);

if ($revenus_result) {
    $row = mysqli_fetch_assoc($revenus_result);
    $revenus = $row['total_revenus'];
    $_SESSION['revenus'] = $revenus;
} else {
    echo "Erreur: " . mysqli_error($conn);
}


$retrait_query = "SELECT SUM(amount) as total_retrait FROM transactions WHERE type='retrait'";
$retrait_result= mysqli_query($conn, $retrait_query);

if ($retrait_result) {
    $row = mysqli_fetch_assoc($retrait_result);
    $retrait = $row['total_retrait'];
    $_SESSION['retrait'] = $retrait;
} else {
    echo "Erreur: " . mysqli_error($conn);
}

mysqli_close($conn);
?>