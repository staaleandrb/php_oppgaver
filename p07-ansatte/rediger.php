<?php
// Henter forbindelses-streng
include 'connect.php';

// Sjekk om skjemaet er sendt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Hent personens ansattnummer fra skjemaet
  $anr_to_rediger = mysqli_real_escape_string($conn, $_POST['anr']);

  // Hent informasjon om personen basert på ansattnummer
  $sql_hent_person = "SELECT * FROM person WHERE anr = '$anr_to_rediger'";
  $result_person = mysqli_query($conn, $sql_hent_person);
  $person_to_rediger = mysqli_fetch_assoc($result_person);

  // Vis skjemaet for redigering med eksisterende data
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php include 'style.php';?>
      <title>Rediger Person</title>
  </head>
  <body>
      <?php include 'meny.php';?>
      <header>
          <p>REDIGER PERSON<br></p>
      </header>
      <main>
          <form action="lagre_redigering.php" method="post">
              <input type="hidden" name="anr" value="<?php echo $person_to_rediger['anr']; ?>">
              <label for="etternavn">Etternavn:</label>
              <input type="text" id="etternavn" name="etternavn" value="<?php echo $person_to_rediger['etternavn']; ?>" required>
              
              <label for="fornavn">Fornavn:</label>
              <input type="text" id="fornavn" name="fornavn" value="<?php echo $person_to_rediger['fornavn']; ?>" required>
              
              <!-- Legg til flere felt etter behov -->

              <button type="submit">Lagre endringer</button>
          </form>
      </main>
  </body>
  </html>
  <?php

  // Frigjør resultatet og lukker databaseforbindelsen
  mysqli_free_result($result_person);
  mysqli_close($conn);

  // Avslutt skriptet etter å ha vist skjemaet for redigering
  exit();
}
?>
