<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>
<div class="padding">
<div class="col-sm-6">
      <?php $back = base_url()."/deviceadmin" ?>
      <form action="<?=base_url();?>/deviceadmin/update/<?=$device->device_id?>" method="POST">
      <?= view("admin/devices/_form", ['textButton' => ' Guardar', 'title' => 'Nuevo dispositivo', 'back' => $back]); ?>
      </form>
    
            </div>
            </div>
<?= $this->endSection() ?>

