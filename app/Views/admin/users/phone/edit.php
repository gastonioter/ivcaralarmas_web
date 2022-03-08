<?= $this->extend('admin/templates/layout') ?>
<?= $this->section('content') ?>
<div class="padding">
    <div class="col-sm-6">
        <?php $back = base_url() . "/useradmin" ?>
        <form action="<?= base_url(); ?>/phoneadmin/update/<?= $phone->phone_id ?>" method="POST">
            <?= view("admin/users/phone/_form", ['textButton' => ' Actualizar', 'title' => 'Actualizar teléfono', 'back' => $back]); ?>
        </form>

    </div>
</div>
<?= $this->endSection() ?>