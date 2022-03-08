<script>




    client.on('message', (topic, message) => {
        process_msj(topic, message)
})


function process_msj(topic, message){

    var sp_topic = topic.split("/");
    var query = sp_topic[1];
    var serie = sp_topic[2];

    if (query == "values"){
        <?php foreach($devices as $key) : ?>
            if (serie == <?=$key->device_serie?>) {
            console.log('llego mensaje de:  <?= $key->device_alias?>')

            var msg = message.toString();
            var sp_msj = msg.split(",");

            var estado_alarma = sp_msj[0];
            var luz = sp_msj[1];
            var bomba = sp_msj[2];
            var riego = sp_msj[3];

            update_values_<?=$key->device_id?>(estado_alarma,luz,bomba,riego);

            }
        <?php endforeach ?>
    }
}


<?php foreach($devices as $key) : ?>

    function update_values_<?=$key->device_id?>(estado_alarma,luz,bomba,riego){
        
        var commando_alarma = "";
        if (estado_alarma == 1){
            estado_alarma = 'ACTIVADA';
            commando_alarma = 'Desactivar';
            $("#img_comando_alarmadom_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/activada.png");
            
        }else if (estado_alarma == 0){
            estado_alarma = 'DESACTIVADA'
            commando_alarma = 'Activar';
            $("#img_comando_alarmadom_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/desactivad.png");
            }else if (estado_alarma == 2){
            estado_alarma = 'ACTIVADA PARCIAL';
            commando_alarma = 'Desactivar';
            $("#estado_alarmadom_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/act_parcial.png");
            $("#img_btn_comand_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/desactivar.png");
            $("#img_estado_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/act_parciall.png");
        }


        if (luz == 1){  
            boton_luz.value = 'Apagar';
            boton_luz.className = 'btn danger'
            luz = 'ENCENDIDA';
            $("#img_luz_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/luz_on.png");
        }else{
            boton_luz.value = 'Encender';
            boton_luz.className = 'btn success'
            $("#img_luz_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/luz_off.png");
            luz = 'APAGADA'
        }


        if (bomba == 1){
            boton_bomba.value = 'Apagar';
            boton_bomba.className = 'btn danger'
            bomba = 'ENCENDIDA';
            $("#img_bomba_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/bomba_on.png");
        }else{
            boton_bomba.value = 'Encender';
            boton_bomba.className = 'btn success'
            bomba = 'APAGADA'}
            $("#img_bomba_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/bomba_off.png");


        if (riego == 1){
            boton_riego.value = 'Apagar';
            boton_riego.className = 'btn danger'
            riego = 'ENCENDIDO';
            $("#img_riego_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/canilla_on.png");
        }else{
            boton_riego.value = 'Encender';
            boton_riego.className = 'btn success'
            riego = 'APAGADO'}
            $("#img_riego_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/canilla_off.png");



        $("#estado_alarmadom_<?=$key->device_id?>").html(estado_alarma);
        $("#txt_luz_<?=$key->device_id?>").html(luz);
        $("#txt_bomba_<?=$key->device_id?>").html(bomba);
        $("#txt_riego_<?=$key->device_id?>").html(riego);
        $("#txt_act_desact_alarma<?=$key->device_id?>").html(commando_alarma);
    }

    // ALARMA

    function act_desact_alarmadom_<?=$key->device_id?>(){
        var accion = document.getElementById('txt_act_desact_alarma<?=$key->device_id?>');
        if (accion.innerHTML == 'Activar'){
            activar_alarmadom_<?=$key->device_id?>();
        }else{
            desactivar_alarmadom_<?=$key->device_id?>();
        }
    }

    function activar_alarmadom_<?=$key->device_id?>(){
        client.publish('alarma/command/<?= $key->device_serie?>', 'activar', (error) => {
          console.log(error || 'Mensaje enviado activacion!!! -> <?=$key->device_id?>')
        })
        actt.play();

    }

    function desactivar_alarmadom_<?=$key->device_id?>(){

        client.publish('alarma/command/<?= $key->device_serie?>', 'desactivar', (error) => {
          console.log(error || 'Mensaje enviado desactivacion!!! -> <?=$key->device_id?>')
        })
        desactt.play();
        
    }


    // BOTON LUZ

    function act_desact_luz_<?=$key->device_id?>(){
        if (boton_luz.value == 'Encender'){
            activar_luz_<?=$key->device_id?>();
        }else{
            desactivar_luz_<?=$key->device_id?>();
        }
    }

    function activar_luz_<?=$key->device_id?>(){
        client.publish('domotica/luz/command/<?= $key->device_serie?>', 'activar', (error) => {
          console.log(error || 'Mensaje enviado activacion luz!!! -> <?=$key->device_id?>')
        })
        actt.play();

    }

    function desactivar_luz_<?=$key->device_id?>(){

        client.publish('domotica/luz/command/<?= $key->device_serie?>', 'desactivar', (error) => {
          console.log(error || 'Mensaje enviado desactivacion luz!!! -> <?=$key->device_id?>')
        })
        desactt.play();
        
    }


        // BOTON BOMBA

        function act_desact_bomba_<?=$key->device_id?>(){
        if (boton_bomba.value == 'Encender'){
            activar_bomba_<?=$key->device_id?>();
        }else{
            desactivar_bomba_<?=$key->device_id?>();
        }
    }

    function activar_bomba_<?=$key->device_id?>(){
        client.publish('domotica/bomba/command/<?= $key->device_serie?>', 'activar', (error) => {
          console.log(error || 'Mensaje enviado activacion bomba!!! -> <?=$key->device_id?>')
        })
        actt.play();

    }

    function desactivar_bomba_<?=$key->device_id?>(){

        client.publish('domotica/bomba/command/<?= $key->device_serie?>', 'desactivar', (error) => {
          console.log(error || 'Mensaje enviado desactivacion bomba!!! -> <?=$key->device_id?>')
        })
        desactt.play();
        
    }


        // BOTON LUZ

        function act_desact_riego_<?=$key->device_id?>(){
        if (boton_riego.value == 'Encender'){
            activar_riego_<?=$key->device_id?>();
        }else{
            desactivar_riego_<?=$key->device_id?>();
        }
    }

    function activar_riego_<?=$key->device_id?>(){
        client.publish('domotica/riego/command/<?= $key->device_serie?>', 'activar', (error) => {
          console.log(error || 'Mensaje enviado activacion riego!!! -> <?=$key->device_id?>')
        })
        actt.play();

    }

    function desactivar_riego_<?=$key->device_id?>(){

        client.publish('domotica/riego/command/<?= $key->device_serie?>', 'desactivar', (error) => {
          console.log(error || 'Mensaje enviado desactivacion riego!!! -> <?=$key->device_id?>')
        })
        desactt.play();
        
    }

    


    

<?php endforeach ?>


</script>