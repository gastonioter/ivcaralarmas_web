<?= $this->extend('admin/templates/layout') ?>
<?= $this->section('content') ?>
<div class="padding">
    <div class="col-sm-6">
        <?php $back = base_url() . "" ?>
        <form action="create" method="POST">
            <?= view("admin/users/phone/_form", ['textButton' => ' Guardar', 'title' => 'Nuevo teléfono', 'back' => $back]); ?>
        </form>
    </div>
</div>
<?= $this->endSection() ?>