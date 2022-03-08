<?= $this->extend('admin/templates/layout') ?>
<?= $this->section('content') ?>

<?php $sinModulos = 0; ?>
<?php foreach ($allusers as $key) : ?>
  <?php if (!$deviceModel->getCountAdmin($key->user_id) > 0) : ?>

    <?php $sinModulos = $sinModulos + 1; ?>

  <?php endif ?>
<?php endforeach ?>

<?php if ($sinModulos - 1 > 0) : ?>
  <div class="mt-3 ml-4 text-danger"><u><strong>Hay <?= $sinModulos - 1 ?> usuarios que no tienen dispositivos asociados</div></u></strong>
<?php endif ?>
<?php if ($sinModulos - 1 == 0) : ?>
  <div class="mt-3 ml-4 text-success"><u><strong>Todo OK!</div></u></strong>
<?php endif ?>

<div class="col-12 col-md-12">
  <div class="padding">
    <div class="box">
      <div class="box-header">
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
              <th class="footable-visible footable-sortable">Nombre</th>
              <th class="footable-visible footable-sortable">Email</th>
              <th class="footable-visible footable-sortable"><i class="fas fa-cogs"></i></th>

            </tr>
          </thead>
          <tbody>


            <?php foreach ($users as $key) : ?>

              <tr class="footable-odd" style="display: table-row;">
                <td class="footable-visible footable-first-column"><span class="footable-toggle"><?= $key->user_id ?></span></td>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->user_name ?></td>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $key->user_email ?></td>
                <td>
                  <?php if (!$deviceModel->getCountAdmin($key->user_id) > 0) : ?>
                    <?php $sinModulos = $sinModulos + 1; ?>
                    <form action="useradmin/delete/<?= $key->user_id ?>" method="post">
                      <?= csrf_field() ?>
                      <button data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="btn btn-danger btn-sm" type="sumbit"><i class="fa fa-trash"></i></button>
                    </form>
                  <?php endif ?>

                  <?php if ($deviceModel->getCountAdmin($key->user_id) > 0) : ?>
                    <button data-bs-toggle="tooltip" data-bs-placement="top" title="Tiene módulos" class="btn btn-danger btn-sm" disabled type="sumbit"><i class="fa fa-trash"></i></button>
                  <?php endif ?>

                  <a data-bs-toggle="tooltip" data-bs-placement="top" title="Llamar" class="btn btn-primary btn-sm" href="useradmin/phones/<?= $key->user_id ?>"><i class="fa fa-phone"></i></a>


                </td>


              </tr>
            <?php endforeach ?>

          </tbody>

          <tfoot class="hide-if-no-paging">
            <span class="text-muted mx-2 text-sm">En total hay <?= $countUsers ?> usuarios registrados</span>

            <tr>
              <td colspan="3" class="">
                <?= $pager->links() ?>
              </td>
            </tr>

          </tfoot>

        </table>
      </div>

    </div>


  </div>
  <div id="m-smm" class="modal fade black-overlay" data-backdrop="true">
    <div class="row-col h-v">
      <div class="row-cell v-m">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-exclamation-circle"></i> Atención!</h5>
            </div>
            <div class="modal-body text-center p-lg">
              <p>No puedes borrar el usuario porque tiene módulos registrados a su cuenta.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endSection() ?>