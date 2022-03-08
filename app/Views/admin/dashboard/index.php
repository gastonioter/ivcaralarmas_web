<?= $this->extend('admin/templates/layout')?>
<?= $this->section('content') ?>

<div class="padding">

    <div class="row">

        <!-- USUARIOS -->
        <div class="col-xs-6 col-sm-4">
            <div class="box p-a">
                <div class="pull-left m-r">
                    <span class="w-48 rounded yellow">
                        <i class="fas fa-user-alt"></i>
                    </span>
                </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><b id="display_temp2_d3">Usuarios:<strong> <?= $users ?></strong></b><span class="text-sm"> </span></h4>
                        <small class="text-muted">Total de usuarios</small>
                    </div>
            </div>
        </div>

        <!-- MODULOS -->
        <div class="col-xs-6 col-sm-4">
            <div class="box p-a">
                <div class="pull-left m-r">
                    <span class="w-48 rounded primary">
                    <i class="fas fa-microchip"></i>
                    </span>
                </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><b id="display_temp2_d3">Módulos:<strong> <?= $devicesCount ?></strong></b><span class="text-sm"> </span></h4>
                        <small class="text-muted">Total de instalados</small>
                    </div>
            </div>
        </div>

        <!-- DESCONECTADOS -->
        <div class="col-xs-6 col-sm-4">
            <div class="box p-a">
                <div class="pull-left m-r">
                    <span class="w-48 rounded danger">
                    <i class="fa fa-exclamation-triangle"></i>
                    </span>
                </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><b id="display_temp2_d3">Desconec:<strong> <?= $devicesCount - $devicesConnected ?></strong></b><span class="text-sm"> </span></h4>
                        <small class="text-muted">Total desconectados</small>
                    </div>
            </div>
        </div>

    </div>



    <!-- CONECTADOS -->
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="box p-a" align="center">
                <div class="pull-left m-r">
                    <span class="w-48 rounded green">
                    <i class="fa fa-bolt"></i>
                    </span>
                </div>
                    <div class="clear">
                        <h4 class="m-0 text-lg _300"><b id="display_temp2_d3">Conectados: <strong> <?= $devicesConnected ?></strong></b><span class="text-sm"> </span></h4>
                        <small class="text-muted">Total conectados</small>
                    </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- TIPO ALARMA / DOMOTICA -->
  <div class="row">
    <div class="col-xs-6 col-sm-6">
        <div class="box p-a">

                <div class="clear">
                    <h4 class="m-0 text-lg _300"><b >Alarma:<strong> <?= $devicesAlarma ?></strong></b><span class="text-sm"> </span></h4>
                    <small class="text-muted">Total de tipo alarma</small>
                </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6">
        <div class="box p-a">

                <div class="clear">
                    <h4 class="m-0 text-lg _300"><b >Domótica:<strong> <?= $devicesDomotica ?></strong></b><span class="text-sm"> </span></h4>
                    <small class="text-muted">Total de tipo domótica</small>
                </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
