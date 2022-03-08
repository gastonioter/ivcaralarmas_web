<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>

<div class="p-a white lt box-shadow">
	<div class="row">
		<div class="col-sm-8">
			<h4 class="mb-0 _900">Mis teléfonos</h4>
			<small class="text-muted">Te enviaremos SMS y/o llamadas por los eventos de tus dispositivos</small>
		</div>
	</div>
</div>

<div class="col-12 col-md-9">
  <div class="padding">
    <div class="box">
      <div class="box-header">
        <a class="btn btn-success mt-2" href="phone/new">Nuevo <i class="fas fa-plus"></i></a>
        <div class="inline mx-2">
        <?= view("users/phone/_session"); ?>
        
        </div>
      </div>
    <div>
      <table class="table table-responsive m-b-none footable-loaded footable tablet breakpoint" ui-jp="footable" data-filter="#filter" data-page-size="5">
        <thead>
          <tr>
              <th class="footable-visible footable-sortable">Id</th>
              <th class="footable-visible footable-sortable">Número</th>
              <th class="footable-visible footable-sortable" >Opciones</th> 
          </tr>
        </thead>
        <tbody>

        <?php foreach($phones as $key) : ?>

          <tr class="footable-odd" style="display: table-row;">
              <td class="footable-visible footable-first-column"><span class="footable-toggle"><?= $key->phone_id ?></span></td>
              <td class="footable-visible footable-first-column"><span class="footable-toggle"><?= $key->phone_number ?></span></td>
              <td>
              <form action="phone/delete/<?=$key->phone_id?>" method="post">
                <?= csrf_field() ?>
                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm" type="sumbit"><i class="fa fa-trash"></i></button>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" class="btn btn-primary btn-sm" href="phone/<?=$key->phone_id?>/edit"><i class="fa fa-edit"></i></a>
              </form>
              </td>  
          </tr>
          <?php endforeach ?>

        </tbody>
        <tfoot class="hide-if-no-paging">
          <tr>
              <td colspan="3" class="text-center">
                  <a href="<?=base_url().route_to('app_profile')?>"><i class="fas fa-arrow-circle-left"></i> Ver mis datos</a>
              </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
          </div>
      
        </div>



<?php //aca hago la conexion y subscripcion a los topicos ?>
<?= view('users/dashboard/mqtt/main',['devices' => $devices]) ?>
<?php // ahora tengo que las funciones cada vez que llegue un mensaje ?>
<?= view('users/dashboard/mqtt/index',['devices' => $devices]) ?>

        <?= $this->endSection() ?>