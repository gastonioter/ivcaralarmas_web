
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Recuperar contraseña</h3></div>
                    <div class="card-body">
                        <div class="small mb-3 text-muted">Ingrese el correo electrónico con el que se registró y le enviaremos su nueva clave.</div>
                        <form action="<?= base_url().route_to('app_attemptForgot')?>" method="POST">
                            <?= csrf_field() ?>

                            <?php if(! empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                            <?php endif ?>

                            <div class="form-floating mb-3">
                                <input value="<?=old('email')?>" name="email" class="form-control" id="inputEmail" placeholder="name@example.com" />
                                <label for="inputEmail">Correo electrónico</label>
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="<?= base_url().route_to('app_login')?>">Volver al login</a>
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Confirmar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="<?= base_url().route_to('app_register')?>">No tienes cuenta? Registrate!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
  
  function display_error($validation, $field){
  
      if($validation->hasError($field)){
          return $validation->getError($field);
      }else{
          return false;
      }
  }
  ?>