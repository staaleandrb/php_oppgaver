<!-- 
Laget av: Staale Andre Bergersen


 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
</head>
<body>
    <h2>Quiz</h2>
    
    
<?php
    session_start();

    $fasit = array("ja", "nei", "ja");
    $sporsmal = array("Snør det i dag?", "Blir det sol?", "Er det kaldt?"); 

    if (!isset($_SESSION['index'])) {
        $_SESSION['index'] = 0;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['knapp1'])) {
            skrivSporsmal();
        } 
    }

function skrivSporsmal() {
    global $sporsmal;

    // Skriv ut elementet
    echo $sporsmal[$_SESSION['index']] . '<br>';
    echo $_SESSION['index'];

    // Øk indeksen for neste gang funksjonen kalles
    $_SESSION['index']++;

    // Hvis indeksen har nådd slutten av arrayen, tilbakestill den
    if ($_SESSION['index'] >= count($sporsmal)) {
        $_SESSION['index'] = 0;
    }
}
?>
<!-- HTML-skjema med knapp -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <button type="submit" name="knapp1">Skriv ut spørsmål</button>
</form>

</body>
</html>