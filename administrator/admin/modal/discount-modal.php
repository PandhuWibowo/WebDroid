<div id="task-modal" class="modal">
                <nav class="task-modal-nav indigo">
                    <div class="nav-wrapper">
                      <div class="left col s12 m10 l5">
                        <ul>
                          <li><a href="#!" class="todo-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a>
                          </li>
                          <li><small>Diskon Mahasiswa Baru</small>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <div class="modal-content">                    
                    <div class="row">
                      <form class="col s12" action="insert/discount/insert-discount-proses.php" method="POST">
                      <?php
                          include"insert/autonumber/autonumber.php";
                      ?>
                        <div class="row">                            
                            <div class="input-field col s12">
                              <input id="id_diskon" type="hidden" name="id_diskon" class="validate" maxlength="20 number" value=<?php echo autonumber("diskon", "id_diskon","4","Dis"); ?> readonly />
                              <!--<label for="id_tes">ID Tes</label>-->
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="jml_discount" type="text" name="jml_discount" class="validate" maxlength="20 number" required autofocus/>
                            <label for="jml_discount">Jumlah Diskon</label>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="nilai_ujian" type="text" name="nilai_ujian" class="validate" maxlength="20 number" required />
                            <label for="nilai_ujian">Nilai Ujian</label>
                          </div>
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
