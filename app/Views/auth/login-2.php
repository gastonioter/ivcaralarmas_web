<div id="layoutAuthentication">
<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4 inline">Login</h3>
                        <a href="<?=base_url().route_to('home')?>"><i class="fas fa-arrow-circle-left"></i></a></div>
                        
                        <div class="card-body">
                        <form action="<?= base_url().route_to('app_attemptLogin')?>" method="POST">
                        <?= csrf_field() ?>

                    <?php if(! empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-successs"><?= session()->getFlashdata('success') ?></div>
                    <?php endif ?>

                    <?php if(! empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
                    <?php endif ?>
                                
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

                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small" href="<?=base_url().route_to('app_forgot')?>">Olvidé mi contraseña</a>
                            <button class="btn btn-primary" type="submit">Log In</button>
                        </div>
                    </form>
                        </div>
                        <div class="card-footer text-center py-3">
                        <div class="small"><a  href="<?=base_url().route_to('app_register')?>">No tenés cuenta?<strong> Registrate!</strong></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>



