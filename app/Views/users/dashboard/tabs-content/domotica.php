
<div class="row">
  <div class="col-xs-6 col-sm-12">
    <div class="box p-a" align="center">
      <div class="clear">
        <h4 class="m-0 text-lg _300"><input id="img_comando_alarmadom_<?= $device_id ?>" onclick="act_desact_alarmadom_<?= $device_id ?>()" width="100" height="100" type="image" name="image" src="<?=base_url()?>/public/img/dashboard/loading.png"><br><small>MI ALARMA: </small><strong><b id="estado_alarmadom_<?= $device_id ?>" class="text-bg">--</b></strong></h4>
        <small class="text-muted">Presione el candado para <b id="txt_act_desact_alarmadom_<?= $device_id ?>">--</b></small>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-sm-4">
    <div class="box">
      <div class="box-header text-center">
      <h2>LUZ <b id="txt_luz_<?= $device_id ?>">--</b></h2>
      </div>
          <div class="box-body text-center">
            <h4 class="m-0 text-lg _300"><img id="img_luz_<?= $device_id ?>" width="140" height="120" src="<?=base_url()?>/public/img/dashboard/loading.png"><span class="text-sm"></span></h4>
          </div>
          <div class="box-footer text-center">
          <input onclick="act_desact_luz_<?= $device_id ?>()" type="button" class="btn " value="--" id="btn_luz_<?= $device_id ?>" />  
        </div>
      </div>
  </div>



  <div class="col-sm-4">
    <div class="box">
      <div class="box-header text-center">
      <h2>BOMBA <b id="txt_bomba_<?= $device_id ?>">--</b></h2>
      </div>
          <div class="box-body text-center">
            <h4 class="m-0 text-lg _300"><img id="img_bomba_<?= $device_id ?>" width="140" height="120" src="<?=base_url()?>/public/img/dashboard/loading.png"><span class="text-sm"></span></h4>
          </div>
          <div class="box-footer text-center">
          <input onclick="act_desact_bomba_<?= $device_id ?>()" type="button" class="btn " value="--" id="btn_bomba_<?= $device_id ?>" />    
        </div>
      </div>
  </div>


  <div class="col-sm-4">
    <div class="box">
      <div class="box-header text-center">
          <h2>RIEGO <b id="txt_riego_<?= $device_id ?>">--</b></h2>
      </div>
          <div class="box-body text-center">
            <h4 class="m-0 text-lg _300"><img id="img_riego_<?= $device_id ?>" width="140" height="120" src="<?=base_url()?>/public/img/dashboard/loading.png"><span class="text-sm"></span></h4>
          </div>
          <div class="box-footer text-center">
          <input onclick="act_desact_riego_<?= $device_id ?>()" type="button" class="btn " value="--" id="btn_riego_<?= $device_id ?>" />  
        </div>
      </div>
  </div>
</div>



