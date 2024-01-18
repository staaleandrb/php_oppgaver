/**
 * Oppgave p06 - quiz med database
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
    <title>p06-quiz</title>
    <link rel="stylesheet" href="https://staale.imporsgrunn.no/style.css">
</head>
<body>
    <h2>Quiz løst med database</h2>
    
    <?php
session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'quiz_database';

// Opprett tilkobling til databasen
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Tilkobling mislyktes: " . $conn->connect_error);
}

// Hent spørsmål fra databasen
$sql = "SELECT id, sporsmaltekst, fasit FROM sporsmal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sporsmalData = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Ingen spørsmål funnet i databasen.";
    exit;
}

if (!isset($_SESSION['index'])) {
    $_SESSION['index'] = 0;
    $_SESSION['poeng'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['knapp1'])) {
        skrivSporsmal();
    } elseif (isset($_POST['submit_svar'])) {
        sjekkSvar();
    } elseif (isset($_POST['nyttSpill'])) {
        startNySesjon();
    }
}

function startNySesjon() {
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['index'] = 0;
    $_SESSION['poeng'] = 0;
}

function skrivSporsmal() {
    global $sporsmalData;

    // Hvis indeksen ikke har nådd slutten av arrayen
    if ($_SESSION['index'] < count($sporsmalData)){   
        // Skriv ut spørsmålet
        echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
        echo '<p>' . $sporsmalData[$_SESSION['index']['sporsmaltekst']] . '</p>';

        // Legg til radioknapper for hvert svaralternativ
        echo '<label><input type="radio" name="bruker_svar" value="ja"> Ja</label>';
        echo '<label><input type="radio" name="bruker_svar" value="nei"> Nei</label>';

        // Legg til skjult input for å sende spørsmålsindeksen
        echo '<input type="hidden" name="sporsmal_indeks" value="' . $_SESSION['index'] . '">';

        // Legg til knapp for å sende svar
        echo '<button type="submit" name="submit_svar">Send Svar</button>';
        echo '</form>';

        // Øk indeksen for neste gang funksjonen kalles
        $_SESSION['index']++;
    }
    // Hvis indeksen har nådd slutten av arrayen
    else  {
        echo '<p>Spillet er over.<br>Du fikk ' . $_SESSION['poeng'] . ' poeng. </p>';
    }
}

function sjekkSvar() {
    global $sporsmalData;

    // Hent brukerens svar og spørsmålsindeks
    $bruker_svar = $_POST['bruker_svar'];
    $sporsmal_indeks = $_POST['sporsmal_indeks'];

    // Sammenlign brukerens svar med fasiten
    $riktig_svar = $sporsmalData[$sporsmal_indeks]['fasit'];
    if ($bruker_svar == $riktig_svar) {
        $resultat = 'Riktig!';
        $_SESSION['poeng']++;
    } else {
        $resultat = 'Feil. Riktig svar er ' . $riktig_svar;
    }

    // Vis resultatet
    echo '<p>' . $sporsmalData[$sporsmal_indeks]['sporsmaltekst'] . '</p>';
    echo '<p>Ditt svar: ' . $bruker_svar . '</p>';
    echo '<p>' . $resultat . '</p>';
}

// Lukk tilkoblingen til databasen
$conn->close();
?>

<!-- HTML-skjema med en knapp -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <button type="submit" name="knapp1">Neste spørsmål</button>
</form>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <button type="submit" name="nyttSpill">Start på nytt</button>
</form>
</body>
</html>

