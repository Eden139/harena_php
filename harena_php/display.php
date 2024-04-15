<?php
    session_start();
    require("values.php");
    $revenus = $_SESSION['revenus'];
    $retrait = $_SESSION['retrait'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Budget</title>
    </head>
    <body>
        <header class="header">
            <div class="title">
                <img src="vola.png" alt="icon" width="40">
                <h2>Harena</h2>
            </div>
            <button class="ajout" type="button" onclick="openpopup()">
                <img src="img/plus-circle-svgrepo-com.svg">
                <p>Ajout</p>
            </button>
            <nav class="navbar">
                <a href="display.php">Accueil</a>
                <a href="history.php">Historique</a>
            </nav>
        </header>
        <main class="main-app">
            <div class="popup">
                <button type="button" onclick="closepopup()" class="close">
                    <img src="img/circle-xmark-svgrepo-com.svg">
                </button>
                <form action="transaction.php" method="post" class="form">
                    <h4>Ajout</h4>
                    <div class="input-group type">
                        <label for="type">Type: </label>
                        <select name="type" id="type">
                            <option value="deposition">Deposition</option>
                            <option value="retrait">Retrait</option>
                        </select>
                    </div>
                    <div class="input-group montant">
                        <label for="montant">Montant: </label>
                        <input type="text" name="montant" id="montant">
                    </div>
                    <div class="input-group">
                        <label for="description">Description: </label>
                        <textarea name="description" id="description" cols="30" rows="5" value="">
                        </textarea>
                    </div>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
            <h4>Votre meilleur ami dans le gestion de budget</h4>
            <div class="total">
                <div>
                    <div class="total-border">
                        <p><?php $i = $revenus - $retrait ;echo "$i"; ?> Ar</p>
                    </div>
                </div>
                <div class="count">
                    <p>Revenus : <?php echo $revenus == "" ? "0" : "$revenus";?> Ar</p>
                    <hr />
                    <p>Dépenses : <?php echo $retrait == "" ? "0" : "$retrait";?> Ar</p>
                </div>
            </div>
            

        </main> 

        <script>
            const popup = document.querySelector(".popup");
            function openpopup() {
                popup.classList.add("open-popup");
            }
            function closepopup() {
                popup.classList.remove("open-popup");
            }
        </script>
        
    </body>
</html>