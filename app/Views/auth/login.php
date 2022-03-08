  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">

            <?= view("auth/_session"); ?>

            <form action="<?= base_url().route_to('app_attemptLogin')?>" method="POST">
            <?= csrf_field() ?>

              <div class="form-floating mb-3">
                <input value="<?=old('email')?>" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Correo electrónico</label>
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
              </div>
              <div class="form-floating mb-3">
                <input value="<?=old('password')?>" type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Recordarme
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary mb-3 btn-login text-uppercase fw-bold" type="submit">Log In</button>
              </div>
              <div class="d-grid">
              <a class="btn my-3 inline-block mx-2 btn-outline-dark btn-dark text-white btn-sm" href="<?=base_url().route_to('app_forgot')?>">Olvidé mi contraseña</a>
              </div>
              <div class="d-grid">
              <a class="btn inline-block mx-2 btn-outline-dark btn-dark text-white btn-sm" href="<?=base_url().route_to('app_register')?>">No tengo cuenta</a>
            </div>
            <div class="d-grid">
            <a class="text-center font-italic mt-2 fw-normal" href="<?=base_url()?>">Inicio</a>
            </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

