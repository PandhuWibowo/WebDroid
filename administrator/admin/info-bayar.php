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
                    <li class="active">Data Informasi Bayar</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">

            <p class="caption">Jika ingin melihat pembayaran dan ujian untuk mahasiswa dan lain - lain silahkan lihat di bagian transaksi</p>
            <div class="divider"></div>
            <?php
                $query = $con->query('SELECT ujian.*, diskon.*, informasi_bayar.* FROM ujian, diskon, informasi_bayar WHERE ujian.id_tes = informasi_bayar.id_tes AND diskon.id_diskon = informasi_bayar.id_diskon ORDER BY id_informasi ASC');
                if($query->rowCount()){
            ?>
            <!--start container-->
              <div id="responsive-images" class="section">
                <div class="row">
                  <div class="col s12 m8 l12">
                    <div class="card-panel grey lighten-5 z-depth-1">
                      <div class="row valign-wrapper">
                        <div class="col s8 m10">
                          <center><span class="black-text">Jumlah Informasi Permbayaran yang Ada sebanyak : <b><?php echo $query->rowCount(); ?></b> Buah</span></center>
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
                          <center><span class="black-text">Tidak ada kumpulan transaksi</span></center>
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
              <h4 class="header">DataTables Informasi Pembayaran</h4>
              <a class="btn-flat waves-effect pink accent-2 white-text" href='javascript:void(0);' onclick="window.open('report/all-report/all-report-info-bayar.php','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')" data-position='right' data-delay='50' data-tooltip='Print Document'>
                            <i class="large mdi-action-print right"></i>Print All
              </a>
              <div class="row">

                <div class="col s12 m8 l12">
                  <table id="data-table-simple" class="account_data responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Tes</th>
                            <th>ID Diskon</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>ID Tes</th>
                          <th>ID Diskon</th>
                          <th>Jumlah Pembayaran</th>
                          <th>Action                          
                        </tr>
                    </tfoot>

                    <tbody>
                      
                      <?php
                        //Data yang ditampilkan ke tabel
                        //Menampilkan session dan biodata admin login
                        $query2 = $con->query("SELECT ujian.*, diskon.*, informasi_bayar.* FROM ujian, diskon, informasi_bayar WHERE ujian.id_tes = informasi_bayar.id_tes AND diskon.id_diskon = informasi_bayar.id_diskon ORDER BY id_informasi ASC");
                        $query2->execute();
                        $infoBayar = $query2->fetchAll();
                        $no=1;
                        //looping keterangan admin
                        foreach($infoBayar as $infoBayaran){
                            $jml_bayar  = $infoBayaran['jml_bayar'];
                            $id_tes     = $infoBayaran['id_tes'];
                            $id_diskon  = $infoBayaran['id_diskon'];
                            $id       = $infoBayaran['id_informasi'];
                            $encrypt   = base64_encode($id);
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $id_tes;?></td>
                            <td><?php echo $id_diskon;?></td>
                            <td><?php echo "Rp.".number_format($jml_bayar); ?></td>
                            <td>
                              <?php
                                echo "<a class='btn-floating btn-middle waves-effect waves-light red tooltipped' type='submit' name='update' href='update-info-pembayaran.php?id=$encrypt' data-position='left' data-delay='50' data-tooltip='Update'>
                                  <i class='large mdi-editor-mode-edit'></i>
                                </a>";
                              ?>
                              <?php
                                echo "<a class='btn-floating btn-middle waves-effect waves-light blue tooltipped' type='submit' name='account_id' href='table/info-bayaran/delete-inba.php?id=$id' data-position='top' data-delay='50' data-tooltip='Delete'>
                                  <i class='large mdi-action-delete'></i>
                                </a>";
                              ?>
                              <a class='btn-floating btn-middle waves-effect waves-light orange tooltipped' href='javascript:void(0);' onclick="window.open('report/report-info-bayar.php?id=<?php echo $id;?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')" data-position='right' data-delay='50' data-tooltip='Print Document'>
                                              <i class='large mdi-action-print'></i>
                              </a>
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
        include_once "modal/info-bayar-modal.php";
      ?>

      <?php
        include_once"table/footerTable.html";
      ?>



      