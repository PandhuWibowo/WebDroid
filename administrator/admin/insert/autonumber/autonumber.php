<?php
    function autonumber($tabel, $kolom, $lebar=0, $awalan=''){
        
        $host = "localhost";
        $usr = "root";
        $pass = "";
        $dbname = "saringanUjianMhs";
        $koneksi = mysqli_connect($host,$usr,$pass,$dbname);
        if(mysqli_connect_error()){
            echo "database gagal dikoneksikan".mysqli_connect_error();
        }
        
        //proses auto number

        $auto = mysqli_query($koneksi, "SELECT $kolom from $tabel order by $kolom desc limit 1") or die(mysqli_error());
        $jumlah_record = mysqli_num_rows($auto);
        if($jumlah_record==0)
        $nomor = 1;

        else{
            $row = mysqli_fetch_array($auto);
            $nomor = intval(substr($row[0], strlen($awalan)))+1;
        }
        if($lebar>0)
            $angka = $awalan.str_pad($nomor, $lebar,"0", STR_PAD_LEFT);
        else
            $angka=$awalan.$nomor;
        return $angka;
    }
?>