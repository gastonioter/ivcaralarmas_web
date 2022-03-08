<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registro de usuario</h3>
                    <a href="<?=base_url().route_to('home')?>"><i class="fas fa-arrow-circle-left"></i></a></div>
                    <div class="card-body">

                        <form action="<?= base_url().route_to('app_attemptRegister')?>" method="POST">
                            <?= csrf_field() ?>
                            <?php if(! empty(session()->getFlashdata('falied'))) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('falied') ?></div>
                            <?php endif ?>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input name="name" value="<?=old('name')?>" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                        <label for="inputFirstName">Nombre</label>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="phone" value="<?=old('phone')?>" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                        <label for="inputLastName">Telefono</label>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'phone') : '' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="email" value="<?=old('email')?>" class="form-control" id="inputEmail" placeholder="name@example.com" />
                                <label for="inputEmail">Correo Electrónico</label>
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                        <label for="inputPassword">Contraseña</label>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input name="r_password" name="r_password" class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirmar Contraseña</label>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'r_password') : '' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Registrarme</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="<?=base_url().route_to('app_login')?>">Ya estás registrado?<strong class="fw-bold"> Ir al login<strong></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
