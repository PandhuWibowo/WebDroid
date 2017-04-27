<?php
    $query6 = $con->query('SELECT * FROM soal');
                if($query6->rowCount()){
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Soal About  -->
                        <div class="card blue darken-2 z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-action-speaker-notes
                                    "></i> <?php echo $query6->rowCount(); ?></p>
                                <p>Soal</p>
                            </div>                  
                        </div>
                    <!-- Diskon About  -->
                    </div>
            <?php
                }else{
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Soal About  -->
                        <div class="card blue darken-2 z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-action-speaker-notes
                                    "></i> Oops, tidak ada soal ujian yang tersedia</p>
                                <div class="divider"></div>
                                <p>Soal</p>
                            </div>                  
                        </div>
                    </div>
                    <!-- Profile About  -->
            <?php
                }        
            ?>