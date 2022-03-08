<div class="dker p-x">
  <div class="row">
    <div class="col-sm-6 push-sm-6">
      <div class="p-y text-center text-sm-right">
        <a href="<?=base_url()?>/device" class="inline p-x text-center">
          <span class="h4 block m-0"><?= $devicesCount ?></span>
          <small class="text-xs text-muted">Dispositivos</small>
        </a>
        <a href="<?=base_url()?>/device" class="inline p-x b-l b-r text-center">
          <span class="h4 block m-0"><?= $devicesConnected ?></span>
          <small class="text-xs text-muted">Conectados</small>
        </a>
      </div>
    </div>


<div class="col-sm-6 pull-sm-6">
    <div class="p-y-md clearfix nav-active-blue">
        <ul class="nav nav-pills nav-sm">
        <?php $flag2=0; ?>
          <?php foreach($devices as $key) : ?>
          <?php if($flag2==0){ ?>
            <li class="nav-item">
            <a class="nav-link mx active" href="<?=base_url()?>/charts/<?=$key->device_serie?>"><?= $key->device_alias ?></a>
          </li>
          <?php $flag2=1;} else{ ?>
            <li class="nav-item">
            <a class="nav-link mx" href="<?=base_url()?>/charts/<?=$key->device_serie?>"><?= $key->device_alias ?></a>
        </li>
          <?php } ?>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
  </div>
</div>