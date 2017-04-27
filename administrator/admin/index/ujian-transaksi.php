<?php
    $query7 = $con->query('SELECT * FROM ujian');
                if($query7->rowCount()){
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Profile About  -->
                        <div class="card amber darken-2 z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-action-speaker-notes"></i> <?php echo $query7->rowCount(); ?></p>
                                <p>Ujian</p>
                            </div>                  
                        </div>
                    <!-- Profile About  -->
                    </div>
            <?php
                }else{
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Profile About  -->
                        <div class="card amber darken-2 z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-action-speaker-notes"></i> Oops, tidak ada ujian - ujian yang tersedia</p>
                                <div class="divider"></div>
                                <p>Ujian</p>
                            </div>                  
                        </div>
                    </div>
                    <!-- Profile About  -->
            <?php
                }        
            ?>