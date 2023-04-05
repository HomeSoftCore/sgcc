<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand">
            <!-- <div class="logo-img">
                <img src="src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> 
            </div> -->
            <span class="text">SGCC</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
                    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Men&uacute;</div>
                <?php if (session('perfilId') === '1'): ?>
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Usuarios</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('UsuariosController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>

                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Areas</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('/areas'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>    
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Estudiantes</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('EstudianteController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>    
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Docente</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('DocentesController'); ?>" class="menu-item">Administrar</a>

                            <a href="<?php echo base_url('RegistroDocentesController'); ?>" class="menu-item">Registro</a>
                        </div>
                    </div> 
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Cursos</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('CursosController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>  
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Matr&iacute;culas</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('MatriculasController/pendientes'); ?>" class="menu-item">Pendientes</a>

                            <a href="<?php echo base_url('MatriculasController'); ?>" class="menu-item">Matriculados</a>
                        </div>
                    </div>     
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Pagos</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('PagosController'); ?>" class="menu-item">Pendientes</a>
                        </div>
                    </div>   
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Opciones</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('OpcionesController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>  
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Perfiles</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('PerfilesController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>  
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Auditorias</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('AuditoriasController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>      
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Calificaciones</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('CalificacionesController'); ?>" class="menu-item">Administrar</a>

                            <a href="<?php echo base_url('RegistroCalificacionesController'); ?>" class="menu-item">Registro Calif.</a>
                        </div>
                    </div>       
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Asistencias</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('AsistenciasController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>    
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Items</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('ItemsController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>   
                    
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span>Calificaciones Items</span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url('CalificacionesItemsController'); ?>" class="menu-item">Administrar</a>
                        </div>
                    </div>                     
                <?php endif; ?>


            </nav>
        </div>
    </div>
</div>