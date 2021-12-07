<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "productdb";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Nie połączono");
}
