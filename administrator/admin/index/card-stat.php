        <div class="divider"></div>
          <!--Multicolor with icon tabs-->
          <div id="multi-color-tab" class="section">
            <div class="row">
              
              <div class="col s12 m8 l12">
                <div class="row">
                  <div class="col s12">
                    <ul class="tabs tab-demo-active z-depth-1">
                      <li class="tab col s3"><a class="white-text red darken-1 waves-effect waves-light active" href="#sapien1"><i class="mdi-action-list"></i> Data Master</a>
                      </li>
                      <li class="tab col s3"><a class="white-text purple darken-1 waves-effect waves-light" href="#activeone1"><i class="mdi-action-subject"></i> Data Transaksi</a>
                      </li>                    
                    </ul>
                  </div>
                  <div class="col s12">
                    <div id="sapien1" class="col s12  white lighten-3">
                        <!--card stats Data Master start-->
                    <div id="card-stats">
                        <div class="row">
                            <!--Title Master-->
                            <div class="container">
                                <!--<ul class="collection z-depth-2">
                                    <li class="collection-item">Data Master</li>
                                </ul>-->
                                
                                <?php
                                    
                                    include "calon-mahasiswa.php";

                                    include "discountrow.php";

                                    include "row-jumlah.php";
                                ?>
                            </div>                            
                        </div>
                    </div>
                    <!--card stats end-->
                    </div>
                    <div id="activeone1" class="col s12  white lighten-3">
                      <!--card stats Data Master start-->
                    <div id="card-stats">
                        <div class="row">
                            <!--Title Master-->
                            <div class="container">
                                <!--<ul class="collection z-depth-2">
                                    <li class="collection-item">Data Transaksi</li>
                                </ul>-->
                                
                                <?php
                                    include "ujian-transaksi.php";

                                    include "informasi-bayar.php";
                                ?>
                            </div>                            
                        </div>
                    </div>
                    <!--card stats end-->

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>