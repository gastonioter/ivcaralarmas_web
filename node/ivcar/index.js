// **************************************************************
// **************************	NODE JS *************************
// **************************************************************
// 1) UPDATE para los vivos del dispositivo cada vez que llega un mensaje con else {
//	topico de values
// 2) INSERTA data para el hitorial de actdesact (tanto de la app como
// del control) y el de disparos
// 3) CONSULTO telefonos, nombre de usuario, alias, cuando llega un mensaje con el
// topico de sms y pubica bajo el topico "sms/evento" ppara que lo reciba la central.

// Las publicaciones que llegan con el topico "alarma/sms/device" me dicen que en esa alarma
// hubo un cambio de estado, en el mensaje consulto qué cambió.

// Despues publico con el topico "sms/eveto" -> count,alias,name,phones que donde
// está subscripto la central de monitoreo para que ella finalmente envie el SMS
// **************************************************************
// **************************************************************

var mysql = require('mysql');
var mqtt = require('mqtt');

//CREDENCIALES MYSQL
var con = mysql.createConnection({
	host: "ivcaralarmas.com",
	user: "admin_appivcar",
	password: "Gaston2001",
	database: "admin_appivcar"
});


//CREDENCIALES MQTT
var options = {
	port: 1883,
	host: 'ivcaralarmas.com',
	clientId: 'nodejs_server' + Math.round(Math.random() * (0- 10000) * -1) ,
	username: 'nodejs_server',
	password: '0000',
	keepalive: 60,
	reconnectPeriod: 1000,
	protocolId: 'MQIsdp',
	protocolVersion: 3,
	clean: true,
	encoding: 'utf8'
  };

  var client = mqtt.connect("mqtt://ivcaralarmas.com", options);

  // ************************
  //      CONEXION MQTT
  // ************************
  client.on('connect', function () {
  client.subscribe('alarma/#', function (err) {
		});
  })

  // ************************
  //      CONEXION MYSQL
  // ************************
con.connect(function(err){

	if (err) throw err;
	console.log('Conexion a MYSQL exitosa');

});


client.on('message', function (topic, message) {
	var topic_splitted = topic.split("/");
	var query = topic_splitted[1];
	var device_serie = topic_splitted[2];

	// ************************************************
  //      							VALUES TOPIC
  // ************************************************

	if (query == "values"){
		
		var msg = message.toString();
    	var sp = msg.split(",");
		var sirena = sp[1];
		var estado = sp[0];

		var query = "UPDATE devices SET device_status = '1' WHERE device_serie = " + device_serie + "";
		con.query(query, function (err, result, fields) {
		if (err) throw err;
		});

		console.log(device_serie);

	}

	// ************************************************
	//      					COMMAND TOPIC
	// ************************************************
	// activacion por application web

	else if (query == "command"){
		var msg = message.toString();

		if (msg == "activar"){
		// recibo un evento disparado por control remoto
		var query = "INSERT INTO actdesacts (`actdesact_value`, `actdesact_device_serie`) VALUES (1, " + device_serie + ");";
		con.query(query, function (err, result, fields) {
		if (err) throw err;
		});

		}
		else{
			var query = "INSERT INTO actdesacts (`actdesact_value`, `actdesact_device_serie`) VALUES (0, " + device_serie + ");";
			con.query(query, function (err, result, fields) {
			if (err) throw err;
			});
		}

	}

	// ************************************************
	//      					COMMAND_DEVICE TOPIC
	// ************************************************
	// activacion por control remoto

	else if (query == "command_device"){
		var msg = message.toString();

		if (msg == "activar"){
		// recibo un evento disparado por control remoto
		var query = "INSERT INTO actdesacts (`actdesact_value`, `actdesact_device_serie`) VALUES (1, " + device_serie + ");";
		con.query(query, function (err, result, fields) {
		if (err) throw err;
		});

		}
		else if (msg == "desactivar"){
			var query = "INSERT INTO actdesacts (`actdesact_value`, `actdesact_device_serie`) VALUES (0, " + device_serie + ");";
			con.query(query, function (err, result, fields) {
			if (err) throw err;
			});
		}
		else if (msg == "robo"){
			var query = "INSERT INTO disparos (`disparos_value`, `disparos_device_serie`) VALUES (1, " + device_serie + ");";
			con.query(query, function (err, result, fields) {
			if (err) throw err;
			});

		}
		else if (msg == "res"){
			var query = "INSERT INTO disparos (`disparos_value`, `disparos_device_serie`) VALUES (0, " + device_serie + ");";
			con.query(query, function (err, result, fields) {
			if (err) throw err;
			});

		}

	}

	// ************************************************
	//      					SMS TOPIC
	// ************************************************
	// recibo cambio de estado de la alarma (act_desact - sirena)
	else if (query == "sms"){

		var msg = message.toString();
		// consulto:
		// ALIAS de esa serie
		// TELEFONO/S del usuario
		// NOMBRE de usuario
		var phones = [];

		// PARA TODOS LOS EVENTOS

		var query = "SELECT device_alias FROM devices WHERE device_serie = " + device_serie + "";
		con.query(query, function (err, result, fields) {
		if (err) throw err;
		alias = result[0].device_alias;

		var query = "SELECT device_user_id FROM devices WHERE device_serie = " + device_serie + "";
		con.query(query, function (err, result, fields) {
		if (err) throw err;
		user_id = result[0].device_user_id;

		var query = "SELECT phone_number FROM phones WHERE phone_user_id = " + user_id + "";
		con.query(query, function (err, result, fields) {
		if (err) throw err;

		for (var i = 0; i < result.length; i++) {
			phones.push(result[i].phone_number);
		}

		// un modulo me está diciendo que hubo una activacion/desactivacion

		if (msg == "activar" || msg == "desactivar"){

			name = ""
			msj_to_send = phones.length + "," +  name + "," + alias + "," + phones;

			if (msg == "activar"){

				client.publish("sms/act", msj_to_send);
				console.log(msj_to_send);
			}
			else if (msg == "desactivar"){
				client.publish("sms/desact", msj_to_send);
				console.log(msj_to_send);
			}

		}

		// PARA ROBO O RES

		else if (msg == "robo" || msg == "res"){

			var query = "SELECT user_name FROM users WHERE user_id = " + user_id + "";
			con.query(query, function (err, result, fields) {
			if (err) throw err;
			name = result[0].user_name;
			msj_to_send = phones.length + "," +  name + "," + alias + "," + phones;

			if (msg == "robo"){

				client.publish("sms/robo", msj_to_send);
				console.log(msj_to_send)

			}
			else if (msg == "res"){

				client.publish("sms/res", msj_to_send);
				console.log(msj_to_send)

			}
			});

		}

	});
	});
	});

}


});



// MANTENER SESION ABIERTA
setInterval(function () {
	var query ='SELECT 1 + 1 as result';
	con.query(query, function (err, result, fields) {
	  if (err) throw err;
	});

}, 5000);
