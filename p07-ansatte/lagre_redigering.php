<?php
// Henter forbindelses-streng
include 'connect.php';

// Sjekk om skjemaet er sendt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Hent personens ansattnummer fra skjemaet
  $anr_to_rediger = mysqli_real_escape_string($conn, $_POST['anr']);

  // Hent data fra skjemaet
  $etternavn = mysqli_real_escape_string($conn, $_POST['etternavn']);
  $fornavn = mysqli_real_escape_string($conn, $_POST['fornavn']);

  // SQL-spørring for å oppdatere personens informasjon
  $sql_rediger = "UPDATE person SET etternavn = '$etternavn', fornavn = '$fornavn' WHERE anr = '$anr_to_rediger'";

  // Utfør oppdateringsoperasjonen
  if (mysqli_query($conn, $sql_rediger)) {
    echo "Endringer er lagret.";
  } else {
    echo "Feil ved lagring av endringer: " . mysqli_error($conn);
  }

  // Lukk databaseforbindelsen
  mysqli_close($conn);
}
?>
