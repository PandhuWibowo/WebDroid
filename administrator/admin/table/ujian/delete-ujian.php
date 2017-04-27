<?php include"../../connection/database.php";?>

<?php

    $delUjian = $_GET['id'];

    $delete = $con->prepare("DELETE FROM ujian WHERE id_tes = '$delUjian'");

    $delete->execute();
    header("location:../../ujian.php?msg=success");

?>