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

// para chequear de publicar estando conectado
var connected = false;

// WebSocket connect url
const WebSocket_URL = 'wss://ivcaralarmas.com:8094/mqtt'

const client = mqtt.connect(WebSocket_URL, options)

// CONSTANTES
const actt = new Audio('<?=base_url()?>/public/sound/activada.mp3');
const desactt = new Audio('<?=base_url()?>/public/sound/desactivada.mp3');
const sirenass = new Audio('<?=base_url()?>/public/sound/alarm.mp3');