<?php 
session_start();
header('Location: 0-Login.php');

unset($_SESSION['$email']);
unset($_SESSION['$senha']);

?>