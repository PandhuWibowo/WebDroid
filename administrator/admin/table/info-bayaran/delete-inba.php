<?php include"../../connection/database.php";?>

<?php

    $delInba = $_GET['id'];

    $delete = $con->prepare("DELETE FROM informasi_bayar WHERE id_informasi = '$delInba'");

    $delete->execute();
    header("location:../../info-bayar.php?msg=success");

?>