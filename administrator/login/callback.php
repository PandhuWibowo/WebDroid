<?php
    include_once "loginAdmin.php";

    if(isset($_POST['masuk'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $object = new Administrator();
        $object->Login($username, $password);
    }
?>