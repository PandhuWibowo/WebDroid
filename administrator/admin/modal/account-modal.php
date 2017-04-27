<div id="task-modal" class="modal">
                <nav class="task-modal-nav indigo">
                    <div class="nav-wrapper">
                      <div class="left col s12 m10 l5">
                        <ul>
                          <li><a href="#!" class="todo-menu"><i class="modal-action modal-close  mdi-hardware-keyboard-backspace"></i></a>
                          </li>
                          <li><small>Calon Mahasiswa Baru</small>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <div class="modal-content">                    
                    <div class="row">
                      <form class="col s12" action="insert/account/insert-account-proses.php" method="POST">
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate" maxlength="20 number" required autofocus/>
                            <label for="password">Password</label>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col s6">                            
                            <select name="jurusan">
                              <option value="" disabled selected>Silahkan Pilih Jurusan</option>
                              <option value="Teknik Informatika">Teknik Informatika</option>
                              <option value="Sistem Informasi">Sistem Informasi</option>
                              <option value="Sistem Komputer">Sistem Komputer</option>
                            </select>
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
