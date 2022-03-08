<?php if(empty(session()->getFlashdata('success'))) : ?>
    <div class="alert alert-success"><i class="fas fa-check-circle"></i><?= session()->getFlashdata('success') ?></div>
<?php endif ?>

<?php if(empty(session()->getFlashdata('fail'))) : ?>
    <div class="alert alert-danger"><i class="fas fa-times-circle"></i><?= session()->getFlashdata('fail') ?></div>
<?php endif ?>