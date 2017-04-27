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
    $kd_bhsPem = $_GET['id'];
    $decrypt = base64_decode($kd_bhsPem);
    $query = "select * from bahasa_pemrograman where kd_bhsPem='$decrypt'";
    $sql = mysql_query($query);

    if($hasil = mysql_fetch_array($sql))
    {
      $nama = $hasil['nama_bp'];
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
  <title>rootorial | Data Form</title>

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


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <script type="text/javascript">
      function konfirmasi(){
          tanya = confirm("Anda Yakin akan Logout?");
          if(tanya == true)return true;
          else return false;
      }
  </script>
</head>

<body>

  <?php
      $username = $_SESSION['username'];
      include "koneksi.php";
      $sql = "select * from administrator where username='".$username."'";
      $query = mysql_query($sql);
      while($r = mysql_fetch_array($query)){
      $tampung_digrav = $r['email'];
      $grav_url = "https://www.gravatar.com/avatar/" . md5($tampung_digrav) . "?d=retro";
  ?>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="indigo">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="" alt=""></a> <span class="logo-text">Materialize</span></h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light show-search tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click Me for Search something"><i class="mdi-action-search"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click Me for Oversize"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <script>
                        $(document).ready(function(){
                          $('.tooltipped').tooltip({delay: 50});
                        });
                        </script>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
              <li class="user-details indigo darken-2">
                  <div class="row">
                      <div class="col col s4 m4 l4">
                          <img src="<?php echo $grav_url;?>" alt="" class="circle responsive-img valign profile-image">
                      </div>
                      <div class="col col s8 m8 l8">
                          <ul id="profile-dropdown" class="dropdown-content">
                              <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                              </li>
                              <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                              </li>
                              <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                              </li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                              </li>
                              <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                              </li>
                          </ul>
                          <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $r['nama'];?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                          <p class="user-roal">Administrator</p>
                      </div>
                  </div>
              </li>
              <li class="bold"><a href="index.php" class="waves-effect waves-indigo"><i class="mdi-action-dashboard"></i> Dashboard</a>
              </li>

              <li class="li-hover"><div class="divider"></div></li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
      </aside>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Data Form</h5>
                <ol class="breadcrumb">
                  <li><a href="index.php">Dashboard</a>
                  </li>
                  <li><a href="#">Data Form</a>
                  </li>
                  <li><a href="table_kat-minat.php">Table Category Minat</a>
                  <li class="active">Category Update</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Masukkan tutorial yang baik, bagus, dan menarik</p>

            <div class="divider"></div>


            <!-- Form with icon prefixes -->
            <div class="row">
              <!-- Form with validation -->
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <div class="row">
                    <form class="col s12" method="post" action="bhs_pem-proses.php">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-hardware-keyboard-control prefix"></i>
                          <input id="kd_bp" readonly="" type="text" class="validate" name="kd_bp" value="<?php echo $decrypt; ?>">
                          <label for="kd_bp">Kode Sudah Terisi Otomatis</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-social-person-add prefix"></i>
                          <input id="nama_bp" type="text" class="validate" name="nama_bp" value="<?php echo $nama; ?>">
                          <label for="nama_bp">Nama</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="row">
                          <div class="input-field col s12">
                            <a class="btn blue waves-effect waves-light left" href="index.php">KEMBALI
                              <i class="mdi-navigation-arrow-back left"></i>
                            </a>
                            <button class="btn indigo waves-effect waves-light right" type="submit" name="update">SIMPAN
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- END CONTENT -->
  </div>
  <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->
  <?php
    }
  ?>


  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer indigo">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2017 <a class="grey-text text-lighten-4">rootorial</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>
        </div>
    </div>
  </footer>
  <!-- END FOOTER -->



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
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>

</body>

</html>
