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
    $fasit = array("ja", "nei", "ja");
    $sporsmal = array("Snør det i dag?", "Blir det sol?", "Er det kaldt?"); 

    // En session i PHP begynner vanligvis ved å kalle session_start(). 
    //Dette kan plasseres øverst på PHP-skriptet, før HTML-koden eller annen PHP-kode. 
    //Denne funksjonen starter en ny eller gjenoppretter en eksisterende session.
    
    session_start();

    // Du kan lagre data i en session ved å tilordne verdier til $_SESSION-superglobalen. 
    //Dette gjør at dataene er tilgjengelige på tvers av forskjellige sider 
    // eller forespørsler for den samme brukeren.
     
    if (!isset($_SESSION['index'])) {
        $_SESSION['index'] = 0;
    }
        

    // Sjekk hvilken knapp som ble klikket, og kall deretter tilsvarende PHP-funksjon
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['knapp1'])) {
            skrivSporsmal();
        } elseif (isset($_POST['knapp2'])) {
            skrivFasit();
        } 
    }

    // Funksjon for å skrive ut ett element av gangen
function skrivSporsmal() {
    // Bruk global for å få tilgang til variabelen utenfor funksjonen
    global $sporsmal;
        
    // Skriv ut elementet
    echo $sporsmal[$_SESSION['index']] . '<br>';
        
   // Øk indeksen for neste gang funksjonen kalles
   $_SESSION['index']++;
        
    // Hvis indeksen har nådd slutten av arrayen, tilbakestill den
   // if ($_SESSION['index'] >= count($sporsmal)) {
   //     $_SESSION['index'] = 0;
   //     }
    
    }

function skrivFasit() {

    echo ' skriver ut fasit';
}

   
    ?>
<!-- HTML-skjema med flere knapper -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <button type="submit" name="knapp1">Skriv ut spørsmål</button>
    <button type="submit" name="knapp2">Skriv ut fasit</button>
</form>

</body>
</html>