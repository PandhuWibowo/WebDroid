<div id="task-modal" class="modal">
                <nav class="task-modal-nav indigo">
                    <div class="nav-wrapper">
                      <div class="left col s12 m10 l5">
                        <ul>
                          <li><a href="#!" class="todo-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a>
                          </li>
                          <li><small>Detail Ujian Mahasiswa Baru</small>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>

                  <?php
                                    //Data yang ditampilkan ke tabel
                                    //Menampilkan session dan biodata admin login
                                    $query10 = $con->query("SELECT * FROM ujian ORDER BY id_tes ASC");
                                    $query10->execute();
                                    $id_tes = $query10->fetchAll();
                                    $query11 = $con->query("SELECT * FROM soal ORDER BY id_soal ASC");
                                    $query11->execute();
                                    $id_soal = $query11->fetchAll();
                                    $query12 = $con->query("SELECT * FROM diskon ORDER BY id_diskon ASC");
                                    //select diskon.*, ujian.*, informasi_bayar.* from ujian, diskon, informasi_bayar where diskon.id_diskon = informasi_bayar.id_diskon and ujian.id_tes = informasi_bayar.id_tes ORDER BY ujian.id_tes ASC
                                    $query12->execute();
                                    $id_diskon = $query12->fetchAll();
                                    
                                    $no=1;
                                    //looping keterangan admin
                                    
                                    ?>
                  <div class="modal-content">                    
                    <div class="row">
                      <form class="col s12" action="insert/detail-ujian/insert-detail-ujian-proses.php" method="POST">
                        <div class="row">
                          <div class="input-field col s6">                            
                            <select name="id_tes">
                              <option value="" disabled selected>Pilih Id Tes Calon Mahasiswa</option>
                              <?php
                                  foreach($id_tes as $id_test){
                                        $idTes            = $id_test['id_tes'];
                                        // $waktu_tes          = $infoUjians['waktu_tes'];
                                        // $id                 = $infoUjians['id_tes'];
                                        // $encrypt            = base64_encode($id);
                                        ?>

                                          <option value="<?php echo $idTes;?>"><?php echo $idTes;?></option>
                                        <?php
                                    }
                              ?>

                              
                              <!--<option value="Sistem Informasi">Sistem Informasi</option>
                              <option value="Sistem Komputer">Sistem Komputer</option>-->
                            </select>
                          </div>
                          <div class="row">
                            <div class="input-field col s6">                            
                            <select name="nilai_ujian">
                              <option value="" disabled selected>Pilih Nilai Ujian Calon Mahasiswa</option>
                                  <?php
                                    foreach($id_diskon as $id_diskoner){
                                      $id_diskon    = $id_diskoner['id_diskon'];
                                      $nilai_ujian  = $id_diskoner['nilai_ujian'];
                                  ?>
                                          <option value="<?php echo $nilai_ujian;?>"><?php echo $nilai_ujian;?></option>
                                        <?php
                                    }
                              ?>

                              
                              <!--<option value="Sistem Informasi">Sistem Informasi</option>
                              <option value="Sistem Komputer">Sistem Komputer</option>-->
                            </select>
                          </div>
                          </div>
                          <div class="row">
                          <div class="input-field col s6">                            
                            <select name="jwbn_soal">
                              <option value="" disabled selected>Jawaban Soal Mahasiswa</option>                             
                              <option value="A">A</option>                            
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                            </select>
                          </div>
                          </div>
                          <div class="row">
                          <div class="input-field col s6">                            
                            <select name="id_soal">
                              <option value="" disabled selected>Pilih Id Soal Calon Mahasiswa</option>
                              <?php
                                  foreach($id_soal as $id_soall){
                                        $idSoal            = $id_soall['id_soal'];
                                        // $waktu_tes          = $infoUjians['waktu_tes'];
                                        // $id                 = $infoUjians['id_tes'];
                                        // $encrypt            = base64_encode($id);
                                        ?>

                                          <option value="<?php echo $idSoal;?>"><?php echo $idSoal;?></option>
                                        <?php
                                    }
                              ?>

                              
                              <!--<option value="Sistem Informasi">Sistem Informasi</option>
                              <option value="Sistem Komputer">Sistem Komputer</option>-->
                            </select>
                          </div>
                          
                          
                          <!--<div class="input-field col s12">
                            <input id="jml_discount" type="text" name="noClnMhs" class="validate" maxlength="20 number" readOnly value="<?php echo $noClnMhs;?>" />
                            <label for="jml_discount">No Calon Mahasiswa</label>
                          </div>-->
                        </div>
                        
                        <div class="row">
                          
                          <div class="col s12 m7 l7">
                            <ul class="">
                                <button class="btn-large indigo waves-effect waves-light calright" type="submit" name="simpan"><i class="mdi-content-send">Save</i></button>
                                <button class="btn-large indigo waves-effect waves-light calright" type="reset" name="reset"><i class="mdi-navigation-cancel">Reset</i></button>
                            </ul>
                      </div>                                          
                        </div>
                      </form>
                    </div>
                  </div>                 
                </div>
                </div>
                