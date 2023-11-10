<?php
require('apiRDR2.php');
require('apiGTAV.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        color: white;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    h3{
        color: gold;
    }

    textarea{
        background-color: #333;
        color: wheat;
        border-radius:5px;
        padding: 5px;
        width: 80%;
    }

    .fundorasgado{
        background-image: url('https://s.rsg.sc/sc/images/games/RDR2/background/Overview_mission_bg.png');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-color: black;
        
        background-color: transparent;
        width: 90%;
        color: aliceblue;
        z-index: -1;
         
        padding: 10px;
        padding-bottom: 60px;
        padding-top: 60px;
    }
	 .fundorasgado img{ 
        width: 75%; 
    }
    html{
        background-image: url('https://s.rsg.sc/sc/images/games/RDR2/bg.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-color: black;
		background-size: 100% 200%;
    }
    button{ 
        width:50%;
        background-color:#666;
        color:aliceblue;
        padding:4px;
        border:none;
        border-radius:5px;
        transition: all 1s linear;
    } 
    button:hover{
        background-color:green;
        color:aliceblue;
    }

    .down{
        width:50%;
        background-color:green;
        color:aliceblue;
        padding:4px;
        border:none;
        border-radius:5px;
        transition: all 1s linear;
    } 
    .down:hover{
        background-color:cyan;
        color:black;
    } 
</style>

<body>
    <center>
		<img style="width:20px" src="https://s.rsg.sc/sc/images/react/logo/rockstar_small.png"><br> 
        <div class="fundorasgado">
			
        <br>
		<img src="https://s.rsg.sc/sc/images/react/games/rdr2/logo.png"><br>
		<img src="https://s.rsg.sc/sc/images/games/GTAV/spinelogo-20131015.png"><br>
        <?php
        if (isset($_POST['codigo'])) 
        {
            if (stripos($_POST['codigo'], 'horse') !== false)
                echo '<h2>RDR2 Code founded</h2>'; 
                
            if (stripos($_POST['codigo'], 'CASINO') !== false)
                echo '<h2>GTAV Code founded</h2>';

            if ($_POST['modo'] == 'o')
            {
                if ($_POST['jogo'] == 'rdr2')
                {
                    file_put_contents('newFile.h',encriptRDR2($_POST['codigo']));
                }
                if ($_POST['jogo'] == 'gtav')
                {
                    file_put_contents('newFile.h',encriptGTAV($_POST['codigo']));
                }
            }
                
            if ($_POST['modo'] == 'd')
            {
                if ($_POST['jogo'] == 'rdr2')
                {
                    file_put_contents('newFile.h',decriptRDR2($_POST['codigo']));
                }
                if ($_POST['jogo'] == 'gtav')
                {
                    file_put_contents('newFile.h',decriptGTAV($_POST['codigo']));
                }
            }
               

            while(!file_exists("newFile.h"))
            {
               
            }
            echo ' <a href="newFile.h" download><button class="down">Download Code</button></a><br><br>';
            echo ' <a href="index.php"><button class="down">Go Back</button></a><br><br>';
        }
        else
        {
            echo '
            <form action="" method="post">
            <textarea name="codigo" id="" cols="30" rows="10" placeholder="Paste your code here!"></textarea><br>
            <input type="radio" name="modo" id="" value="o" checked>Encrypt<br>
            <input type="radio" name="modo" id="" value="d">Decrypt<br><br>
            
            <input type="radio" name="jogo" id="" value="rdr2" checked>Red Dead Redemption 2<br>
            <input type="radio" name="jogo" id="" value="gtav">Grand Theft Auto 5<br>
            

            <br><br>
            <button type="submit">Process</button>
        </form>
        ';
        }

        ?>
       </div>
    </center>
</body>

</html>