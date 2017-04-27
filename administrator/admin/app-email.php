<?php
require_once ("koneksi.php");
session_start();
if(!isset($_SESSION['username'])){
    ?>
    <script>
        //alert("Login terlebih dahulu");
        document.location="page-login.php";
    </script>
    <?php
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
  <title>rootorial | Data Master</title>

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
  <link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">



  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
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
                              <li><a href="logout.php" onclick="return konfirmasi()"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                              </li>
                          </ul>
                          <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $r['nama'];?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                          <p class="user-roal">Administrator</p>
                      </div>
                  </div>
              </li>
              <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-indigo"><i class="mdi-action-dashboard"></i>Dashboards</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="index.php">Dashboard Admin</a>
                                </li>
                                <li><a href="http://rootorial.com">Lihat Index</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                      <li class="bold"><a class="collapsible-header waves-effect waves-indigo"><i class="mdi-action-invert-colors"></i> CSS</a>
                          <div class="collapsible-body">
                              <ul>
                                  <li><a href="css-typography.html">Typography</a>
                                  </li>
                                  <li><a href="css-icons.html">Icons</a>
                                  </li>
                                  <li><a href="css-shadow.html">Shadow</a>
                                  </li>
                                  <li><a href="css-media.html">Media</a>
                                  </li>
                                  <li><a href="css-sass.html">Sass</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="bold"><a class="collapsible-header  waves-effect waves-indigo"><i class="mdi-image-palette"></i> UI Elements</a>
                          <div class="collapsible-body">
                              <ul>
                                <li><a href="ui-buttons.html">Buttons</a>
                                </li>
                                <li><a href="ui-collections.html">Collections</a>
                                </li>
                                <li><a href="ui-accordions.html">Accordian</a>
                                </li>
                                <li><a href="ui-modals.html">Modals</a>
                                </li>
                                <li><a href="ui-media.html">Media</a>
                                </li>
                                <li><a href="ui-toasts.html">Toasts</a>
                                </li>
                                <li><a href="ui-tooltip.html">Tooltip</a>
                                </li>
                              </ul>
                          </div>
                      </li>
                      <li class="bold"><a class="collapsible-header waves-effect waves-indigo"><i class="mdi-image-collections"></i>Galery</a>
                          <div class="collapsible-body">
                              <ul>
                                  <li><a href="../templated-snapshot/galery.php">Galeri</a>
                                  </li>
                                  <li><a href="galery.php">Form Galeri</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="bold"><a class="collapsible-header  waves-effect waves-indigo"><i class="mdi-editor-border-all"></i> Data Master</a>
                          <div class="collapsible-body">
                              <ul>
                                  <li><a href="app-email.php">Bahasa Pemrograman</a>
                                  </li>
                                  <li><a href="table-data.php">Penulis</a>
                                  </li>
                                  <li><a href="table-moderator.php">Moderator</a>
                                  </li>
                                  <li><a href="table_kat-minat.php">Kategori Minat</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="bold"><a class="collapsible-header waves-effect waves-indigo"><i class="mdi-editor-border-all"></i> Data Transaksi</a>
                          <div class="collapsible-body">
                              <ul>
                                  <li><a href="table-transaksi.php"> Post dengan Penulis</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="bold"><a class="collapsible-header  waves-effect waves-indigo"><i class="mdi-editor-insert-comment"></i> Data Form</a>
                          <div class="collapsible-body">
                              <ul>
                                  <li><a href="form-layouts.php">Form Moderator</a>
                                  </li>
                                  <li><a href="form-buattutor.php">Buat Tutorial</a>
                                  </li>
                                  <li><a href="form_category.php">Kategori</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      <li class="bold"><a class="collapsible-header  waves-effect waves-indigo"><i class="mdi-social-pages"></i> Pages</a>
                          <div class="collapsible-body">
                              <ul>
                                  <li><a href="page-register.html">Register</a>
                                  </li>
                                  <li><a href="page-lock-screen.html">Lock Screen</a>
                                  </li>
                                  <li><a href="page-invoice.html">Invoice</a>
                                  </li>
                                  <li><a href="page-404.html">404</a>
                                  </li>
                                  <li><a href="page-500.html">500</a>
                                  </li>
                                  <li><a href="page-blank.html">Blank</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
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
                <h5 class="breadcrumbs-title">Data Master</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Data Master</a></li>
                    <li class="active">Data Bahasa Pemrograman</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Data master merupakan sumber data dari berbagai data - data moderator, penulis, tutorial postingan maupun bahasa pemrograman yang sewaktu-waktu akan diupdate. Data master berupa data tabel yang banyak dan detail guna mengontrol moderator, penulis  bagaimana keduanya berinteraksi dengan pembaca, tutorial postingan maupun bahasa pemrogramannya </p>            <div class="divider"></div>

            <!--DataTables example-->
            <div id="table-datatables">
              <h4 class="header">DataTables Bahasa Pemrograman</h4>
              <div class="row">

                <div class="col s12 m8 l12">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Bahasa Pemrograman</th>
                            <th>Nama Bahasa Pemrograman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Kode Bahasa Pemrograman</th>
                          <th>Nama Bahasa Pemrograman</th>
                          <th>Aksi</th>
                        </tr>
                    </tfoot>

                    <tbody>
                      <?php

                      //Data mentah yang ditampilkan ke tabel
                      include "koneksi.php";
                      $sql = mysql_query('SELECT * FROM bahasa_pemrograman');
                      $no = 1;
                      if(mysql_num_rows($sql)>0){
                      while ($r = mysql_fetch_array($sql)) {
                      $id = $r['kd_bhsPem'];
                      $encrypt = base64_encode($id);
                      ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['kd_bhsPem'];?></td>
                            <td><?php echo $r['nama_bp']; ?></td>
                            <td>
                              <?php
                                echo" <a class='btn-floating btn-middle waves-effect waves-light red tooltipped' type='submit' name='update' href='bhs-pem_Update.php?id=$encrypt' data-position='left' data-delay='50' data-tooltip='Update'>
                                  <i class='large mdi-editor-mode-edit'></i>
                                </a>"
                              ?>
                              <?php
                                  echo "<a class='btn-floating btn-middle waves-effect waves-light blue tooltipped' type='submit' name='hapus' href='delete_bhsPem.php?id=$id' data-position='top' data-delay='50' data-tooltip='Delete'>
                                    <i class='large mdi-action-delete'></i>
                                  </a>";
                               ?>
                              <?php
                                echo "<a class='btn-floating btn-middle waves-effect waves-light orange tooltipped' type='submit' name='view' href='view-bhspemrograman.php?id=$encrypt' data-position='right' data-delay='50' data-tooltip='View Detail'>
                                  <i class='large mdi-action-face-unlock'></i>
                                </a>";
                              ?>
                              <script>
                              $(document).ready(function(){
                                $('.tooltipped').tooltip({delay: 50});
                              });
                              </script>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <br>
          </div>
          <div id="mail-app" class="section">


            <!-- Compose Programming Language Trigger -->
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
              <a class="btn-floating btn-large waves-effect waves-light indigo modal-trigger tooltipped" href="#modal1" data-position="left" data-delay="50" data-tooltip="Press Me for plus program language">
                <i class="large mdi-editor-mode-edit"></i>
              </a>
              <script>
              $(document).ready(function(){
                $('.tooltipped').tooltip({delay: 50});
              });
              </script>
            </div>
            <!-- Compose Email Structure -->
            <div id="modal1" class="modal">
              <form class="col s12" method="post" action="bhs_pemrograman-proses.php">
              <div class="modal-content">
                <nav class="indigo">
                  <div class="nav-wrapper">
                    <div class="left col s12 m5 l5">
                      <ul>
                        <li><a href="#!" class="email-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a>
                        </li>
                        <li><a href="#!" class="email-type">Tambah Bahasa Pemrograman</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col s12 m7 l7 hide-on-med-and-down">
                      <ul class="right">
                        <li>
                          <button class="btn-large indigo waves-effect waves-light calright" type="submit" name="simpan">
                            <i class="modal-action modal-close  mdi-content-send"></i>
                          </button>
                        </li>
                      </ul>
                    </div>

                  </div>
                </nav>
              </div>
              <div class="model-email-content">
                <div class="row">
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="kd_bp" type="text" class="validate" disabled="" name="kd_bhsPem">
                        <label for="kd_bp">Kode Sudah Terisi Otomatis</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="nama_bp" type="text" class="validate" name="nama_bp" required="">
                        <label for="nama_bp">Bahasa Pemrograman</label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        </div>
        <!--end container-->
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
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
</body>

</html>
