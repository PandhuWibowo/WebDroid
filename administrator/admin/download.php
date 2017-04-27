<?php

    include "koneksi.php";
    if(isset($_GET['id'])){
      $kd_tutor = $_GET['id'];
      $decrypt = base64_decode($kd_tutor);
      $sql = mysql_query("SELECT * FROM contents_administrator WHERE kd_tutor = '$decrypt'");

      if($hasil = mysql_fetch_array($sql))
      {
        $judul_tutor  = stripslashes($hasil['judul_tutor']);
        
        /*$alamat   = $hasil['alamat'];
        $handphone = $hasil['no_handphone'];
        $tmp_lahir = $hasil['tmp_lhr'];
        $tgl_lahir = $hasil['tgl_lhr'];
        $tampung_digrav = $hasil['email'];
        $tentang_saya = $hasil['tentang_saya'];
        $jen_kel = $hasil['jenkel'];
        $tgl_daftar = $hasil['tgl_dftr'];
        $usia = $hasil['usia'];
        $grav_url = "https://www.gravatar.com/avatar/" . md5($tampung_digrav) . "?d=retro";*/
        //$no_hp = $hasil['no_telp_guru'];
        //$email = $hasil['email_guru'];
        //$password = $hasil['password'];
        //$pendidikan_terakhir = $hasil['riwayat_pendidikan_guru'];
      }
    }

    // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$judul_tutor);

   // proses membaca isi file yang akan didownload dari folder 'data'
   $fp  = fopen("gambar/".$judul_tutor, 'r');
   //$content = fread($fp, filesize('gambar/'.$judul_tutor));
   fclose($fp);

   // menampilkan isi file yang akan didownload
   //echo $content;

   exit;
?>
- See more at: http://www.tutorialku.net/membuat-script-php-upload-download-file-via-folder.xhtml#sthash.xQ7C0Dtx.dpuf
