<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <!-- Inkluder ekstern CSS-fil for stiler -->
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* Legg til dine stiler her */
    </style>
</head>
<body>
    <h2>Quiz</h2>

    <?php
    session_start();

    $fasit = array("ja", "nei", "ja");
    $sporsmal = array("Snør det i dag?", "Blir det sol?", "Er det kaldt?");

    if (!isset($_SESSION['index'])) {
        $_SESSION['index'] = 0;
        $_SESSION['poeng'] = 0;
    
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['knapp1'])) {
            skrivSporsmal();
        } elseif (isset($_POST['submit_svar'])) {
            sjekkSvar();
        }
        elseif (isset($_POST['nyttSpill'])) {
            startNySesjon();
        }
    }


    function startNySesjon() {
            session_unset();
    }

    function skrivSporsmal() {
        global $sporsmal;
        if ($_SESSION['index'] < count($sporsmal)){   
            // Skriv ut spørsmålet
            echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '<p>' . $sporsmal[$_SESSION['index']] . '</p>';

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
        global $fasit, $sporsmal;

        // Hent brukerens svar og spørsmålsindeks
        $bruker_svar = $_POST['bruker_svar'];
        $sporsmal_indeks = $_POST['sporsmal_indeks'];

        // Sammenlign brukerens svar med fasiten
        $riktig_svar = $fasit[$sporsmal_indeks];
        if ($bruker_svar == $riktig_svar) {
            $resultat = 'Riktig!';
            $_SESSION['poeng']++;
        } else {
            $resultat = 'Feil. Riktig svar er ' . $riktig_svar;
        }
        // Vis resultatet
        echo '<p>' . $sporsmal[$sporsmal_indeks] . '</p>';
        echo '<p>Ditt svar: ' . $bruker_svar . '</p>';
        echo '<p>' . $resultat . '</p>';
    }
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
