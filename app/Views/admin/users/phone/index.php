<?= $this->extend('admin/templates/layout') ?>
<?= $this->section('content') ?>

<div class="col-12 col-md-12">
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar nuevo dispositivo" class="btn btn-success mt-2" href="<?= base_url() ?>/useradmin/phone/new">Nuevo <i class="fas fa-plus"></i></a>

                <div class="row mt-2">
                    <div class="col-12 col-12-md">
                        <?= view('users/devices/_session') ?>
                    </div>
                </div>
            </div>
            <div>
                <table class="table m-b-none footable-loaded footable tablet breakpoint table-responsive" ui-jp="footable" data-filter="#filter" data-page-size="5">


                    <thead>
                        <tr>
                            <th class="footable-visible footable-sortable">ID</th>
                            <th class="footable-visible footable-sortable">Número</th>
                            <th class="footable-visible footable-sortable"><i class="fas fa-cogs"></i></th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($phones as $key) : ?>

                            <tr class="footable-odd" style="display: table-row;">
                                <td class="footable-visible footable-first-column"><span class="footable-toggle"><?= $key->phone_id ?></span></td>
                                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->phone_number ?></td>
                                <td>
                                    <form action="/phoneadmin/delete/<?= $key->phone_id ?>" method="post">
                                        <?= csrf_field() ?>
                                        <button data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm" type="sumbit"><i class="fa fa-trash"></i></button>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" class="btn btn-primary btn-sm" href="/phoneadmin/<?= $key->phone_id ?>/edit"><i class="fa fa-edit"></i></a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>



                </table>
            </div>

        </div>


    </div>

    <?= $this->endSection() ?>