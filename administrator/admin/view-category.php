<?php
  require_once "koneksi.php";
  session_start();
  if(!isset($_SESSION['username'])){
    ?>
    <script >
        alert("Login terlebih dahulu");
        document.location="page-login.php";
    </script>
    <?php
  }

  if(isset($_GET['id']))
  {
    $kd_kat = $_GET['id'];
    $decrypt = base64_decode($kd_kat);
    $query = "select * from category where kd_kat='$decrypt'";
    $sql = mysql_query($query);

    if($hasil = mysql_fetch_array($sql))
    {
      $nama = $hasil['nama_cat'];
      /*$username  = $hasil['username'];
			$nm_lengkap = $hasil['nm_lengkap'];
      $email = $hasil['email'];
      //$about  = $hasil['tentang_saya'];
      $alamat   = $hasil['alamat'];
      $handphone = $hasil['no_handphone'];
      $temp_lahir = $hasil['temp_lahir'];
      $tgl_lahir = $hasil['tgl_lahir'];
      $tampung_digrav = $hasil['email'];
      $jen_kel = $hasil['jen_kel'];
      $tgl_daftar = $hasil['tgl_dftar'];
      $tentang_saya = $hasil['tentang_saya'];
      $grav_url = "https://www.gravatar.com/avatar/" . md5($tampung_digrav) . "?d=retro";*/
      //$no_hp = $hasil['no_telp_guru'];
      //$email = $hasil['email_guru'];
      //$password = $hasil['pw_guru'];
      //$pendidikan_terakhir = $hasil['riwayat_pendidikan_guru'];
    }

  }
  else
  {
    echo "TIDAK ADA DATA YANG DIPILIH !";
  }
?>
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>rootorial | Category Update</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->

  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body class="indigo">

  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-10 card-panel">
      <form class="login-form" method="post" action="login_admin-proses.php">
        <h4><b>Detail Category</b></h4>
        <div class="row margin">
          <div class="input-field col s12">
            <tr>
              <td><b>Kode Category</b></td>
              <td>:</td>
              <td><?php echo $decrypt; ?></td>
            </tr>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <tr>
              <td><b>Nama Category</b></td>
              <td>:</td>
              <td><?php echo $nama; ?></td>
            </tr>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large waves-effect waves-light red tooltipped" href="table_kat-minat.php" data-position="left" data-delay="50" data-tooltip="Press Me for back to table category">
      <i class="large mdi-navigation-arrow-back"></i>
    </a>
    <script>
    $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
    });
    </script>
  </div>


  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.js"></script>

</body>

</html>
