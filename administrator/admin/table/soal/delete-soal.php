<?php include"../../connection/database.php";?>

<?php

    $delSoal = $_GET['id'];

    $delete = $con->prepare("DELETE FROM soal WHERE id_soal = '$delSoal'");

    $delete->execute();
    header("location:../../soal.php?msg=success");

?>