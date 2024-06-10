<?php

session_start();
// $_SESSION['ID'] = 0;
echo $_SESSION['ID'];
session_destroy();

?>