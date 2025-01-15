                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <?php
                        $idestudiante = Main::decryption($_SESSION['idestudiantevali_appit']);
                        
                        $params = [":idestudiante" => $idestudiante];
                        
                        $nivel = Nivel::findNivelIdEstudiante($params);
                
                        foreach ($nivel as $row) :
                            //$nivel = $row->nivel;
                        ?>
                            <!-- <input type="hidden" id="idnivel" value="<?php echo Main::encryption($row->idnivel); ?>"> -->
                            <h6 class="text-danger"><?php echo $row->nivel; ?></h6>
                        <?php 
                        endforeach; 
                        ?>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link" href="mensajeria">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">
                                <?php
                                    $resp = Mensajeria::findAll(Main::decryption($_SESSION['idestudiante_appit']));
                                    $n = 0;
                                    foreach($resp as $row){
                                        if($row->estado == 0){
                                            $n = $n+1;
                                        }
                                    }
                                    echo $n;
                                ?>
                                </span>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="estudiante" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombresvali_appit']; ?></span>
                                <input type="hidden" id="idestudiante" value="<?php echo $_SESSION['idestudiantevali_appit']; ?>">
                                <img class="img-profile rounded-circle" src="<?php echo DIR; ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->