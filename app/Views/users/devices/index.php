<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>


<div class="p-a white lt box-shadow">
	<div class="row">
		<div class="col-sm-8">
			<h4 class="mb-0 _900">Mis Dispositivos</h4>
			<small class="text-muted">Los dispositivos que agregues aquí se verán reflejados en el <strong>panel de dahsboard</strong></small>
		</div>
	</div>
</div>


<div class="col-12 col-md-8">
  <div class="padding">
    <div class="box">
      <div class="box-header">
        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar nuevo dispositivo" class="btn btn-success mt-2" href="<?=base_url()?>/device/new">Nuevo <i class="fas fa-plus"></i></a>
        
        <div class="row mt-2">
          <div class="col-12 col-6-md">
            <?= view('users/devices/_session') ?>
          </div>
        </div>
      </div>
    <div>
      <table class="table m-b-none footable-loaded footable tablet breakpoint table-responsive" ui-jp="footable" data-filter="#filter" data-page-size="5">
      <?php if($devicesCount > 0) :?>  
        
      <thead>
          <tr>
              <th class="footable-visible footable-sortable">Alias</th>
              <th class="footable-visible footable-sortable">Serie</th>
              <th class="footable-visible footable-sortable" >Tipo</th>
              <th class="footable-visible footable-sortable"><i class="fas fa-plug"></i></th>
              <th class="footable-visible footable-sortable" ><i class="fas fa-cogs"></i></th> 
          </tr>
        </thead>
        <tbody>
          <?php endif ?>

        <?php foreach($devices as $key) : ?>

          <tr class="footable-odd" style="display: table-row;">
              <td class="footable-visible footable-first-column"><span class="footable-toggle"><?= $key->device_alias ?></span></td>
              <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->device_serie ?></td>
              <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->category_name ?></td>
              <td class="footable-visible footable-first-column"><span class="footable-toggle"></span> <?php if ($key->device_status == 0){ echo "<div style='color:red'><i class='fa fa-times'></div>";} else if  ($key->device_status == 1) { echo "<div style='color:lime'><i class='fa fa-check-circle'></div>"; } ?></td>
              <td>
              <form action="device/delete/<?=$key->device_id?>" method="post">
              <?= csrf_field() ?>
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm" type="sumbit"><i class="fa fa-trash"></i></button>
              <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" class="btn btn-primary btn-sm" href="device/<?=$key->device_id?>/edit"><i class="fa fa-edit"></i></a>
        </form>
              </td>  
          </tr>
          <?php endforeach ?>

        </tbody>
        <?php if($devicesCount > 0) :?>  
        <tfoot class="hide-if-no-paging">
        <span class="text-muted mx-2 text-sm">Tenés <?= $devicesCount ?> dispositivo/s y <?= $devicesConnected ?> conectado/s</span> 
         
          <tr>
              <td colspan="3" class="">
                  <a href="<?=base_url().route_to('app_user_dashboard')?>"><i class="fas fa-arrow-circle-left"></i> Ir al panel</a>
              </td>
          </tr>
        </tfoot>
        <?php endif ?>
      </table>
    </div>
  </div>
</div>
</div>
<?php //aca hago la conexion y subscripcion a los topicos ?>
<?= view('users/dashboard/mqtt/main',['devices' => $devices]) ?>
<?php // ahora tengo que las funciones cada vez que llegue un mensaje ?>


<?= $this->endSection() ?>