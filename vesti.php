<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .my_class{
            border: 2px solid black;
            width: 300px;
            margin-top: 3px;
        }
    </style>
</head>
<body>
    <h1>Zadatak 4</h1>
    <?php
        $db = @mysqli_connect("localhost","root","","pva_kol2_2022");
        if(!$db){
            echo "Greska prilikom konekcije na bazu<br>";
            echo mysqli_connect_errno().": ".mysqli_connect_error();
        }
        else{
            mysqli_query($db, "SET NAMES utf8");
        }
        $upit = "SELECT * FROM vesti";
        $odg = mysqli_query($db, $upit);
        if(mysqli_error($db)){
            
        }
        else{
            echo "Ukupno vesti: ".mysqli_num_rows($odg)."<br><hr>";
            while($red=mysqli_fetch_array($odg, MYSQLI_ASSOC)){
                echo '<div class="my_class">';   
                echo "<p id='par'>"."<b>".$red['naslov']."</b>"."</p>";
                echo $red['vreme']."<br>";
                
                echo "<button>";
                echo "Prikazi sadrzaj";
                echo "</button>";

                echo "<button>";
                echo "Obrisi vest";
                echo "</button>";

                echo '</div>';
            }
        }
        mysqli_close($db);
    ?>
    
</body>
</html>