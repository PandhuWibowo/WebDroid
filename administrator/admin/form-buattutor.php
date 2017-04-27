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

  </script>
  <script type="text/javascript">
      function konfirmasi(){
          tanya = confirm("Anda Yakin akan Logout?");
          if(tanya == true)return true;
          else return false;
      }
  </script>
  <script>
    var roxyFileman = '../ckeditor/plugins/fileman/index.html';
    $(function () {
        CKEDITOR.replace('ckeditor1', {filebrowserBrowseUrl: roxyFileman,
            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
            removeDialogTabs: 'link:upload;image:upload'});
    });
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
                                  <li><a href="page-login.html">Login</a>
                                  </li>
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
                <h5 class="breadcrumbs-title">Data Form</h5>
                <ol class="breadcrumb">
                  <li><a href="index.html">Dashboard</a>
                  </li>
                  <li><a href="#">Data Form</a>
                  </li>
                  <li class="active">Tutorial Baru</li>
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
              <div class="col s12 m12 l12">
                <div class="card-panel">
                  <div class="row">
                    <form class="col s12" method="post" action="buattutor-proses.php" enctype="multipart/form-data">
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="judul_tutor" type="text" name="judul_tutor" class="validate" required="">
                          <label for="judul_tutor">Judul Tutorial</label>
                        </div>
                      </div>
                      <?php
                      include "koneksi.php";
                      $sql = "select nama_bp from bahasa_pemrograman order by nama_bp asc";
                      $hasil = mysql_query($sql);
                      echo "
                      <div class='row'>
                        <div class='input-field col s12'>
                          <select name='bhs_pem' required>
                            <option value='' disabled selected>Pilih Bahasa Pemrograman</option>";
                            while ($row = mysql_fetch_array($hasil)){
                              echo "<option value='" . $row['nama_bp'] ."'>" . $row['nama_bp'] ."</option>";
                            }

                            echo "</select>"
                            ?>
                            <label>Cek Bahasa Pemrograman</label>
                        </div>
                      </div>
                      <?php
                      include "koneksi.php";
                      $sql = "select nama_cat from category order by nama_cat asc";
                      $hasil = mysql_query($sql);
                      echo "
                      <div class='row'>
                        <div class='input-field col s12'>
                          <select name='nama_cat' required>
                            <option value='' disabled selected>Pilih Category Minat</option>";
                            while ($row = mysql_fetch_array($hasil)){
                              echo "<option value='" . $row['nama_cat'] ."'>" . $row['nama_cat'] ."</option>";
                            }

                            echo "</select>"
                            ?>
                            <label>Cek Category Minat</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="ckeditor1"  length="4000" maxlength="4000" required="" name="isi_tutor" required=""></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <select name="cat_info" required>
                            <option value="" disabled selected>Pilih Category Info</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Web Design">Web Design</option>
                            <option value="Front End">Front End</option>
                            <option value="Back End">Back End</option>
                            <option value="Desktop">Desktop</option>
                            <option value="Android Native">Android Native</option>
                            <option value="API">API</option>
                            <option value="Framework">Framework</option>
                            <option value="Game">Game</option>
                            <option value="VR">VR</option>
                          </select>
                          <label>Cek Category Info</label>
                        </div>
                      </div>

                      <?php
                      include "koneksi.php";
                      $sql = "select email from administrator where username = '".$username."'";
                      $hasil = mysql_query($sql);
                      echo "
                      <div class='row'>
                        <div class='input-field col s12'>
                          <select name='email' required>
                            <option value='' disabled selected>Pilih Email Administrator</option>";
                            while ($row = mysql_fetch_array($hasil)){
                              echo "<option value='" . $row['email'] ."'>" . $row['email'] ."</option>";
                            }

                            echo "</select>"
                            ?>
                            <label>Cek Email Administrator</label>
                        </div>
                      </div>

                      <div class="file-field input-field">
                        <div class="btn indigo">
                          <span>File</span>
                          <input type="file" name="gambar" multiple>
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" placeholder="Upload one or more picture">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="github_code" type="text" name="github_code" class="validate">
                          <label for="github_code">Download code di Github(Simpan link)</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <input id="you_code" type="text" name="you_code" class="validate">
                          <label for="you_code">View detail tutorial di Youtube(Simpan link)</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="pdf" type="text" name="pdf_dokumentasi" class="validate">
                          <label for="pdf">Download dalam bentuk dokumentasi PDF(Simpan link)</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="other_download" type="text" name="other_download" class="validate">
                          <label for="other_download">Other Download(Simpan link download lain)</label>
                        </div>
                      </div>

                      <div class="row">
                        <?php
                        $username = $_SESSION['username'];
                        include "koneksi.php";
                        $sql = "select nama, instagram from administrator where username = '".$username."'";
                        $hasil = mysql_query($sql);
                        echo "
                          <div class='input-field col s12'>
                            <select name='nama_penulis' required>
                              <option value='' disabled selected>Pilih Penulis</option>";
                              while ($row = mysql_fetch_array($hasil)){
                                echo "<option value='" . $row['nama'] ."'>" . $row['nama'] ."</option>";
                              }

                              echo "</select>"
                              ?>
                              <label>Cek Penulis</label>
                          </div>
                          <?php
                          $username = $_SESSION['username'];
                          $sql = "select instagram from administrator where username = '".$username."'";
                          $hasil = mysql_query($sql);
                          echo "
                            <div class='input-field col s12'>
                              <select name='instagram' required>
                                <option value='' disabled selected>Pilih Instagram</option>";
                                while ($row = mysql_fetch_array($hasil)){
                                  echo "<option value='" . $row['instagram'] ."'>" . $row['instagram'] ."</option>";
                                }

                                echo "</select>"
                                ?>
                                <label>Cek Instagram Penulis</label>
                            </div>
                            <?php
                            $username = $_SESSION['username'];
                            $sql = "select facebook from administrator where username = '".$username."'";
                            $hasil = mysql_query($sql);
                            echo "
                              <div class='input-field col s12'>
                                <select name='facebook' required>
                                  <option value='' disabled selected>Pilih Facebook</option>";
                                  while ($row = mysql_fetch_array($hasil)){
                                    echo "<option value='" . $row['facebook'] ."'>" . $row['facebook'] ."</option>";
                                  }

                                  echo "</select>"
                                  ?>
                                  <label>Cek Facebook Penulis</label>
                              </div>
                              <?php
                              $username = $_SESSION['username'];
                              $sql = "select twitter from administrator where username = '".$username."'";
                              $hasil = mysql_query($sql);
                              echo "
                                <div class='input-field col s12'>
                                  <select name='twitter' required>
                                    <option value='' disabled selected>Pilih Twitter</option>";
                                    while ($row = mysql_fetch_array($hasil)){
                                      echo "<option value='" . $row['twitter'] ."'>" . $row['twitter'] ."</option>";
                                    }

                                    echo "</select>"
                                    ?>
                                    <label>Cek Twitter Penulis</label>
                                </div>
                                <?php
                                $username = $_SESSION['username'];
                                $sql = "select g_plus from administrator where username = '".$username."'";
                                $hasil = mysql_query($sql);
                                echo "
                                  <div class='input-field col s12'>
                                    <select name='g_plus' required>
                                      <option value='' disabled selected>Pilih Google Plus</option>";
                                      while ($row = mysql_fetch_array($hasil)){
                                        echo "<option value='" . $row['g_plus'] ."'>" . $row['g_plus'] ."</option>";
                                      }

                                      echo "</select>"
                                      ?>
                                      <label>Cek Google Plus Penulis</label>
                                  </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <a class="btn blue waves-effect waves-light left" href="index.php">KEMBALI
                              <i class="mdi-navigation-arrow-back left"></i>
                            </a>
                            <button class="btn indigo waves-effect waves-light right" type="submit" name="publish">PUBLISH
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
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../ckeditor/build-config.js"></script>
    <script src="../ckeditor/config.js"></script>
    <script src="../ckeditor/styles.js"></script>
    <script>
    $(function () {
        CKEDITOR.replace('ckeditor1');
    });
</script>

</body>

</html>
