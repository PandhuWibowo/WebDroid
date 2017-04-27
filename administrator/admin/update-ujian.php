<?php
require_once ("../config.php");
session_start();
if(!isset($_SESSION['username'])){
    ?>
    <script>
        document.location="../../login/";
    </script>
    <?php
}
?>

<?php
    //menampilkan hasil header
    include_once "index/header.html";
?>
<body>
    <?php include"connection/database.php";?>
    
    <?php
        //Menampilkan session dan biodata admin login
        $username = $_SESSION['username'];
        $statement = $con->prepare("SELECT * FROM administrator WHERE username = '$username'");
        $statement->execute();
        $admin = $statement->fetchAll();

        //looping keterangan admin
        foreach($admin as $admins){
            $nm_admin = $admins['nm_admin'];
            $email = $admins['email'];
            $grav_email = "https://www.gravatar.com/avatar/" . md5($email) . "?d=retro";
    ?>
    
    <?php 
        //load javascript
        include_once "index/loading.html";
    ?>
    

    <?php
        //menampilkan navbar
        include_once "index/navbar.php";
    ?>
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
                    <li class="active">UPDATE FORM CALON MAHASISWA</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Update Ujian Mahasiswa Baru</p>

            <div class="divider"></div>

            <?php
                $delAccount = $_GET['id'];
                $decrypt = base64_decode($delAccount);
                $sql = $con->query("SELECT * FROM ujian WHERE id_tes = '$decrypt'");
                $sql->execute();
                $ujian = $sql->fetchAll();

                foreach($ujian as $ujians){
                    $id_tes   = $ujians['id_tes'];
                    $noClnMhs   = $ujians['noClnMhs'];
                    $tgl_tes    = $ujians['tgl_tes'];
                    $waktu_tes  = $ujians['waktu_tes']; 
                
            ?>
            <!-- Form with icon prefixes -->
            <div class="row">
              <!-- Form with validation -->
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <div class="row">
                      <form class="col s12" method="post" action="table/account/update-proses.php">

                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input id="id_tes" type="text" name="id_tes" maxlength="15" class="validate" value="<?php echo $id_tes;?>" readOnly>
                          <label for="id_tes">ID Tes</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input id="noClnMhs" type="text" name="noClnMhs" maxlength="15" class="validate" value="<?php echo $noClnMhs;?>" readOnly>
                          <label for="noClnMhs">No Calon Mahasiswa</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input id="tgl_tes" type="text" name="tgl_tes" maxlength="15" class="validate" value="<?php echo $tgl_tes;?>" readOnly>
                          <label for="tgl_tes">Tanggal Tes</label>
                        </div>
                      </div>

                      <!--<div class="row">
                        <div class="input-field col s12">
                          <select name="jurusan">
                            <option value="<?php echo $jurusan;?>" disabled selected><?php echo $jurusan;?></option>
                            <option value="" disabled>Pilih Jurusan</option>
                            <option value="Web Development">Web Development</option>
                          </select>
                          <label>Cek Jurusan</label>
                        </div>
                      </div>-->
                                       
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-lock-outline prefix"></i>
                          <input id="waktu_tes" type="text" name="waktu_tes" maxlength="20" class="validate" readOnly value="<?php echo $waktu_tes;?>">
                          <label for="waktu_tes">Waktu Tes</label>
                        </div>                        
                      </div>
                      <div class="row">
                        <div class="row">
                          <div class="input-field col s12">
                            <a class="btn blue waves-effect waves-light left" href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back
                              <i class="mdi-navigation-arrow-back left"></i>
                            </a>
                            <button class="btn indigo waves-effect waves-light right" type="submit" name="update">Update
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
      <?php
            }
      ?>
        
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

      <?php
        include_once"table/footerTable.html";
      ?>



      