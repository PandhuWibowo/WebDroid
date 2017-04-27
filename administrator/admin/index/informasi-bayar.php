<?php
    $query8 = $con->query('SELECT * FROM informasi_bayar');
                if($query8->rowCount()){
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Profile About  -->
                        <div class="card indigo darken-2 z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-action-info-outline"></i> <?php echo $query8->rowCount(); ?></p>
                                <p>Informasi Bayar</p>
                            </div>                  
                        </div>
                    <!-- Profile About  -->
                    </div>
            <?php
                }else{
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Profile About  -->
                        <div class="card indigo darken-2 z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-action-info-outline"></i> Oops, tidak ada informasi bayar yang tersedia</p>
                                <div class="divider"></div>
                                <p>Informasi Bayar</p>
                            </div>                  
                        </div>
                    </div>
                    <!-- Profile About  -->
            <?php
                }        
            ?>