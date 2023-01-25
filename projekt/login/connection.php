<?php

// dane do połączenia
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "_logowanie_php_staz";

// sprawdzanie połączenia z bazą na podstawie danych wyżej
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("nieudane połączenie!");
}