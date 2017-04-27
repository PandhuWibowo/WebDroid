<div id="task-modal" class="modal">
                <nav class="task-modal-nav indigo">
                    <div class="nav-wrapper">
                      <div class="left col s12 m10 l5">
                        <ul>
                          <li><a href="#!" class="todo-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a>
                          </li>
                          <li><small>Info Bayar Mahasiswa Baru</small>
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
                                    $query11 = $con->query("SELECT * FROM diskon ORDER BY id_diskon ASC");
                                    $query11->execute();
                                    $id_diskon = $query11->fetchAll();
                                    $no=1;
                                    //looping keterangan admin
                                    
                                    ?>
                  <div class="modal-content">                    
                    <div class="row">
                      <form class="col s12" action="insert/info-bayar/insert-info-bayar-proses.php" method="POST">
                      <?php
                        include "insert/autonumber/autonumber.php";
                      ?>
                        <div class="row">                            
                            <div class="input-field col s12">
                              <input id="id_informasi" type="hidden" name="id_informasi" class="validate" maxlength="20 number" value=<?php echo autonumber("informasi_bayar", "id_informasi","4","Inba"); ?> readonly />
                              <!--<label for="id_tes">ID Tes</label>-->
                          </div>
                        </div>
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
                            <select name="id_diskon">
                              <option value="" disabled selected>Pilih Id Diskon Calon Mahasiswa</option>
                              <?php
                                  foreach($id_diskon as $id_diskons){
                                        $idDiskon            = $id_diskons['id_diskon'];
                                        // $waktu_tes          = $infoUjians['waktu_tes'];
                                        // $id                 = $infoUjians['id_tes'];
                                        // $encrypt            = base64_encode($id);
                                        ?>

                                          <option value="<?php echo $idDiskon;?>"><?php echo $idDiskon;?></option>
                                        <?php
                                    }
                              ?>

                              
                              <!--<option value="Sistem Informasi">Sistem Informasi</option>
                              <option value="Sistem Komputer">Sistem Komputer</option>-->
                            </select>
                          </div>
                          <div class="row">
                          <div class="input-field col s12">
                            <input id="jml_bayar" type="text" name="jml_bayar" class="validate" maxlength="20 number" required autofocus/>
                            <label for="jml_bayar">Total Bayar</label>
                          </div>
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
                