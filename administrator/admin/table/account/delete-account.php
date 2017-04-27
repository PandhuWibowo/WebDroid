<?php include"../../connection/database.php";?>

<?php

    $delAccount = $_GET['id'];

    $delete = $con->prepare("DELETE FROM cln_mhs WHERE noClnMhs = '$delAccount'");

    $delete->execute();
    header("location:../../account.php");

?>