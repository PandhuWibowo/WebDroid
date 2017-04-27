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
                    <li class="active">UPDATE FORM SOAL</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Update Calon Mahasiswa Baru</p>

            <div class="divider"></div>

            <?php
                $delq = $_GET['id'];
                $decrypt = base64_decode($delq);
                $sql = $con->query("SELECT * FROM soal WHERE id_soal = '$decrypt'");
                $sql->execute();
                $soal = $sql->fetchAll();

                foreach($soal as $soal2){
                    $id_soal        = $soal2['id_soal'];
                    $isi_soal       = $soal2['isi_soal'];
                    $bobot_nilai    = $soal2['bobot_nilai']; 
                
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
                          <i class=""></i>
                          <input id="noClnMhs" type="text" name="id_soal" maxlength="15" class="validate" value="<?php echo $id_soal;?>" readOnly>
                          <label for="noClnMhs">ID Soal</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="isi_soal" class="materialize-textarea" length="500" name = "isi_soal" maxlength="500"><?php echo $isi_soal;?></textarea>
                          <label for="isi_soal">Isi Soal</label>
                        </div>
                      </div>
                                       
                      <div class="row">
                        <div class="input-field col s12">
                          <i class=""></i>
                          <input id="bobot_nilai" type="text" name="bbt_nilai" maxlength="20" class="validate" value="<?php echo $bobot_nilai;?>">
                          <label for="bobot_nilai">Bobot Nilai</label>
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



      