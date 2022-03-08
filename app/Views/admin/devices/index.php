<?= $this->extend('admin/templates/layout') ?>
<?= $this->section('content') ?>
<?php echo view('admin/devices/_head.php', ['devices' => $devices]) ?>

<div class="padding">
  <div class="row">

    <?php
    if ($devicesCount - $devicesConnected > 0) : ?>
      <div class="mt-3 ml-4 text-danger"><u><strong>Hay <?= $devicesCount - $devicesConnected ?> módulos DESCONECTADOS!</div></u></strong>
    <?php endif ?>
    <?php if ($devicesCount - $devicesConnected == 0) : ?>
      <div class="mt-3 ml-4 text-success"><u><strong>Todos los módulos están CONECTADOS!</div></u></strong>
    <?php endif ?>
    <div class="col-sm-12 col-lg-12">
      <div class="tab-content">

        <div class="tab-pane p-v-sm active" id="tab_1">
          <div class="box">
            <div class="box-header">
              <div class="row mt-2">
                <div class="col-12 col-6-md">
                  <?= view('users/devices/_session') ?>
                </div>
              </div>
            </div>
            <div>
              <table class="table m-b-none footable-loaded footable tablet breakpoint table-responsive" ui-jp="footable" data-filter="#filter" data-page-size="5">
                <?php if ($devicesCount > 0) : ?>

                  <thead>
                    <tr>
                      <th class="footable-visible footable-sortable">Usuario</th>
                      <th class="footable-visible footable-sortable">Serie</th>
                      <th class="footable-visible footable-sortable">Alias</th>
                      <th class="footable-visible footable-sortable"><i class="fas fa-plug"></i></th>
                      <th class="footable-visible footable-sortable"><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php endif ?>

                  <?php foreach ($devices as $key) : ?>

                    <tr class="footable-odd" style="display: table-row;">
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"><?= $key->user_name ?></span></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->device_serie ?></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->device_alias ?></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span> <?php if ($key->device_status == 0) {
                                                                                                                  echo "<div style='color:red'><i class='fa fa-times'></div>";
                                                                                                                } else if ($key->device_status == 1) {
                                                                                                                  echo "<div style='color:lime'><i class='fa fa-check-circle'></div>";
                                                                                                                } ?></td>
                      <td>
                        <form action="device/delete/<?= $key->device_id ?>" method="post">
                          <?= csrf_field() ?>
                          <button data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm" type="sumbit"><i class="fa fa-trash"></i></button>
                          <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" class="btn btn-primary btn-sm" href="deviceadmin/<?= $key->device_id ?>/edit"><i class="fa fa-edit"></i></a>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>

                  </tbody>
                  <?php if ($devicesCount > 0) : ?>
                    <tfoot class="hide-if-no-paging">


                      <tr>
                        <td colspan="3" class="">
                          <?= $pager->links() ?>
                        </td>
                      </tr>

                    </tfoot>
                  <?php endif ?>
              </table>
            </div>
          </div>
        </div>



        <div class="tab-pane p-v-sm" id="tab_2">
          <div class="box">
            <div class="box-header">
              <div class="row mt-2">
                <div class="col-12 col-6-md">
                  <?= view('users/devices/_session') ?>
                </div>
              </div>
            </div>
            <div>
              <table class="table m-b-none footable-loaded footable tablet breakpoint table-responsive" ui-jp="footable" data-filter="#filter" data-page-size="5">
                <?php if ($devicesCount > 0) : ?>

                  <thead>
                    <tr>
                      <th class="footable-visible footable-sortable">Usuario</th>
                      <th class="footable-visible footable-sortable">Serie</th>
                      <th class="footable-visible footable-sortable">Alias</th>
                      <th class="footable-visible footable-sortable"><i class="fas fa-plug"></i></th>
                      <th class="footable-visible footable-sortable"><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php endif ?>

                  <?php foreach ($devicesConn as $key) : ?>

                    <tr class="footable-odd" style="display: table-row;">
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"><?= $key->user_name ?></span></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->device_serie ?></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->device_alias ?></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span> <?php if ($key->device_status == 0) {
                                                                                                                  echo "<div style='color:red'><i class='fa fa-times'></div>";
                                                                                                                } else if ($key->device_status == 1) {
                                                                                                                  echo "<div style='color:lime'><i class='fa fa-check-circle'></div>";
                                                                                                                } ?></td>
                      <td>
                        <form action="device/delete/<?= $key->device_id ?>" method="post">
                          <?= csrf_field() ?>
                          <button data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm" type="sumbit"><i class="fa fa-trash"></i></button>
                          <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" class="btn btn-primary btn-sm" href="deviceadmin/<?= $key->device_id ?>/edit"><i class="fa fa-edit"></i></a>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>

                  </tbody>

              </table>
            </div>
          </div>
        </div>

        <div class="tab-pane p-v-sm" id="tab_3">
          <div class="box">
            <div class="box-header">
              <div class="row mt-2">
                <div class="col-12 col-6-md">
                  <?= view('users/devices/_session') ?>
                </div>
              </div>
            </div>
            <div>
              <table class="table m-b-none footable-loaded footable tablet breakpoint table-responsive" ui-jp="footable" data-filter="#filter" data-page-size="5">
                <?php if ($devicesCount > 0) : ?>

                  <thead>
                    <tr>
                      <th class="footable-visible footable-sortable">Usuario</th>
                      <th class="footable-visible footable-sortable">Serie</th>
                      <th class="footable-visible footable-sortable">Alias</th>
                      <th class="footable-visible footable-sortable"><i class="fas fa-plug"></i></th>
                      <th class="footable-visible footable-sortable"><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php endif ?>

                  <?php foreach ($devicesDesconn as $key) : ?>

                    <tr class="footable-odd" style="display: table-row;">
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"><?= $key->user_name ?></span></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->device_serie ?></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->device_alias ?></td>
                      <td class="footable-visible footable-first-column"><span class="footable-toggle"></span> <?php if ($key->device_status == 0) {
                                                                                                                  echo "<div style='color:red'><i class='fa fa-times'></div>";
                                                                                                                } else if ($key->device_status == 1) {
                                                                                                                  echo "<div style='color:lime'><i class='fa fa-check-circle'></div>";
                                                                                                                } ?></td>
                      <td>
                        <form action="device/delete/<?= $key->device_id ?>" method="post">
                          <?= csrf_field() ?>
                          <button data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm" type="sumbit"><i class="fa fa-trash"></i></button>
                          <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" class="btn btn-primary btn-sm" href="deviceadmin/<?= $key->device_id ?>/edit"><i class="fa fa-edit"></i></a>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>

                  </tbody>

              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?= $this->endSection() ?>