<?php
session_start();

    // dołączenie plików 
    include("connection.php");
    include("functions.php");

    // Założenie pytające bazę
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // wpisane dane użytkownika (login, hasło)
        $user_name = $_POST['uzytkownik_nazwa'];
        $password = $_POST['haslo'];

        // założenie jeśli nazwa i hasło nie są puste i nazwa nie jest numeryczna
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            // czyta z bazy
            $query = "select * from users where uzytkownik_nazwa = '$user_name' limit 1";// specjalna komenda słowna która wywołuje pewną akcję dla MySQL
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['haslo'] == $password)
                    {
                        $_SESSION['uzytkownik_id'] = $user_data['uzytkownik_id']; 
                        header("Location: index.php"); // odsyła do strony index
                        die;
                    }
                }
            }
            echo "Podane hasło lub login jest błędne.";
        }
        else
        {
            echo "Podane hasło lub login jest błędne.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
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
            <div style="font-size: 20px; margin: 10px;">Logowanie</div>
            
            <input id="text" type="text" name="uzytkownik_nazwa"><br><br>
            <input id="text" type="password" name="haslo"><br><br>

            <input id="button" type="submit" name="Login"><br><br>
            <a href="signup.php">Zarejestruj się</a>
        </form>
    </div>

</body>
</html>
