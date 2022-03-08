<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>
<div class="padding">
<div class="col-sm-6">
      <form action="update" method="POST">
      <div class="box">
          <div class="box-header">
            <h2>Actualizar perfil</h2>
          </div>
          <div class="box-body">
            <p class="text-muted">Ingresá tus nuevos datos.</p>
            <hr>

            <div class="form-group">
            <label for="inputLastName">Nombre </label>
            <input name="name" value="<?=old('name', $name)?>" class="form-control" id="inputLastName" type="text" placeholder="Ingresa aquí" />
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>                      
            </div>

            <div class="form-group">
            <label for="inputLastName">Correo</label>
            <input name="email" value="<?=old('email', $email)?>" class="form-control" id="inputLastName" type="text" placeholder="Ingresa aquí" />
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>                      
            </div>


      <div class="dker p-a text-left">
            <button type="submit" class="btn success"><i class="fas fa-save"></i> Actualizar</button>
          </div>
        </div>
      </form>

<?= $this->endSection() ?>

