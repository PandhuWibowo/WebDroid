<!DOCTYPE html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>rootorial | Baca Tutorial</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!--<link rel="shortcut icon" href="images/favicon.png">-->

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-red.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../admin/css/materialize.css" />
    <link rel="stylesheet" href="../admin/css/style.css" />
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>

    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    #kembali{
      position: fixed;
      display: block;
      left: 0;
      bottom : 0;
      margin-left: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>

  </head>
  <body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100" id="disable">
      <header class="white demo-header mdl-layout__header mdl-layout__header--scroll mdl-color--darkblue-100 mdl-color-text--grey-800">
        <div class="mdl-layout__header-row">
          <h3 class="" id="rootorial">meja<h5>coding<h5></h3>
          <div class="mdl-layout-spacer"></div>
          <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>-->
        </div>
      </header>
      <div class="demo-ribbon"></div>
      <main class="demo-main mdl-layout__content">
        <div class="demo-container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
            <div class="demo-crumbs mdl-color-text--grey-500">
              <?php

              //Data mentah yang ditampilkan ke tabel
              include "../admin/koneksi.php";
              function TanggalIndo($date){
                 $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

                  $tahun = substr($date, 0, 4);
                   $bulan = substr($date, 5, 2);
                    $tgl   = substr($date, 8, 2);

                     $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
                      return($result);
              }
              if(isset($_GET['id'])){
                $kd_tutor = $_GET['id'];
                $decrypt = base64_decode($kd_tutor);
                $sql = mysql_query("SELECT * FROM contents_administrator WHERE kd_tutor = '$decrypt'");

                if($hasil = mysql_fetch_array($sql))
                {
                  $judul_tutor  = stripslashes($hasil['judul_tutor']);
            			$jenis_bhs = $hasil['jenis_bhs'];
                  $cat_info = $hasil['cat_info'];
                  $isi_content  =  $hasil['isi_contents'];
                  $isi_content2 = str_replace(array("\\r\\n"),"",$isi_content);
                  $isi_content2_1 = preg_replace('#\[strong\](.+)\[\/strong\]#iUs', '<strong>$1</strong>', $isi_content2);
                  $isi_content3 = html_entity_decode($isi_content2_1);
                  $isi_content4 = htmlspecialchars_decode($isi_content3);
                  $nama_admin = stripslashes($hasil['nama_admin']);
                  $tgl_publish = stripslashes($hasil['tgl_publish']);
                  //$gambar = $hasil['gambar'];
                  $grav = $hasil['email_penulis'];
                  $grav_kedua = "https://www.gravatar.com/avatar/" . md5($grav) . "?d=retro";
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
              ?>

              rootorial &gt; <?php echo $judul_tutor; ?> &gt; <?php echo $jenis_bhs; ?> &gt; <?php echo $cat_info; ?>

            </div>


            <h3 class="justify"><b><?php echo $judul_tutor; ?></b></h3>

                <!--card widgets start-->
                <div id="material-box" class="section">
                  <div class="row">

                    <div class="col s12 m 12 l4">
                      <!--<h4 class="header">Tampilan Post Tutorial</h4> Nanti diisi dengan kategori-->
                      <img class="materialboxed" width="400" height="400" src="../admin/gambar/<?php echo $hasil['gambar'];?>" alt="sample">
                    </div>
                  </div>
                </div>
              <img src="<?php echo $grav_kedua; ?>" class="circle responsive-img activator card-profile-image"/><small><b> <?php echo $nama_admin; ?></b></small><small> | Publish : <b><?php echo TanggalIndo($tgl_publish); ?></b></small>
              <br /><br /><br />
              <div class="container">
                <div class="container">
                  <p>
                    <?php echo $isi_content4;?>
                  </p>
                </div>
              </div>

          </div>
        </div>
        <footer class="demo-footer mdl-mini-footer white">
          <div class="mdl-mini-footer--left-section">
            <ul class="mdl-mini-footer--link-list">
              <span>Copyright © 2017 <a class="grey-text text-lighten-4">rootorial</a> All rights reserved.</span>
            </ul>
          </div>
        </footer>
      </main>
    </div>
    <a href="#rootorial" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Keatas</a>
    <?php
      $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
    ?>
    <a href="<?php echo $url;?>" id="kembali" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Kembali</a>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!-- jQuery Library -->
    <script type="text/javascript" src="../admin/js/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="../admin/js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="../admin/js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../admin/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="../admin/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../admin/js/plugins/data-tables/data-tables-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="../admin/js/plugins/chartist-js/chartist.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../admin/js/plugins.js"></script>
  </body>
</html>
