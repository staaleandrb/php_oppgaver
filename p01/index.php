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
        <input type="submit" value="Send inn">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $navn1 = $_POST['navn1'];
            $alder1 = $_POST['alder1'];
            $navn2 = $_POST['navn2'];
            $alder2 = $_POST['alder2'];

            if ($alder1 > $alder2) {
                $eldstNavn = $navn1;
                $eldstAlder = $alder1;
                $aldersdifferanse = $alder1 - $alder2;
            } else {
                $eldstNavn = $navn2;
                $eldstAlder = $alder2;
                $aldersdifferanse = $alder2 - $alder1;
            }

            echo "Den eldste personen er $eldstNavn, $eldstAlder år gammel.";
            echo "Aldersdifferansen er $aldersdifferanse år.";
        }
        ?>
    </main>
    </body>
</html>