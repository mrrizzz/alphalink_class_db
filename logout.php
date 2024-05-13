<?php

session_start();
session_destroy(); 
setcookie('users', '', time() - 3600, '/');
header('Location: login.php');
exit;

?>