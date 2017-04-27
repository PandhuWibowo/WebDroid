<?php 
    //get session
    include "../configuration/session.php";
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

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">
                <!--start container-->
                <div class="container">
                  <div id="responsive-images" class="section">
                    <div class="row">
                      <div class="col s12 m8 l9">
                        <div class="card-panel grey lighten-5 z-depth-2">
                          <div class="row valign-wrapper">
                            <div class="col s4 m2">
                              <img src="<?php echo $grav_email;?>" alt="" class="circle z-depth-2 responsive-img activator valign">
                            </div>
                            <div class="col s8 m10">
                              <span class="black-text">Selamat Datang Administrator, <b><?php echo $nm_admin;?></b>. Semoga hari ini hari yang menyenangkan</span>
                            </div>
                          </div>
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
        
        <?php
          include "index/card-stat.php";
        ?>
    </div>
    <!-- END MAIN -->
      <?php
        }
      ?>

      

      <?php
        include_once"index/footer.html";
      ?>