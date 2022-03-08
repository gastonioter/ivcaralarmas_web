
<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
<script type="text/javascript">

// connect options
const options = {
  connectTimeout: 4000,

  // Authentication
  clientId: 'web_client' + Math.round(Math.random() * (0- 10000) * -1),
  username: 'web_client',
  password: '0000',

  keepalive: 60,
  clean: true,
}

// WebSocket connect url
const WebSocket_URL = 'wss://ivcaralarmas.com:8094/mqtt'

const client = mqtt.connect(WebSocket_URL, options)

// CONSTANTES
const actt = new Audio('<?=base_url()?>/public/sound/activada.mp3');
const desactt = new Audio('<?=base_url()?>/public/sound/desactivada.mp3');
const sirenass = new Audio('<?=base_url()?>/public/sound/alarm.mp3');

// para las graficas en realtime
<?php foreach($devices as $key):?>

    <?php if($key->category_name == 'alarma') : ?>
    var estado_alarma_<?=$key->device_serie?> = 0;
    var mov_<?=$key->device_serie?> = 0;
    <?php endif ?>

    <?php if($key->category_name == 'domotica') : ?>
    var estado_alarmadom_<?=$key->device_serie?> = 0;
    var luz_<?=$key->device_serie?> = 0;
    var bomba_<?=$key->device_serie?> = 0;
    var riego_<?=$key->device_serie?> = 0;
    <?php endif ?>

    // para las banderas
    var flag_act_<?=$key->device_serie?> = 0;
    var flag_desact_<?=$key->device_serie?> = 0;
    var flag_robo_<?=$key->device_serie?>;
    var flag_res_<?=$key->device_serie?>;

    <?php endforeach ?>

client.on('connect', () => {
  console.log('Mqtt conectado por WS! Exito!')

  <?php foreach($devices as $key):?>
    client.subscribe('alarma/values/<?= $key->device_serie?>', { qos: 0 }, (error) => {})
    //console.log(<?= $key->device_serie?>)
    <?php endforeach ?>
})


client.on('reconnect', (error) => {
  console.log('Error al reconectar', error)
  connected = false
})

client.on('error', (error) => {
  console.log('Error de conexión:', error)
  connected = false
})
</script>
