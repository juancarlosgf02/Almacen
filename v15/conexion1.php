<?php
/*define('hostname', 'localhost');
//define('user', 'root');
define('password', '');
define('databaseName', 'bdinventarline');
$connect = mysqli_connect(hostname, user, password, databaseName);*/

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdinventarline";*/


$servername = "mysql.hostinger.es";
$username = "u445983167_jcgf";
$password = "jcgf02";
$dbname = "u445983167_bdinv";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 
