<!--
Her er en alternativ løsning for å beregne største mulige volum fra et ark (rektangel) til en boks.
Laget av: Sturle


Test av flexboks
Opplæringsvide: https://www.youtube.com/watch?v=phWxA89Dy94 
-->

<?php

$flagg = 0;

// Funksjon for å bregne boks-volum av et spesifikt rektagulært ark.
// Funksjonen tar føgende parametere: lengde, bredde og høyde
function volum_ark($l, $b, $h)
    {
    $volum = ($l-2*$h)*($b-2*$h)*$h;
    return $volum;
    }

// Dette utføres om "Finn max volum" knappen er valgt    
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['finn-volum']))
    {
    $flagg = 1;
    
    $bredde = $_POST['bredde'];
    $lengde = $_POST['lengde'];
    $hoyde = 0;    

    $inkr = 0.001;
        
    while (volum_ark($lengde, $bredde, $hoyde) < volum_ark($lengde, $bredde, $hoyde + $inkr))
        {
        $hoyde = $hoyde + $inkr;     
        }    
    $max_volum = volum_ark($lengde, $bredde, $hoyde);    
    }

// Dette utføres om "Tøm" knappen er valgt 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tom']))
    {
    $flagg = 0; 
    }

?>

<!-- Her lastet HTML-koden -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Volum på eske</title>
</head>
<body>
    <h1>Finn maksimalt volum på eske</h1>
    <section class="boks">
        <section class="boks inn">
            <h5>Registrer størrelsen på arket:</h5>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                
                <label for="bredde">Bredde på ark (cm):</label> <br>
                <input type="number" name="bredde" min="0" step="0.01" required> <br> 
                
                <label for="lengde">Lengde på ark (cm):</label> <br>
                <input type="number" name="lengde" min="0" step="0.01" required> <br>

                <input type="submit" name="finn-volum" value="Finn max volum"></input>
                        
            </form>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                <input type="submit" name="tom" value="Tøm"></input>

            </form>
        </section> 
        
        <section class="boks ut">
            <h5>Resulat:</h5>
                <p>
                    <?php
                    if ($flagg == 0)
                        {
                        echo 'Venter på bredde og lengde på arket!';    
                        }
                    else if ($flagg == 1)
                        {    
                        echo 'Den ideelle høyden er ' . number_format($hoyde, 2) . ' cm. 
                        Dette gir et volum på ' . number_format($max_volum, 2) . ' cm3.';
                        }
                    

                    ?>
                </p>
                
        </section>
    </section>    
        
</body>
</html>