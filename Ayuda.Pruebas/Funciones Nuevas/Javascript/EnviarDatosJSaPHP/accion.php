<?php
if ($_POST) {  
        if (isset($_POST['datosPrompt'])){
            echo $_POST['datosPrompt'];
            } else {
            echo "No llegaron datos";
            }
    }
?>