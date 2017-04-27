<?php
    $dsn = 'mysql:host=localhost;dbname=saringanUjianMhs';
    $username = 'root';
    $password = '';

    try{
        $con = new PDO ($dsn, $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $ex){
        echo 'Not Connected'.$ex->getMessage();
    }
?>