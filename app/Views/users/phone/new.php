<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>
<div class="padding">
<div class="col-sm-6">
<?php $back = base_url()."/phone" ?>
      <form action="create" method="POST">
      <?= view("users/phone/_form", ['textButton' => ' Guardar', 'title' => 'Nuevo teléfono', 'back' => $back]); ?>
      </form>
      </div>
</div>      
<?= $this->endSection() ?>

