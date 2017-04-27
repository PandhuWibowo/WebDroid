<?php
    $query5 = $con->query('SELECT * FROM diskon');
                if($query5->rowCount()){
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Diskon About  -->
                        <div class="card indigo darken-2  z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-editor-attach-money
                                    "></i> <?php echo $query5->rowCount(); ?></p>
                                <p>Diskon</p>
                            </div>                  
                        </div>
                    <!-- Diskon About  -->
                    </div>
            <?php
                }else{
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Profile About  -->
                        <div class="card indigo darken-2 z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-editor-attach-money
                                    "></i> Oops, tidak ada diskon yang tersedia</p>
                                <div class="divider"></div>
                                <p>Diskon</p>
                            </div>                  
                        </div>
                    </div>
                    <!-- Profile About  -->
            <?php
                }        
            ?>