<?php

if ($_REQUEST['TipoCambio'] == 1) {
    include 'M-Usuario.php';
} else {
    include 'Elegir-Registro.php';
}

?>