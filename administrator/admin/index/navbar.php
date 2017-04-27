<!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="indigo">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="" alt=""></a> <span class="logo-text">Materialize</span></h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click Me for Oversize"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <script>
                        $(document).ready(function(){
                          $('.tooltipped').tooltip({delay: 50});
                        });
                        </script>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details indigo darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?php echo $grav_email;?>" alt="" class="circle z-depth-4 responsive-img activator valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <!--<li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="page-lock-screen.php"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li>-->
                                    <li><a href="logout/logout.php" onclick="return konfirmasi()"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $nm_admin;?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
                    </li>

                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                          <li class="bold"><a class="collapsible-header waves-effect waves-indigo"><i class="mdi-action-dashboard"></i>Dashboards</a>
                              <div class="collapsible-body">
                                  <ul>
                                      <li><a href="/Kuliah/Riset/Admin/administrator/admin/">Dashboard Admin</a>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                            <li class="li-hover"><div class="divider"></div></li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-indigo"><i class="mdi-file-folder"></i> Data Master</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="account.php">Calon Mahasiswa</a>
                                        </li>
                                        <li><a href="soal.php">Soal</a>
                                        </li>
                                        <li><a href="discount.php">Diskon</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="li-hover"><div class="divider"></div></li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-indigo"><i class="mdi-file-folder-open"></i> Data Transaksi</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="ujian.php">Ujian</a>
                                        </li>
                                        <li><a href="info-bayar.php">Informasi Bayar</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="li-hover"><div class="divider"></div></li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-indigo"><i class="mdi-action-note-add"></i>Data Tambahan</a>
                              <div class="collapsible-body">
                                  <ul>
                                      <li><a href="detail_ujian.php">Detail Ujian</a>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                          <li class="li-hover"><div class="divider"></div></li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-indigo"><i class="mdi-editor-insert-comment"></i> Data Form</a>
                                <div class="collapsible-body">
                                    <ul>                                        
                                        <li><a href="soal-form.php">Soal</a>
                                        </li>
                                        <!--<li><a href="#">Diskon</a>
                                        </li>-->
                                    </ul>
                                </div>
                            </li>
                            <!--<li class="li-hover"><div class="divider"></div></li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-indigo"><i class="mdi-file-folder-shared"></i>Report</a>
                              <div class="collapsible-body">
                                  <ul>
                                      <li><a href="#">Informasi Bayar</a>
                                      </li>
                                  </ul>
                              </div>
                          </li>-->
                            <!--<li class="bold"><a class="collapsible-header  waves-effect waves-indigo"><i class="mdi-social-pages"></i> Pages</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-login.html">Login</a>
                                        </li>
                                        <li><a href="page-register.html">Register</a>
                                        </li>
                                        <li><a href="page-lock-screen.html">Lock Screen</a>
                                        </li>
                                        <li><a href="page-invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="page-404.html">404</a>
                                        </li>
                                        <li><a href="page-500.html">500</a>
                                        </li>
                                        <li><a href="page-blank.html">Blank</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                        </ul>
                    </li>
                    <li class="li-hover"><div class="divider"></div></li>
                    
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->