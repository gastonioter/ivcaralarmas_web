<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>

<div class="p-a white lt box-shadow">
	<div class="row">
		<div class="col-sm-8">
			<h4 class="mb-0 _900">Gráficos en tiempo real</h4>
			<small class="">Haga <strong>click</strong> en el dispositivo que desee para observar sus datos históricos</small>
		</div>
	</div>
</div>

<div class="padding">
    <ul>
        <?php foreach($devices as $key) :?>
            <li class="m-0 p-0 nav-item"><a href="<?=base_url()?>/charts/realtime/<?=$key->device_serie?>" class="btn btn-primary mt-2"><?=$key->device_alias?></a></li>
            <?php endforeach ?>
    </ul> 
</div>

<?php //aca hago la conexion y subscripcion a los topicos ?>
<?= view('users/dashboard/mqtt/main',['devices' => $devices]) ?>
<?php // ahora tengo que las funciones cada vez que llegue un mensaje ?>
<?= view('users/dashboard/mqtt/index',['devices' => $devices]) ?>
<?= $this->endSection() ?>