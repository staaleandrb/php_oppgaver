<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet" href="../stilark.css">
    <title>Eskevolumkalkulator</title>
</head>
<body>

    <h2>Eskevolumkalkulator</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $arkLengde = $_POST['arkLengde'];
        $arkBredde = $_POST['arkBredde'];

        // Loop gjennom alle mulige høyder for å finne største volum
        $maksVolum = 0;
        $besteHoyde = 0;

        for ($hoyde = 1; $hoyde <= 10; $hoyde++) {
            $volum = beregnVolum($arkLengde, $arkBredde, $hoyde);

            if ($volum > $maksVolum) {
                $maksVolum = $volum;
                $besteHoyde = $hoyde;
            }
        }

        echo "<p>Beste høyde for størst volum er: $besteHoyde</p>";
        echo "<p>Største volum er: $maksVolum</p>";
    }

    // Egendefinert funksjon for å beregne volumet av esken
    function beregnVolum($lengde, $bredde, $hoyde) {
        return $lengde * $bredde * $hoyde;
    }
    ?>

    <form action="" method="post">
        <label for="arkLengde">Ark lengde:</label>
        <input type="text" name="arkLengde" required>

        <label for="arkBredde">Ark bredde:</label>
        <input type="text" name="arkBredde" required>

        <input type="submit" value="Finn største volum">
    </form>

</body>
</html>
