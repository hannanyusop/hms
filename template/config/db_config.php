<?php

$GLOBALS['db'] = $db = new mysqli("localhost", "root", "", "");

if($db->connect_error){
    header('Location: ../error.php');
}

?>