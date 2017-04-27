<?php
    require_once "koneksi.php";
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $input = mysql_query("UPDATE contents_administrator SET status=1 WHERE kd_tutor='$id'") or die(mysql_error());


        if ($input)
        {
            header("location : table-transaksi.php");
        }
        else
        {
            echo "ada masalah query ";
        }
    }
    else{
        echo "Id tidak ditemukan ! ";
    }
?>