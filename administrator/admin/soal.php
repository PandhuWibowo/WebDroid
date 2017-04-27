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
                    <li class="active">Data Soal - soal Ujian</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Data master merupakan sumber data dari berbagai data - data Calon Mahasiswa, Soal -soal, maupun dan diskon yang sewaktu-waktu akan diupdate.</p>
            <div class="divider"></div>
            <?php
                $query = $con->query('SELECT * FROM soal');
                if($query->rowCount()){
            ?>
            <!--start container-->
              <div id="responsive-images" class="section">
                <div class="row">
                  <div class="col s12 m8 l12">
                    <div class="card-panel grey lighten-5 z-depth-1">
                      <div class="row valign-wrapper">
                        <div class="col s8 m10">
                          <center><span class="black-text">Jumlah Soal yang Ada sebanyak : <b><?php echo $query->rowCount(); ?></b> Orang</span></center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                }else{
              ?>
              <!--start container-->
              <div id="responsive-images" class="section">
                <div class="row">
                  <div class="col s12 m8 l12">
                    <div class="card-panel grey lighten-5 z-depth-1">
                      <div class="row valign-wrapper">
                        <div class="col s8 m10">
                          <center><span class="black-text">Tidak ada soal yang tersedia</span></center>
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

            <!--DataTables example-->
            <div id="table-datatables">
              <h4 class="header">DataTables Soal Ujian</h4>
              <div class="row">

                <div class="col s12 m8 l12">
                  <table id="data-table-simple" class="account_data responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Isi Soal</th>
                            <th>Jawaban Soal</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Isi Soal</th>
                          <th>Jawaban Soal</th>
                          <th>Action                          
                        </tr>
                    </tfoot>

                    <tbody>
                      
                      <?php
                        //Data yang ditampilkan ke tabel
                        //Menampilkan session dan biodata admin login
                        $query2 = $con->query("SELECT * FROM soal ORDER BY id_soal ASC");
                        $query2->execute();
                        $soal = $query2->fetchAll();
                        $no=1;
                        //looping keterangan admin
                        foreach($soal as $soalUjian){
                            $id        = $soalUjian['id_soal']; 
                            $isi_soal  = $soalUjian['isi_soal'];
                            $isi_soal2 = str_replace(array("\\r\\n"),"",$isi_soal);
                            $isi_soal2_1 = preg_replace('#\[strong\](.+)\[\/strong\]#iUs', '<strong>$1</strong>', $isi_soal2);
                            $isi_soal3 = html_entity_decode($isi_soal2_1);
                            $isi_soal4 = htmlspecialchars_decode($isi_soal3);
                            $bobot_nilai       = $soalUjian['bobot_nilai'];
                            $encrypt   = base64_encode($id);
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $isi_soal4;?></td>
                            <td><?php echo $bobot_nilai; ?></td>
                            <td>
                              <?php
                                echo "<a class='btn-floating btn-middle waves-effect waves-light red tooltipped' type='submit' name='update' href='update-soal.php?id=$encrypt' data-position='left' data-delay='50' data-tooltip='Update'>
                                  <i class='large mdi-editor-mode-edit'></i>
                                </a>";
                              ?>
                              <?php
                                echo "<a class='btn-floating btn-middle waves-effect waves-light blue tooltipped' type='submit' name='account_id' href='table/soal/delete-soal.php?id=$id' data-position='top' data-delay='50' data-tooltip='Delete'>
                                  <i class='large mdi-action-delete'></i>
                                </a>";
                              ?>
                              <?php
                                // echo "<a class='btn-floating btn-middle waves-effect waves-light orange tooltipped' type='submit' name='view' href='user_profile_admin/profile-penulis.php?id=$encrypt' data-position='right' data-delay='50' data-tooltip='View Detail'>
                                //   <i class='large mdi-action-face-unlock'></i>
                                // </a>";
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
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <br>
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

      <!--<?php
        include_once "index/floating.html";
      ?>-->

      <?php
        include_once"table/footerTable.html";
      ?>



      