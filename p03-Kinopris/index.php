/**
 * Oppgave p03- kinopris!
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
    <title>Php – Pris på kino</title>
    <link rel="stylesheet" href="../stilark.css">
</head>
<body>

<h1>Php – Pris på kino</h1>
<form action="funksjoner.php" method="post" >
        <label for="antallBarn">Antall barn (2-12 år): </label>
        <input type="number" id="antallBarn" name="antallBarn" required><br>

        <label for="antallUngdom">Antall ungdom (13-17 år): </label>
        <input type="number" id="antallUngdom" name="antallUngdom" required><br>

        <label for="antallVoksne">Antall voksne (over 18 år): </label>
        <input type="number" id="antallVoksne" name="antallVoksne" required><br>

        <label for="fortsett">Vil du beregne pris for flere grupper? (ja/nei): </label>
        <input type="text" id="fortsett" name="fortsett" required><br>

        <input type="submit" name="submit" value="Beregn pris">
    </form>



</body>
</html>