<?php
/*
$servername = "mysql.hostinger.es";
$username = "u445983167_jcgf";
$password = "jcgf02";
$dbname = "u445983167_bdinv";*/



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdinventarline";


// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 
