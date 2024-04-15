<!DOCTYPE html>
<html>
<head>
    <title>Transaction History</title>
</head>
<body>
    <h1>Transaction History</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <?php
            require "connection.php";

            $stmt = $conn->prepare("SELECT * FROM transactions ORDER BY date DESC");
            $stmt->execute();
            $re = $stmt->get_result();

            while ($row = $re->fetch_assoc()) {
                echo $row["type"] . ", " . $row["description"] . ", " . $row["amount"] . ", " . $row["date"] . "\n";
                $type = $row["type"];
                $description = $row["description"];
                $date = $row["date"];
                $amount = $row["amount"];                
                $id = $row["id"];                
                
                echo "<tr>
                        <td>$id</td>
                        <td>$type</td>
                        <td>$description</td>
                        <td>$amount</td>
                        <td>$date</td>
                    </tr>";
            }
        ?>


    </table>
</body>
</html>