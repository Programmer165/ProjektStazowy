<?php
session_start();

    // dołączenie plików 
    include("connection.php");
    include("functions.php");
    include("send-mail.php");

    // Założenie pytające bazę
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // wpisane dane użytkownika (login, hasło)
        $user_name = $_POST['uzytkownik_nazwa'];
        $_name = $_POST['imie'];
        $s_name = $_POST['nazwisko'];
        $_mail = $_POST['mail'];
        $password = $_POST['haslo'];
    
        // założenie jeśli imie != nazwisko, imie nazwisko, nazwa użytkownika i hasło nie są puste i nazwa nie jest numeryczna
        if(!empty($user_name) && !empty($_name) && !empty($s_name) && $_name != $s_name && !empty($_mail) && !empty($password) && !is_numeric($user_name))
        {
            // id użytkownika do 20
            $user_id = random_num(20);
            $query = "insert into users (uzytkownik_id, imie, nazwisko, mail, uzytkownik_nazwa, haslo) values ('$user_id', '$_name', '$s_name', '$_mail', '$user_name', '$password')";// specjalna komenda słowna która wywołuje pewną akcję dla MySQL
        
            // pyta bazę
            mysqli_query($con, $query);
            send_mail_to_admin($_name, $_mail);
            header("Location: login.php"); // odsyła do strony logowania
            die;
        }
        else
        {
            // jeśli któreś pole jest puste lub są błędne dane
            echo "Proszę podać aktualne informacje.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <!--Style dla przycisków interakcyjnych strony-->
    <style type="text/css">
        #text
        {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 85%;
        }

        #button
        {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: burlywood;
            border: none;   
        }

        #box
        {
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }

    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px;">Rejestracja</div>
            
            <label>imię:</label>
            <input id="text" type="text" name="imie"><br><br>
            <label>nazwisko:</label>
            <input id="text" type="text" name="nazwisko"><br><br>
            <label>nazwa użytkownika:</label>
            <input id="text" type="text" name="uzytkownik_nazwa"><br><br>
            <label>hasło:</label>
            <input id="text" type="password" name="haslo"><br><br>
            <label>e-mail:</label>
            <input id="text" type="email" name="mail"><br><br>
            

            <input id="button" type="submit" name="Zarejestruj"><br><br>
            <a href="login.php">Zaloguj się</a>
        </form>
    </div>

</body>
</html>
