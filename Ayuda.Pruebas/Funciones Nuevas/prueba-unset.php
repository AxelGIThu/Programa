<?php

session_start();

$_SESSION['1'] = 1;

echo $_SESSION['1'];

unset($_SESSION['1']);
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
session_destroy();

session_start();

$_SESSION['1'] = 1;

echo $_SESSION['1'];

session_destroy();

?>