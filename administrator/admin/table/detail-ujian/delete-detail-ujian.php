<?php include"../../connection/database.php";?>

<?php

    $delTes = $_GET['id'];
    $delSoal = $_GET['id_soal'];

    $delete = $con->prepare("DELETE FROM detail_ujian WHERE id_tes = '$delTes' AND id_soal = '$delSoal'");

    $delete->execute();
    header("location:../../detail_ujian.php?msg=success");

?>