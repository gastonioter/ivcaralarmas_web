// ***********************
// POGO DEVICE_STATUS EN 0
// ***********************

var mysql = require('mysql');

//CREDENCIALES MYSQL
var con = mysql.createConnection({
    host: "ivcaralarmas.com",
    user: "admin_appivcar",
    password: "Gaston2001",
    database: "admin_appivcar"
  });

  con.connect(function(err){
    if (err) throw err;

    //una vez conectados, podemos hacer consultas.
    console.log("Conexión a MYSQL exitosa!!!")

    //hacemos la consulta
    var query = "UPDATE devices SET `device_status`= '0' WHERE 1";
    con.query(query, function (err, result, fields) {
      if (err) throw err;
      console.log("LOS PUSE EN 0")

      fin

    });
  });
