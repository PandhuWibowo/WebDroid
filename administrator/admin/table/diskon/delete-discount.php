<?php include"../../connection/database.php";?>

<?php

    $deldiscount = $_GET['id'];

    $delete = $con->prepare("DELETE FROM diskon WHERE id_diskon = '$deldiscount'");

    $delete->execute();
    header("location:../../discount.php?msg=success");

?>