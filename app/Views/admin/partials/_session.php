<?php if(session('messaje')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Atencion!</strong><?= session('messaje') ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>