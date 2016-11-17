<?php
    //$link=mysqli_connect("localhost","root","","bdinventarline") or die ("No se pudo conectar:" ); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdinventarline";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 