

<div id="aside" class="app-aside modal nav-dropdown">
  	<!-- fluid app aside -->
  <div class="left navside dark dk" data-layout="column">

    <div class="navbar no-radius">
      <a class="navbar-brand">
        <span class="hidden-folded inline">Ivcar Alarmas</span>
      </a>
    </div>

    <div class="hide-scroll" data-flex>
      <nav class="scroll nav-dark">
        <ul class="nav" ui-nav>
          <li class="nav-header hidden-folded">
            <small class="text-muted">Sistema</small>
          </li>

          <li>
            <a href="<?=base_url().route_to('app_user_dashboard')?>" >
              <span class="nav-icon">
                  <i class="fas fa-tachometer-alt"></i>
              </span>
              <span class="nav-text">Panel</span>
            </a>
          </li>

          <li>
          <a href="<?=base_url('device/')?>" >
              <span class="nav-icon">
              <i class="fas fa-microchip"></i>
              </span>
              <span class="nav-text">Dispositivos</span>
            </a>
          </li>

          <li>
            <a>
              <span class="nav-caret">
                <i class="fa fa-caret-down"></i>
              </span>

              <span class="nav-icon">
              <i class="fas fa-clipboard-list"></i>
              </span>
              <span class="nav-text">Perfil</span>
            </a>
            <ul class="nav-sub">
              <li>
                <a href="<?=base_url('users/profile')?>">
                  <span class="nav-text">Mis datos</span>
                </a>
              </li>
              <li>
                <a href="<?=base_url('phone')?>">
                  <span class="nav-text">Teléfonos</span>
                </a>
              </li>

            </ul>
          </li>


          <li>
            <a>
              <span class="nav-caret">
                <i class="fa fa-caret-down"></i>
              </span>

              <span class="nav-icon">
              <i class="fas fa-chart-bar"></i>
              </span>
              <span class="nav-text">Gráficos</span>
            </a>
            <ul class="nav-sub">
              <li>
                <a href="<?=base_url().route_to('app_chart_selector_historic')?>">
                  <span class="nav-text">Históricos</span>
                </a>
              </li>
              <li>
              <a href="<?=base_url().route_to('app_chart_selector_realtime')?>">
                  <span class="nav-text">Tiempo Real</span>
                </a>
              </li>

            </ul>
          </li>


          <li>
          <a  data-toggle="modal" data-target="#m-sm" ui-toggle-class="fade-down-big" ui-target="#animate" >
              <span class="nav-icon">
                  <i class="fas fa-sign-out-alt"></i>
              </span>
              <span class="nav-text">Salir</span>
            </a>
          </li>

          <li class="nav-header hidden-folded">
            <small class="text-muted">Ayuda</small>
          </li>

          <li class="hidden-folded" >
            <a href="docs.html" >
              <span class="nav-text">Documentación</span>
            </a>
          </li>

        </ul>
    </nav>
  </div>

    <div class="b-t">
      <div class="nav-fold">
        <a href="<?=base_url('users/profile')?>">

            <span class="clear hidden-folded p-x">
              <span class="block _500"><?= $name ?></span>
              <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>Conectado</small>
            </span>
        </a>
      </div>
    </div>
  </div>
</div>


<div id="m-sm" class="modal fade animate" data-backdrop="true">
  <div class="modal-dialog" id="animate">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title"><i class="fas fa-exclamation-circle"></i> Atención</h5>
      </div>
      <div class="modal-body text-center p-lg">
        <p>¿Estás seguro que desas cerrar sesión?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button>
        <a href="<?=base_url().route_to('app_logout')?>" class="btn danger p-x-md" >Cerrar sesión</a>

      </div>
    </div><!-- /.modal-content -->
  </div>
</div>
  <!-- / -->
