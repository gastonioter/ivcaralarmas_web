<div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow align-items-center">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
              <i class="fas fa-bars"></i>
            </a>
            
            <ul class="nav navbar-nav ml-auto flex-row">

            <li class="nav-item dropdown ">
                <a class="nav-link mx-0" href="<?=base_url().route_to('app_user_dashboard')?>">
                <i class="fas fa-sync-alt"></i>
                </a>
              </li>

                <li class="nav-item dropdown">
                <a class="nav-link clear" href="#" data-toggle="dropdown">
                <i class="fas fa-user fa-fw"></i>  
                </a>
                    <ul class="dropdown-menu dropdown-menu-overlay pull-right" aria-labelledby="dropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?=base_url().route_to('app_logout')?>">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>