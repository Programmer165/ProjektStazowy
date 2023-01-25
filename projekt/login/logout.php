<?php

session_start();

if(isset($_SESSION['uzytkownik_nazwa']))
{
    unset($_SESSION['uzytkownik_nazwa']);
}

header("Location: login.php");