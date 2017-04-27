<div id="task-modal" class="modal">
                <nav class="task-modal-nav indigo">
                    <div class="nav-wrapper">
                      <div class="left col s12 m10 l5">
                        <ul>
                          <li><a href="#!" class="todo-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a>
                          </li>
                          <li><small>Ujian Mahasiswa Baru</small>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>

                  <?php
                                    //Data yang ditampilkan ke tabel
                                    //Menampilkan session dan biodata admin login
                                    $query10 = $con->query("SELECT * FROM cln_mhs ORDER BY noClnMhs ASC");
                                    $query10->execute();
                                    $clnMhs = $query10->fetchAll();
                                    $no=1;
                                    //looping keterangan admin
                                    
                                    ?>
                  <div class="modal-content">                    
                    <div class="row">
                      <form class="col s12" action="insert/ujian/insert-ujian-proses.php" method="POST">
                      <?php
                        include "insert/autonumber/autonumber.php";
                      ?>
                        <div class="row">                            
                            <div class="input-field col s12">
                              <input id="id_tes" type="hidden" name="id_tes" class="validate" maxlength="20 number" value=<?php echo autonumber("ujian", "id_tes","4","Uj"); ?> readonly />
                              <!--<label for="id_tes">ID Tes</label>-->
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s6">                            
                            <select name="noClnMhs">
                              <option value="" disabled selected>Silahkan Pilih No Calon Mahasiswa</option>
                              <?php
                                  foreach($clnMhs as $clnMahasiswa){
                                        $noClnMhs            = $clnMahasiswa['noClnMhs'];
                                        // $waktu_tes          = $infoUjians['waktu_tes'];
                                        // $id                 = $infoUjians['id_tes'];
                                        // $encrypt            = base64_encode($id);
                                        ?>

                                          <option value="<?php echo $noClnMhs;?>"><?php echo $noClnMhs;?></option>
                                        <?php
                                    }
                              ?>

                              
                              <!--<option value="Sistem Informasi">Sistem Informasi</option>
                              <option value="Sistem Komputer">Sistem Komputer</option>-->
                            </select>
                          </div>
                          
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
                