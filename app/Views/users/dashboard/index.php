<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>

<?php echo view('users/dashboard/_head.php', ['devices' => $devices]) ?>


<div class="padding">
<div class="row">
<div class="col-sm-12 col-lg-12">
<div class="tab-content">
  <?php $flag = 0; ?>
  <?php foreach($devices as $key): ?>

    <?php if ($flag == 0) {?>
<div class="tab-pane p-v-sm active" id="tab_<?=$key->device_id?>">
    <?php $flag = 1; } else{?>
      <div class="tab-pane p-v-sm" id="tab_<?=$key->device_id?>"><?php
    }?>

<?php if($key->device_status == 1): ?>

  <?php if($key->category_name == 'alarma'): ?>
  <?= view('users/dashboard/tabs-content/alarma', ['device_alias' => $key->device_alias, 'device_id' => $key->device_id]) ?>
  <?php endif ?>

  <?php if ($key->category_name == 'domotica'): ?>
    <?= view('users/dashboard/tabs-content/domotica', ['device_alias' => $key->device_alias, 'device_id' => $key->device_id]) ?>
    <?php endif ?>

    <?php if ($key->category_name == 'full'): ?>
      <?= view('users/dashboard/tabs-content/ambos', ['device_alias' => $key->device_alias, 'device_id' => $key->device_id]) ?>

      <?php endif ?>
      <?php endif ?>

      <?php if($key->device_status == 0): ?>
        <?= view('users/dashboard/tabs-content/desconected', ['device_alias' => $key->device_alias, 'device_id' => $key->device_id]) ?>
        <?php endif ?>
      </div>


      <?php endforeach ?>

    </div>
  </div>
</div>

<?= view('users/dashboard/mqtt/main',['devices' => $devices]) ?>
<?= view('users/dashboard/mqtt/index',['devices' => $devices, 'flags_model' => $flags_model]) ?>


<?= $this->endSection() ?>

<!-- footer>
