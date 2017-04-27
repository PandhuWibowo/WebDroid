<?php
    $query2 = $con->query('SELECT * FROM cln_mhs');
                if($query2->rowCount()){
                    ?>
                    <div class="col s12 m6 l3">
                        <!-- Profile About  -->
                        <div class="card amber darken-2 z-depth-2">
                            <div class="card-content white-text center-align">
                                <p class="card-title"><i class="mdi-social-group-add"></i> <?php echo $query2->rowCount(); ?></p>
                                <p>Calon Mahasiswa</p>
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
                                <p class="card-title"><i class="mdi-social-group-add"></i> Oops, tidak ada calon mahasiswa baru</p>
                                <div class="divider"></div>
                                <p>Calon Mahasiswa</p>
                            </div>                  
                        </div>
                    </div>
                    <!-- Profile About  -->
            <?php
                }        
            ?>