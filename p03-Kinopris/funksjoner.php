<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Sjekker om skjemaet er sendt inn
        if (isset($_POST['submit'])) {
            // Kjør PHP-funksjonen 
            beregnPris();
        }
    }

// Funksjon for å beregne prisen basert på alder og antall personer
function beregnPris() {
    // Les inn antall personer fra brukeren
    $antallBarn = (int) $_POST["antallBarn"];
    $antallUngdom = (int) $_POST["antallUngdom"];
    $antallVoksne = (int) $_POST["antallVoksne"];
    
    $prisBarn = 80;
    $prisUngdom = 100;
    $prisVoksen = 120;

    $totalPrisBarn = $antallBarn * $prisBarn;
    $totalPrisUngdom = $antallUngdom * $prisUngdom;
    $totalPrisVoksen = $antallVoksne * $prisVoksen;

    $totalSum = $totalPrisBarn + $totalPrisUngdom + $totalPrisVoksen;

    echo "Totalpris for barn: " . $totalPrisBarn . " kroner<br>";
    echo "Totalpris for ungdom: " . $totalPrisUngdom . " kroner<br>";
    echo "Totalpris for voksne: " . $totalPrisVoksen . " kroner<br>";
    echo "Total sum: " . $totalSum . " kroner<br>";
}

?>