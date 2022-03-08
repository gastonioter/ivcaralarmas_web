<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>
<div class="padding">
<div class="col-sm-6">
<?php $back = base_url()."/device" ?>
      <form action="<?=base_url();?>/device/update/<?=$device->device_id?>" method="POST">
      <?= view("users/devices/_form", ['textButton' => ' Actualizar', 'title' => 'Editar dispositivo' , 'back' => $back]); ?>
      </form>
</div>
</div>
<?= $this->endSection() ?>

