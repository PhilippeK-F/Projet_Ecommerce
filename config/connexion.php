<?php

try{
    $access=new pdo("mysql:host=localhost;dbname=E_commerce;charset=utf8", "root", "");
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e)
{
    $e->getMessage();
}

?>