/**
 * Oppgave p02- gangetabellen!
 * Porsgrunn vgs - 2023
 * Utvikling vg2
 * 
 * Laget av Staale Andre Bergersen
 */

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>p02 gangetabellen</title>
</head>
<body>
    <main>
        <h2>Gangetabellen</h2>
        <form action="index.php" method="post">
            <label for="tall">Tall:</label>
            <input type="number" name="tall" id="tall">
            <br>
            <input type="submit" value="Send inn">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Sjekker om skjemaet er sendt inn
            $tall = $_POST['tall'];                   // Henter ut verdien fra skjemaet
            echo "<h3>Gangetabellen for $tall</h3>";  // Skriver ut overskriften
            for ($i = 1; $i <= 10; $i++) {            // Løkke som går fra 1 til 10
                $produkt = $tall * $i;                // Regner ut produktet  
                echo "$tall * $i = $produkt<br>";   // Skriver ut gangetabellen
            }
        }
        ?>
    </main>
</body>
</html>