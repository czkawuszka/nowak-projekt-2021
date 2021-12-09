<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sklep_users";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Nie połączono");
}
