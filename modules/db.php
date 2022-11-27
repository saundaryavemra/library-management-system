<?php 
include ('config.php');

$connect = mysqli_connect($db_server_name, $db_username, $db_password, $db_name);
if (!$connect) {
    die("Povezivanje sa bazom podataka nije uspelo. Greska: " . mysqli_connect_error());
}