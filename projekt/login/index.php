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

    <a href="logout.php">Logout</a>
    <h1>To jest strona index </h1>

    <br>
    Witaj, <?php echo $user_data['uzytkownik_nazwa']; ?>
</body>
</html>