/**
 * Oppgave 01- Hvem er eldst!
 * Porsgrunn vgs - 2023
 * Utvikling vg2
 * 
 */


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stilark.css">
    <title>Hvem er eldst</title>
</head>
<body>
    <main>
        <h2>Hvem er eldst?</h2>
    
         <form action="index.php" method="post">
        <label for="navn1">Navn 1:</label>
        <input type="text" name="navn1" id="navn1">
        <br>
        <label for="alder1">Alder 1:</label>
        <input type="number" name="alder1" id="alder1">
        <br>
        <label for="navn2">Navn 2:</label>
        <input type="text" name="navn2" id="navn2">
        <br>
        <label for="alder2">Alder 2:</label>
        <input type="number" name="alder2" id="alder2">
        <br>
        <label for="test">test:</label>
        <input type="number" name="test" id="test">
        <br>
        <input type="submit" value="Send inn">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Sjekker om skjemaet er sendt inn
            $navn1 = $_POST['navn1'];                // Henter ut verdien fra skjemaet
            $alder1 = $_POST['alder1'];              // Henter ut verdien fra skjemaet
            $navn2 = $_POST['navn2'];               // Henter ut verdien fra skjemaet
            $alder2 = $_POST['alder2'];             // Henter ut verdien fra skjemaet

            if ($alder1 > $alder2) {            // Sjekker hvem som er eldst
                $eldstNavn = $navn1;            // Setter eldstNavn til navn1
                $eldstAlder = $alder1;          // Setter eldstAlder til alder1
                $aldersdifferanse = $alder1 - $alder2;
                          
            } else if ($alder1 > $alder2) {                            // Hvis ikke
                $eldstNavn = $navn2;            // Setter eldstNavn til navn2
                $eldstAlder = $alder2;          // Setter eldstAlder til alder2
                $aldersdifferanse = $alder2 - $alder1;      // Regner ut aldersdifferansen
            }
            else{
                echo "De er like gamle";
            }

            echo "Den eldste personen er $eldstNavn, $eldstAlder år gammel.";       // Skriver ut resultatet
            echo "Aldersdifferansen er $aldersdifferanse år.";                      // Skriver ut resultatet
        }
        ?>
        <h1>Tullball fra Sturle</h1>
    </main>
    </body>
</html>