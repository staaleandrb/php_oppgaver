<!--
  Laget av Sturle Stiansen

-->

<?php

//Henter forbindelses-streng
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) 
    {
    if(isset($_POST['fornavn']) && isset($_POST['etternavn'])) 
        {
        $fornavn = $_POST['fornavn'];
        $etternavn = $_POST['etternavn'];
       
        $sql = "INSERT INTO `person` (`fornavn`,`etternavn`) VALUES ('$fornavn','$etternavn')";
        $run_query = mysqli_query($conn, $sql);
        }

    }
mysqli_close($conn);    
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'style.php';?>
    
    <title>Mine ansatte</title>
</head>
<body>
    <?php include 'meny.php';?>
    <header>
        <p>REGISTRER NY ANSATT<br></p>
    </header>
    
    <main>
        <?php
        if($run_query) 
            {
            echo '<p>En nye ansatt er blitt registrert!</p>';
            }
        else
            {
            echo '<p>Det oppsto en feil! Ansatt ble ikke registrert!</p>';
            }
    
       
        ?>
             
    </main>
        
    
</body>
</html>