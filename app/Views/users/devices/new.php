<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>
<div class="padding">
<div class="col-sm-6">
      <?php $back = base_url()."/device" ?>
      <form action="create" method="POST">
      <?= view("users/devices/_form", ['textButton' => ' Guardar', 'title' => 'Nuevo dispositivo', 'back' => $back]); ?>
      </form>
    
            </div>
            </div>
<?= $this->endSection() ?>

