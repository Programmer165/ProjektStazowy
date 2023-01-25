<?php
session_start();

    // dołączenie plików 
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja Strona</title>
</head>
<body>
    <style type="text/css">
        #button
        {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: burlywood;
            border: none;   
        }
    </style>

    <a id="button" href="logout.php">Wyloguj</a>
    <h1>To jest strona index </h1>

    <br>
    Witaj, <?php echo $user_data['imie'];?>.<br><br>
    <a>Twoje dane:</a><br>
    imię: <?php echo $user_data['imie'];?><br>
    nazwisko: <?php echo $user_data['nazwisko'];?><br>
    e-mail: <?php echo $user_data['mail'];?><br>

</body>
</html>