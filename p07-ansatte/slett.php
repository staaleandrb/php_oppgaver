<?php
// Henter forbindelses-streng
include 'connect.php';

// Sjekk om skjemaet er sendt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Hent personens ansattnummer fra skjemaet
  $anr_to_slett = mysqli_real_escape_string($conn, $_POST['anr']);

  // SQL-spørring for å slette personen
  $sql_slett = "DELETE FROM person WHERE anr = '$anr_to_slett'";

  // Utfør sletteoperasjonen
  if (mysqli_query($conn, $sql_slett)) {
    echo "Personen er slettet.<br>";
    echo "<a href='index.php'>Tilbake</a><br>";
  } else {
    echo "Feil ved sletting av person: " . mysqli_error($conn);
  }
}

// Lukk databaseforbindelsen
mysqli_close($conn);
?>
