<div class="row">
            <div class="col-xs-6 col-sm-12">
              <div class="box p-a" align="center">
                <div class="clear">
                  <h4 class="m-0 text-lg _300"><input id="img_comando_alarma_<?= $device_id ?>" onclick="act_desact_<?= $device_id ?>()" width="100" height="100" type="image" name="image" src="<?=base_url()?>/public/img/dashboard/loading.png"><br><small><?= strtoupper($device_alias) ?>: </small><strong><b id="estado_alarma_<?= $device_id ?>" class="text-bg">--</b></strong></h4>
                  <small class="text-muted">Presione el candado para <b id="txt_act_desact_<?= $device_id ?>">--</b></small>
                </div>
              </div>
            </div>
          </div>

          <!-- SWItCH1 y 2 -->
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="box p-a" align="center">
                <div class="pull-left m-r">

                </div>
                <div class="clear">
                  <h4 class="m-0 text-lg _300"><img id="img_sirena_alarma_<?= $device_id ?>" width="150" height="100" src="<?=base_url()?>/public/img/dashboard/loading.png"><span class="text-sm"></span></h4>
                  <small class="text-muted">Sirenas: <b id="txt_sirenas_<?= $device_id ?>">...</b></small>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-4">
              <div class="box p-a" align="center">

                <div class="clear">
                  <h4 class="m-0 text-lg _300"><img id="img_mov_alarma_<?= $device_id ?>" width="150" height="100" src="<?=base_url()?>/public/img/dashboard/loading.png"><span class="text-sm"> </span></h4>
                  <small class="text-muted">Movimiento: <b id="txt_mov_<?= $device_id ?>">...</b></small>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-4">
              <div class="box p-a" align="center">

                <div class="clear">
                  <h4 class="m-0 text-lg _300"><img id="img_abertura_alarma_<?= $device_id ?>" width="150" height="100" src="<?=base_url()?>/public/img/dashboard/loading.png"><span class="text-sm"> </span></h4>
                  <small class="text-muted">Aberturas: <b id="txt_abertura_<?= $device_id ?>">...</b></small>
                </div>
              </div>
            </div>
          </div>





