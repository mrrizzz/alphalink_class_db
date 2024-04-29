<?php
$server = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "classmate";

$connectdb = new mysqli($server, $username, $password, $dbname);

if ($connectdb->connect_error) {
  die('Failed to connect db' . $connectdb->connect_error);
}
?>