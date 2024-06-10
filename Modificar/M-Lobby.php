<?php

if ($_REQUEST['TipoCambio'] == 1) {
    include 'M-Usuario.php';
} else {
    include 'M-Registro.php';
}

?>