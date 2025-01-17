                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <?php 
                            $periodos = Periodo::findActivo();                             
                            foreach($periodos as $row):                                
                                $idperiodo = $row->idperiodo;
                                $periodo = $row->periodo;
                        ?>
                        <input type="hidden" id="idperiodo" value="<?php echo Main::encryption($idperiodo); ?>">
                        <h6 id="periodo" class="text-danger"><?php echo $periodo; ?></h6>
                        <?php                             
                            endforeach; 
                        ?>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link" href="mensaje">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">
                                    <?php
                                        $n = 0;

                                        $params = [":iddocente" => $_SESSION['idusuario_appit']];                                        
                                        $resp = Mensaje::findAll($params);
                                            foreach($resp as $row){
                                                if($row->estado == 1){
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
                                <span id="nombresusuario" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nombres_appit']; ?></span>
                                <input type="hidden" id="idusuario" value="<?php echo Main::encryption($_SESSION['idusuario_appit']); ?>">
                                <img class="img-profile rounded-circle" src="<?php echo DIR; ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="firmaelectronica">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Firma electrónica
                                </a>
                                <a class="dropdown-item" href="contrasena">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cambio de Contraseña
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
