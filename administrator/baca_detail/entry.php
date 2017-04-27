<!doctype html>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rootorial | Baca Tutorial</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='//fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="material.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/materialize.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />

    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />

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
    </style>
    <style type="text/css">

#share-buttons img {
width: 40px;
padding: 5px;
border: 0;
box-shadow: 0;
display: inline;
}

</style>
  </head>
  <body class="indigo lighten-5" oncontextmenu='return false;' onkeydown='return false;' onmousedown='return true;'>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    <div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="demo-back">
          <?php
            $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
          ?>
          <a href="<?=$url;?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" title="go back" role="button">
            <i class="material-icons" role="presentation">arrow_back</i>
          </a>
        </div>
        <?php

        //Data mentah yang ditampilkan ke tabel
        include "../koneksi.php";
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
            $you_code = $hasil['you_code'];
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
        <script>
        (function(){
          new Clipboard('#copy-button');
        })();
        </script>
        <div class="demo-blog__posts mdl-grid">
          <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3><?php echo $judul_tutor; ?></h3>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <img src="<?php echo $grav_kedua; ?>" class="circle responsive-img activator card-profile-image"/>
              <div>
                <strong><?php echo $nama_admin; ?></strong>
                <span><?php echo TanggalIndo($tgl_publish); ?></span>
              </div>
              <div class="section-spacer"></div>
              <div class="meta__favorites">
                <?php echo $jenis_bhs; ?>
              </div>
               |&nbsp
              <div>
                <?php echo $cat_info; ?>
              </div>
              <div>
                <button class='mdl-mini-footer--social-btn social-btn social-btn__url waves-effect' id="copy-button" data-clipboard-action="copy" data-clipboard-target="#post-shortlink" type='button' onclick=copyToClipboard()>Copy</button>
              </div>

              <div id="share-buttons">
                <a href="javascript:;" onclick="window.print()">
                  <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
                </a>
              </div>

            </div>
            <div class="container">
              <div class="container">
                <p>
                  <div id="post-shortlink"><?php echo $isi_content4;?></div>
                </p>

                <!-- I got these buttons from simplesharebuttons.com -->
                <style>
                  .jssocials-share-link { border-radius: 50%; }
                </style>
                <div id="sharePopup"></div>

                <script>
                $("#sharePopup").jsSocials({
                  showLabel: false,
                  showCount: false,
                  shareIn: "popup",
                  shares: ["twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "line", "email"]
                  });
                  </script>
                  <!-- Print -->

              </div>
            </div>
          </div>

          <!--<nav class="demo-nav mdl-color-text--grey-50 mdl-cell mdl-cell--12-col">
            <a href="index.html" class="demo-nav__button">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation">
                <i class="material-icons">arrow_back</i>
              </button>
              Newer
            </a>
            <div class="section-spacer"></div>
            <a href="index.html" class="demo-nav__button">
              Older
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation">
                <i class="material-icons">arrow_forward</i>
              </button>
            </a>
          </nav>-->

        </div>
        <div class="demo-blog__posts mdl-grid">
          <div class="mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--black-50">
              <div class="container">
                <h5>Bisa dilihat dan didownload di bawah ini :</h5>
              </div>
            </div>
            <div class="container">
              <div class="container">
                <?php
                if(!empty($hasil['github_code'])){
                  ?>
                  <a href="<?php echo $hasil['github_code']; ?>" target="_blank"><button class="mdl-mini-footer--social-btn social-btn social-btn__github waves-effect">
                    <span class="visuallyhidden">Github</span>
                  </button></a>
                  <?php
                }
                if(!empty($hasil['pdf_dokumentasi'])){
                  ?>
                  <a href="<?php echo $hasil['pdf_dokumentasi']; ?>" target="_blank"><button class="mdl-mini-footer--social-btn social-btn social-btn__pdf waves-effect">
                    <span class="visuallyhidden">Pdf</span>
                  </button></a>
                  <?php
                }
                if(!empty($hasil['you_code'])){
                    ?>
                    <a href="<?php echo $hasil['you_code']; ?>" target="_blank"><button class="mdl-mini-footer--social-btn social-btn social-btn__youtube2 waves-effect">
                      <span class="visuallyhidden">Youtube</span>
                    </button></a>
                    <?php
                }
                if(!empty($hasil['other_download'])){
                  ?>
                  <a href="<?php echo $hasil['other_download']; ?>" target="_blank"><button class="mdl-mini-footer--social-btn social-btn social-btn__odown waves-effect">
                    <span class="visuallyhidden">Other Download</span>
                  </button></a>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large waves-effect waves-light indigo tooltipped" href="../../index.php" data-position="left" data-delay="50" data-tooltip="Press Me if you were finished">
              <i class="large mdi-action-done"></i>
            </a>
            <script>
            $(document).ready(function(){
              $('.tooltipped').tooltip({delay: 50});
            });
            </script>
          </div>
        </div>
        <footer class="mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <a href="<?php echo $hasil['twitter']; ?>"><button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
              <span class="visuallyhidden">Twitter</span>
            </button></a>
            <a href="<?php echo $hasil['facebook']; ?>"><button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
              <span class="visuallyhidden">Facebook</span>
            </button></a>
            <a href="<?php echo $hasil['g_plus']; ?>"><button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
              <span class="visuallyhidden">Google Plus</span>
            </button></a>
          </div>
          <div class="mdl-mini-footer--right-section">
            
            <a href="<?php echo $hasil['instagram_penulis']; ?>"><button class="mdl-mini-footer--social-btn social-btn social-btn__instagram">
              <span class="visuallyhidden">Instagram</span>
            </button></a>
            <a href="#"><button class="mdl-mini-footer--social-btn social-btn social-btn__youtube">
              <span class="visuallyhidden">Youtube</span>
            </button></a>
            
          </div>
          <div class="footer-copyright">
              © 2017 rootorial
          </div>
          
          <div id="google_translate_element" class="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </footer>
      </main>
      <div class="mdl-layout__obfuscator"></div>
    </div>

    <script src="../../material.min.js"></script>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!-- jQuery Library -->
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="../js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="../js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="../js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="../js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/data-tables/data-tables-script.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="../js/plugins/chartist-js/chartist.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../js/plugins.js"></script>
<script>
  (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
    t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
  })(window, document, '_gscq','script','//widgets.getsitecontrol.com/71998/script.js');
</script>
  </body>
</html>
