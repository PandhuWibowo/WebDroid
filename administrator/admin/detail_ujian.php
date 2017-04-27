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
                <h5 class="breadcrumbs-title">Data Tambahan</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Data Tambahan</a></li>
                    <li class="active">Data Detail Ujian</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            
            

            <!--DataTables example-->
            <div id="table-datatables">
              <h4 class="header">DataTables Detail Ujian</h4>
              <div class="row">

                <div class="col s12 m8 l12">
                  <table id="data-table-simple" class="account_data responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jawaban Soal</th>
                            <th>Nilai Ujian</th>
                            <th>Jumlah Diskon</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Jawaban Soal</th>
                          <th>Nilai Ujian</th>
                          <th>Jumlah Diskon</th>
                          <th>Action                          
                        </tr>
                    </tfoot>

                    <tbody>
                      
                      <?php
                        //Data yang ditampilkan ke tabel
                        //Menampilkan session dan biodata admin login
                        $query2 = $con->query("select diskon.*, ujian.*, informasi_bayar.*, detail_ujian.* from detail_ujian, ujian, diskon, informasi_bayar where diskon.id_diskon = informasi_bayar.id_diskon and ujian.id_tes = informasi_bayar.id_tes and detail_ujian.id_tes = ujian.id_tes ORDER BY detail_ujian.id_tes ASC");
                        $query2->execute();
                        $detUjian = $query2->fetchAll();
                        $no=1;
                        //looping keterangan admin
                        foreach($detUjian as $detil){
                            $jml_diskon         = $detil['jml_diskon'];
                            $jwbn_soal          = $detil['jwbn_soal'];
                            $nilai_ujian        = $detil['nilai_ujian'];
                            $id                 = $detil['id_tes'];
                            $id_soal            = $detil['id_soal'];
                            $encrypt            = base64_encode($id);
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <!--<td><?php echo md5(base64_encode($id));?></td>-->
                            <td><?php echo $jwbn_soal; ?></td>
                            <td><?php echo $nilai_ujian;?></td>
                            <td><?php echo $jml_diskon;?></td>
                            <td>
                              <?php
                                echo "<a class='btn-floating btn-middle waves-effect waves-light red tooltipped' type='submit' name='update' href='update-detail-ujian.php?id=$id&id_soal=$id_soal' data-position='left' data-delay='50' data-tooltip='Update'>
                                  <i class='large mdi-editor-mode-edit'></i>
                                </a>";
                              ?>
                              <?php
                                echo "<a class='btn-floating btn-middle waves-effect waves-light blue tooltipped' type='submit' name='account_id' href='table/detail-ujian/delete-detail-ujian.php?id=$id&id_soal=$id_soal' data-position='top' data-delay='50' data-tooltip='Delete'>
                                  <i class='large mdi-action-delete'></i>
                                </a>";
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

      <?php
        include_once "index/floating.html";
      ?>

      <?php
        include_once "modal/detail_ujian-modal.php";
      ?>

      <?php
        include_once"table/footerTable.html";
      ?>



      