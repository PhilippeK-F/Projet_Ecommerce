<?php

session_start();

if(isset($_SESSION['session77'])){
    $_SESSION['session77'] = array();

    session_destroy();

    header("Location: ../");
}else{
    header("Location: ../login.php");
}



?>