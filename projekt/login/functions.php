<?php

// funkcja sprawdzająca login
function check_login($con)
{
    if(isset($_SESSION['uzytkownik_id']))
    {
        $id = $_SESSION['uzytkownik_id'];
        $query = "select * from users where uzytkownik_id = '$id' limit 1"; // specjalna komenda słowna która wywołuje pewną akcję dla MySQL

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // odsyła do strony logowania
    header("Location login.php");
    die;
}

function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i=0; $i < $len; $i++) { 
        # code...
        $text .= rand(0,9); 
    }

    return $text;
}