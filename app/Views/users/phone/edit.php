<?= $this->extend('users/templates/layout') ?>
<?= $this->section('content') ?>
<div class="padding">
      <div class="col-sm-6">
            <?php $back = base_url() . "/phone" ?>
            <form action="<?= base_url(); ?>/phone/update/<?= $phone->phone_id ?>" method="POST">
                  <?= view("users/phone/_form", ['textButton' => ' Actualizar', 'title' => 'Actualizar teléfono', 'back' => $back]); ?>
            </form>

      </div>
</div>
<?= $this->endSection() ?>