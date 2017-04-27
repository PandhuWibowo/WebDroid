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

if(isset($_GET['id']))
{
  $kd_tutor = $_GET['id'];
  //$decrypt = base64_decode($kd_tutor);
  $query = "select * from contents_administrator where kd_tutor='$kd_tutor'";
  $sql = mysql_query($query);

  if($hasil = mysql_fetch_array($sql))
  {
    $judul_tutor  = $hasil['judul_tutor'];
    $jenis_bhs = $hasil['jenis_bhs'];
    $cat_minat = $hasil['cat_minat'];
    $twitter  = $hasil['twitter'];
    $isi_content  =  $hasil['isi_contents'];
    $isi_content2 = str_replace(array("\\r\\n"),"",$isi_content);
    $isi_content2_1 = preg_replace('#\[strong\](.+)\[\/strong\]#iUs', '<strong>$1</strong>', $isi_content2);
    $isi_content3 = html_entity_decode($isi_content2_1);
    $isi_content4 = htmlspecialchars_decode($isi_content3);
    $cat_info = $hasil['cat_info'];
    $nama_admin = $hasil['nama_admin'];
    $tgl_publish = $hasil['tgl_publish'];
    $email_penulis = $hasil['email_penulis'];
    $gambar = $hasil['gambar'];
    $instagram_penulis = $hasil['instagram_penulis'];
    $facebook = $hasil['facebook'];
    //$grav_url = "https://www.gravatar.com/avatar/" . md5($tampung_digrav) . "?d=retro";
    $g_plus = $hasil['g_plus'];
    $github_code = $hasil['github_code'];
    $you_code = $hasil['you_code'];
    $other_download = $hasil['other_download'];
    $pdf_dokumentasi = $hasil['pdf_dokumentasi'];
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
                                <li><a href="../index/index.php">Lihat Index</a>
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
                  <li class="active">Tutorial Update</li>
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
                    <form class="col s12" method="post" action="buatupdate-proses.php" enctype="multipart/form-data">
                      <div class="row">
                        <div class="input-field col s12">
                          <input type="hidden" name="kd_tutor" value="<?php echo $kd_tutor;?>" />
                          <input id="judul_tutor" type="text" name="judul_tutor" value="<?php echo $judul_tutor;?>" class="validate" required="" />
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
                            <option value='' disabled selected>$jenis_bhs</option>";
                            while ($baris1 = mysql_fetch_array($hasil)){
                              echo "<option value='" . $baris1['nama_bp'] ."'>" . $baris1['nama_bp'] ."</option>";
                            }

                            echo "</select>";
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
                            <option value='' disabled selected>$cat_minat</option>";
                            while ($baris2 = mysql_fetch_array($hasil)){
                              echo "<option value='" . $baris2['nama_cat'] ."'>" . $baris2['nama_cat'] ."</option>";
                            }

                            echo "</select>";
                            ?>
                            <label>Cek Category Minat</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="ckeditor1"  length="4000" maxlength="4000" required="" name="isi_tutor" required=""><?php echo $isi_content4; ?></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <select name="cat_info" required>
                            <option value="" disabled selected><?php echo $cat_info; ?></option>
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
                            <option value='' disabled selected>$email_penulis</option>";
                            while ($baris3 = mysql_fetch_array($hasil)){
                              echo "<option value='" . $baris3['email'] ."'>" . $baris3['email'] ."</option>";
                            }

                            echo "</select>";
                            ?>
                            <label>Cek Email Administrator</label>
                        </div>
                      </div>

                      <div class="file-field input-field">
                        <div class="btn indigo">
                          <span>File</span>
                          <input type="file" name="gambar" multiple >
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" placeholder="Upload one or more picture" value="<?php echo $gambar;?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="github_code" type="text" name="github_code" class="validate" value="<?php echo $github_code;?>">
                          <label for="github_code">Download code di Github(Simpan link)</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <input id="you_code" type="text" name="you_code" class="validate" value="<?php echo $you_code;?>">
                          <label for="you_code">View detail tutorial di Youtube(Simpan link)</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="pdf" type="text" name="pdf_dokumentasi" class="validate" value="<?php echo $pdf_dokumentasi;?>">
                          <label for="pdf">Download dalam bentuk dokumentasi PDF(Simpan link)</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="other_download" type="text" name="other_download" class="validate" value="<?php echo $other_download;?>">
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
                              <option value='' disabled selected>$nama_admin</option>";
                              while ($baris4 = mysql_fetch_array($hasil)){
                                echo "<option value='" . $baris4['nama'] ."'>" . $baris4['nama'] ."</option>";
                              }

                              echo "</select>";
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
                                <option value='' disabled selected>$instagram_penulis</option>";
                                while ($baris5 = mysql_fetch_array($hasil)){
                                  echo "<option value='" . $baris5['instagram'] ."'>" . $baris5['instagram'] ."</option>";
                                }

                                echo "</select>";
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
                                  <option value='' disabled selected>$facebook</option>";
                                  while ($baris6 = mysql_fetch_array($hasil)){
                                    echo "<option value='" . $baris6['facebook'] ."'>" . $baris6['facebook'] ."</option>";
                                  }

                                  echo "</select>";
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
                                    <option value='' disabled selected>$twitter</option>";
                                    while ($baris7 = mysql_fetch_array($hasil)){
                                      echo "<option value='" . $baris7['twitter'] ."'>" . $baris7['twitter'] ."</option>";
                                    }

                                    echo "</select>";
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
                                      <option value='' disabled selected>$g_plus</option>";
                                      while ($baris8= mysql_fetch_array($hasil)){
                                        echo "<option value='" . $baris8['g_plus'] ."'>" . $baris8['g_plus'] ."</option>";
                                      }

                                      echo "</select>";
                                      ?>
                                      <label>Cek Google Plus Penulis</label>
                                  </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <a class="btn blue waves-effect waves-light left" href="index.php">KEMBALI
                              <i class="mdi-navigation-arrow-back left"></i>
                            </a>

                            <button type="submit" class="btn indigo waves-effect waves-light right"  name="update">PUBLISH
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
