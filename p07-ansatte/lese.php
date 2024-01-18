<?php

//Henter forbindelses-streng
include 'connect.php';



//Prosedyre for lese
$sql_les = "SELECT anr, etternavn, fornavn  FROM person ORDER BY etternavn, fornavn";

$result_les = mysqli_query($conn, $sql_les);
$ansatte = mysqli_fetch_all($result_les, MYSQLI_ASSOC);

/*
foreach($ansatte as $person)
    {
    echo "<br>".$person['anr'];
    echo "<br>".$person['etternavn'];  
    echo "<br>".$person['fornavn'];  
    echo "<br>";    
    }
*/    

mysqli_free_result($result_les);    
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'style.php';?>
    
    <title>Mine Ansatte</title>
</head>
<body>
    <?php include 'meny.php';?>
    <header>
        <p>VIS ANSATTE<br></p>
    </header>

    <main>    
        <table>
            <thead>
                <tr>
                    <th>Ansattnr</th>
                    <th>Etternavn</th>
                    <th>Fornavn</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($ansatte as $person) { ?>
                <tr>
                    <td><?php echo $person['anr']; ?></td>    
                    <td><?php echo $person['etternavn']; ?></td>
                    <td><?php echo $person['fornavn']; ?></td>
                                        
                </tr>
                <?php } ?>
            </tbody>
              
        </table>
            
    </main>
        
    
</body>
</html>

   
