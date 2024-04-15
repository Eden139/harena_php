<?php
require("connection.php");

class Insertion {
    public static function insert($type, $description, $amount) {
        $connection = new Connection();
        $conn = $connection->getConnection();
        $date = date('Y-m-d');

        $insert = "INSERT INTO transactions (type, description, amount, date) VALUES ('$type', '$description', $amount, '$date')";

        if (mysqli_query($conn, $insert)) {
            echo "Inséré avec succès";
        }
        else {
            echo "Pas inséré: " . mysqli_error($conn);
        }
    }
}
?>