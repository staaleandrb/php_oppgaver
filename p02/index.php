<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>p02 gangetabellen</title>
</head>
<body>
    <main>
        <h2>Gangetabellen</h2>
        <form action="index.php" method="post">
            <label for="tall">Tall:</label>
            <input type="number" name="tall" id="tall">
            <br>
            <input type="submit" value="Send inn">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tall = $_POST['tall'];
            echo "<h3>Gangetabellen for $tall</h3>";
            for ($i = 1; $i <= 10; $i++) {
                $produkt = $tall * $i;
                echo "$tall * $i = $produkt<br>";
            }
        }
        ?>
    </main>
</body>
</html>