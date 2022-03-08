<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>



<div class="p-a white lt box-shadow">
	<div class="row">
		<div class="col-sm-8">
			<h4 class="mb-0 _900">Mis datos</h4>
			<small class="text-muted">Puedes editar tus datos cuando sea necesario y agregar hasta 4 teléfonos a tu cuenta</small>
		</div>
	</div>
</div>

<div class="padding">
<div class="box">
  <div class="box-header">
      <?= view("users/profile/_session"); ?>
        </div>

        <div class="box-body">
        <div class="row">
      <div class="col-sm-3 col-lg-3 col-xl-3 col-xxl-3">
              <div class="row m-b">
                <div class="col-xs-6">
                  <small class="text-muted">Nombre de Usuario</small>
                  <div class="_500"><?= $name ?></div>
                </div>
              </div>

              <div class="row m-b">
                <div class="col-xs-6">
                  <small class="text-muted">Correo Electrónico</small>
                  <div class="_500"><?= $email ?></div>
                </div> 
              </div>

              <div class="row m-b">
                <div class="col-xs-6">
                <small class="text-muted">Fecha y hora de registro</small>
                <div><?= $userData->created_at ?></div>
              </div> 
            </div>
          </div>

          <div class="row m-b inline">
                <div class="col-12 col-xs-6">
                  <small class="text-muted">Mis teléfonos</small>
                  
                  <ul>
                      <?php foreach($phones as $key): ?>
                      <li><div class="_500"><?= $key->phone_number ?></div></li>
                      <?php endforeach ?>
                  </ul>
                  <div class="_50"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Ver" class="btn btn-success mx-4" href="<?=base_url()?>/phone"><i class="fa fa-cogs"></i></a></div>  
              </div>
            </div>
          </div>
          <hr>
          <div class="row justify-content-around">
              <div class="col-12">    
              <button class="btn danger mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Darme de baja" data-toggle="modal" data-target="#m-smm" class="btn danger mb-2 p-1">   <i class="fas fa-user-times"></i>   </button>
              <a href="profile/edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar datos de usuario" class="btn blue mb-2 mx-2" ><i class="fas fa-user-edit"></i></a>
            </div>
        </div>
      </div>

      </div>

      
      <div id="m-smm" class="modal fade black-overlay" data-backdrop="true">
              <div class="row-col h-v">
                <div class="row-cell v-m">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-exclamation-circle"></i> Atención</h5>
                      </div>
                      <div class="modal-body text-center p-lg">
                        <p>¿Estás seguro que deseas darte de baja en el sistema?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button>
                        <a href="profile/delete" class="btn danger p-x-md" >Sí</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php //aca hago la conexion y subscripcion a los topicos ?>
<?= view('users/dashboard/mqtt/main',['devices' => $devices]) ?>
<?php // ahora tengo que las funciones cada vez que llegue un mensaje ?>
<?= view('users/dashboard/mqtt/index',['devices' => $devices]) ?>
<?= $this->endSection() ?>