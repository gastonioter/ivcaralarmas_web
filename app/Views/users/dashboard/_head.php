<div class="dker p-x">
  <div class="row">
    <div class="col-sm-6 push-sm-6">
      <div class="p-y text-center ">
        
        
      </div>
    </div>


<div class="col-sm-6 pull-sm-6">
    <div class="p-y-md clearfix nav-active-blue">
        <ul class="nav nav-pills nav-sm">
        <?php $flag2=0; ?>
          <?php foreach($devices as $key) : ?>
          <?php if($flag2==0){ ?>
            <li class="nav-item">
            <a class="nav-link mx active" href data-toggle="tab" data-target="#tab_<?=$key->device_id?>"><?= $key->device_alias ?></a>
          </li>
          <?php $flag2=1;} else{ ?>
            <li class="nav-item">
            <a class="nav-link mx" href data-toggle="tab" data-target="#tab_<?=$key->device_id?>"><?= $key->device_alias ?></a>
          </li>
          <?php } ?>
          <?php endforeach ?>
        </ul>

       

      </div>
    </div>
  </div>
</div>

