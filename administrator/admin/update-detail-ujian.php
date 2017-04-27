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
                <h5 class="breadcrumbs-title">Data Transaksi</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Data Transaksi</a></li>
                    <li class="active">UPDATE FORM DETAIL UJIAN</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Update Detail Ujian Mahasiswa Baru</p>

            <div class="divider"></div>

            <?php
                $sel_tes = $_GET['id'];
                $sel_soal = $_GET['id_soal'];
                //$decrypt = base64_decode($delq);
                $sql = $con->query("SELECT * FROM detail_ujian WHERE id_tes='$sel_tes' AND id_soal='$sel_soal'");
                $sql->execute();
                $mix = $sql->fetchAll();

                foreach($mix as $fix){
                    $id_tes         = $fix['id_tes'];
                    $id_soal        = $fix['id_soal'];
                    $jwbn_soal      = $fix['jwbn_soal'];
                    $nilai_ujian    = $fix['nilai_ujian']; 
                
            ?>
            <!-- Form with icon prefixes -->
            <div class="row">
              <!-- Form with validation -->
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <div class="row">
                      <form class="col s12" method="post" action="table/detail-ujian/update-detail-ujian-proses.php">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class=""></i>
                          <input id="id_tes" type="text" name="id_tes" maxlength="15" class="validate" value="<?php echo $id_tes;?>" readOnly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="id_soal" class="materialize-textarea" length="500" name = "id_soal" maxlength="500"><?php echo $id_soal;?></textarea>   
                        </div>
                      </div>
                                       
                      <div class="row">
                        <div class="input-field col s12">
                          <i class=""></i>
                          <input id="jwbn_soal" type="text" name="jwbn_soal" maxlength="20" class="validate" value="<?php echo $jwbn_soal;?>">
                          
                        </div>                        
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class=""></i>
                          <input id="nilai_ujian" type="text" name="nilai_ujian" maxlength="20" class="validate" value="<?php echo $nilai_ujian;?>">
                          
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



      