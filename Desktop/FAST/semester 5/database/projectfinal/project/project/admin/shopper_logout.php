<?php
include("conf.php");

unset($_SESSION['shopper']);
unset($_SESSION['shopperId']);

header('location: shopper_login.php');
?>