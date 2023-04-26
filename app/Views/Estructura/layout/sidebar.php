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
                <?php
                    $session=session();
                    $menu = $session->get('menu');
                    foreach ($menu  as $menu) {
                    ?>
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-command"></i><span><?php echo $menu['OPCNOMBRE']?></span></a>
                        <div class="submenu-content">
                            <a href="<?php echo base_url($menu['OPCRUTA']); ?>" class="menu-item">Administrar</a>
                            <?php if($menu['OPCRUTA'] === 'DocentesController') : ?>
                                <a href="<?php echo base_url('RegistroDocentesController'); ?>" class="menu-item">Asignar Curso</a>
                            <?php endif; ?>


                            <?php if($menu['OPCRUTA'] === 'CalificacionesController') : ?>
                                <a href="<?php echo base_url('RegistroCalificacionesController'); ?>" class="menu-item">Registro Calif.</a>
                            <?php endif; ?>                            
                        </div>
                    </div>                    
                <?php } ?>             

            </nav>
        </div>
    </div>
</div>