<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen, projection"/>
        <link type="text/css" rel="stylesheet" href="css/custom.css"  media="screen, projection"/>
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
        <title>rootorial | Registrasi</title>
        <link href="../admin/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="../admin/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="../admin/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    </head>
    <body class="indigo lighten-5">
        <nav class="indigo nav-extended">
            <div class="nav-wrapper container">
                <a href="../index.php" id="judul" class="brand-logo waves-effect">rootorial</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

            </div>
            <div class="nav-content container">
                <ul class="tabs tabs-transparent">
                    <li class="tab"><a class="active waves-effect" href="#">Registrasi</a></li>
                </ul>
            </div>
        </nav>

        <div id="index" class="row container">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Daftar sesuai dengan data diri asli Anda yang tertera</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m12 l12">
              <div class="card-panel">
                <div class="row">
                    <form class="col s12" method="post" action="regis_penulis-proses.php">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-action-account-circle prefix"></i>
                        <input id="username" type="text" name="username" maxlength="15" class="validate" required="">
                        <label for="username">Username</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-action-account-circle prefix"></i>
                        <input id="nm_l" type="text" name="nm_lkp" maxlength="30" class="validate" required="">
                        <label for="nm_l">Nama Lengkap</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-action-room prefix"></i>
                        <input id="tmp_lahir" type="text" name="tmp_lahir" maxlength="30" class="validate" required="">
                        <label for="tmp_lahir">Tempat Lahir</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-action-schedule prefix"></i>
                        <input id="tgl_lahir" type="date" name="tgl_lahir" class="datepicker" required="">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                      </div>
                    </div>
                    <script>
                    $('.datepicker').pickadate({
                      selectMonths: true, // Creates a dropdown to control month
                      selectYears: 15 // Creates a dropdown of 15 years to control year
                    });
                    </script>
                    <div class="row">
                      Jenis Kelamin
                      <div class="input-field col s12">
                          <i class="mdi-action-account-child prefix"></i>
                          <input name="jenkel" type="radio" id="pria" name="pria" value="Pria"/>
                          <label for="pria">Pria</label>
                          <input name="jenkel" type="radio" id="wanita" name="wanita" value="Wanita" />
                          <label for="wanita">Wanita</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-communication-email prefix"></i>
                        <input id="email" type="email" name="email" maxlength="30" class="validate" required="">
                        <label for="email">Email</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-communication-phone prefix"></i>
                        <input id="nohandpahone" type="text" name="no_hand" maxlength="13" class="validate" required="">
                        <label for="nohandpahone">No Handphone</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-communication-location-on prefix"></i>
                        <textarea id="tentang_saya" class="materialize-textarea" length="600" maxlength="600" name="tentang_saya" required=""></textarea>
                        <label for="tentang_saya">Tentang Saya</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-communication-location-on prefix"></i>
                        <textarea id="alamat" class="materialize-textarea" length="600" maxlength="600" name="alamat" required=""></textarea>
                        <label for="Alamat">Alamat</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password" name="password" maxlength="20" class="validate" required="">
                        <label for="password">Password</label>
                      </div>
                      <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="konf_pass" type="password" name="konf_pass" maxlength="20" class="validate" required="">
                        <label for="konf_pass">Konfirmasi Password</label>
                      </div>
                    </div>
                    <div class="row">


                      <div class="row">
                        <div class="input-field col s12">
                          <?php
                            $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
                          ?>
                          <a class="btn blue waves-effect waves-light left" href="<?php echo $url;?>">KEMBALI
                            <i class="mdi-navigation-arrow-back left"></i>
                          </a>
                          <button class="btn indigo waves-effect waves-light right" type="submit" name="daftar">Daftar
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

        <footer class="page-footer indigo">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">rootorial</h5>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.213671248297!2d106.74514891439978!3d-6.235541762797946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f0c0aa66ff39%3A0xa03336d748ede0d7!2sUniversitas+Budi+Luhur!5e0!3m2!1sid!2sid!4v1482891606263" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <p class="grey-text text-lighten-4">pandhuw58@gmail.com</p>
                        <p class="grey-text text-lighten-4">081296807905</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Informasi</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3 waves-effect" href="#!">Tentang Kami</a></li>
                            <li><a class="grey-text text-lighten-3 waves-effect" href="#!">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2017 rootorial
                    <a class="grey-text text-lighten-4 right waves-effect" href="#judul">Kembali ke atas</a>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#modal-daftar').modal();
            $('.materialboxed').materialbox();
            $(".button-collapse").sideNav();
        });
        </script>
    </body>
</html>
