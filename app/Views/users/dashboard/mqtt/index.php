
<script>
    client.on('message', (topic, message) => {
        process_msj_alarma(topic, message)
})


function process_msj_alarma(topic, message){

    var sp_topic = topic.split("/");
    var query = sp_topic[1];
    var serie = sp_topic[2];

    if (query == "values"){
        <?php foreach($devices as $key) : ?>
            if (serie == <?=$key->device_serie?>) {


            var msg = message.toString();
            var sp_msj = msg.split(",");

            var dato1 = sp_msj[0]; // estadoalarma
            var dato2 = sp_msj[1]; // sirena
            var dato3 = sp_msj[2]; // mov
            var dato4 = sp_msj[3]; // abertura



            <?php if ($key->category_name == "alarma") : ?>

            estado_alarma_<?=$key->device_serie?> = parseInt(dato1 , 10);
            mov_<?=$key->device_serie?> = parseInt(dato3 , 10);

            update_values_alarma_<?=$key->device_id?>(dato1,dato2,dato3,dato4);
            <?php endif ?>

            <?php if ($key->category_name == "domotica") : ?>

            estado_alarmadom_<?=$key->device_serie?> = parseInt(dato1 , 10);
            luz_<?=$key->device_serie?> = parseInt(dato2 , 10);
            bomba_<?=$key->device_serie?> = parseInt(dato3 , 10);
            riego_<?=$key->device_serie?> = parseInt(dato4 , 10);

            update_values_domotica_<?=$key->device_id?>(dato1,dato2,dato3,dato4);
            <?php endif ?>
        }
        <?php endforeach ?>
    }
}


<?php foreach($devices as $key) : ?>

    <?php if ($key->category_name == "alarma") : ?>

    function update_values_alarma_<?=$key->device_id?>(estado,sirena,mov,abertura){

        var command = "";
        if (estado == 1){
            estado = 'ACTIVADA';
            command = 'Desactivar';
            $("#img_comando_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/activada.png");
            $("#img_btn_comand_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/desactivar.png");
            $("#img_estado_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/activada.png");
        }else if (estado == 0){
            estado = 'DESACTIVADA'
            command = 'Activar';
            $("#img_comando_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/desactivad.png");
            $("#img_btn_comand_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/activar.png");
            $("#img_estado_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/desactivad.png");
        }else if (estado == 2){
            estado = 'ACTIVADA PARCIAL';
            command = 'Desactivar';
            $("#estado_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/act_parcial.png");
            $("#img_btn_comand_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/desactivar.png");
            $("#img_estado_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/act_parciall.png");
        }


        if (sirena == 1){
            sirenass.play();
            sirena = 'disparadas';
            $("#img_sirena_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/sirena_disparada.png");
        }else{
            sirenass.pause();
            $("#img_sirena_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/sirena_no_disparada.png");
            sirena = 'no disparadas'}


        if (mov == 1){
            $("#img_mov_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/mov_run.png");
            mov = 'con movimiento';
        }else{
            $("#img_mov_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/mov_stop.png");
            mov = 'sin movimiento'}


        if (abertura == 1){
            $("#img_abertura_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/puerta_abierta.png");
            abertura = 'abiertas';
        }else{
            $("#img_abertura_alarma_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/puerta_cerrada.png");
            abertura = 'cerradas'}



        $("#estado_alarma_<?=$key->device_id?>").html(estado);
        $("#txt_sirenas_<?=$key->device_id?>").html(sirena);
        $("#txt_mov_<?=$key->device_id?>").html(mov);
        $("#txt_abertura_<?=$key->device_id?>").html(abertura);
        $("#txt_act_desact_<?=$key->device_id?>").html(command);
    }


    function act_desact_<?=$key->device_id?>(){
        var estado = document.getElementById('txt_act_desact_<?=$key->device_id?>');
        if (estado.innerHTML == 'Activar'){
            activar<?=$key->device_id?>();
        }else{
            desactivar<?=$key->device_id?>();
        }
    }

    function activar<?=$key->device_id?>(){
        client.publish('alarma/command/<?= $key->device_serie?>', 'activar', (error) => {
          console.log(error || 'Mensaje enviado activacion!!! -> <?=$key->device_id?>')
        })

        actt.play();

    }

    function desactivar<?=$key->device_id?>(){

        client.publish('alarma/command/<?= $key->device_serie?>', 'desactivar', (error) => {
          console.log(error || 'Mensaje enviado desactivacion!!! -> <?=$key->device_id?>')
        })
        desactt.play();

    }

    <?php endif ?>

    <?php if ($key->category_name == "domotica") : ?>



        function update_values_domotica_<?=$key->device_id?>(estado_alarma,luz,bomba,riego){

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
            $("#btn_luz_<?=$key->device_id?>").attr("class", "btn danger")
            $("#btn_luz_<?=$key->device_id?>").attr("value", "Apagar")
            luz = 'ENCENDIDA';
            $("#img_luz_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/luz_onn.png");
        }else{
            $("#btn_luz_<?=$key->device_id?>").attr("value", "Encender")
            $("#btn_luz_<?=$key->device_id?>").attr("class", "btn success")
            $("#img_luz_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/luz_off.png");
            luz = 'APAGADA'
        }


        if (bomba == 1){
            $("#btn_bomba_<?=$key->device_id?>").attr("class", "btn danger")
            $("#btn_bomba_<?=$key->device_id?>").attr("value", "Apagar")
            bomba = 'ENCENDIDA';
            $("#img_bomba_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/bomba_on.png");
        }else{
            $("#btn_bomba_<?=$key->device_id?>").attr("class", "btn success")
            $("#btn_bomba_<?=$key->device_id?>").attr("value", "Encender")
            $("#img_bomba_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/bomba_off.png");
            bomba = 'APAGADA'}


        if (riego == 1){
            $("#btn_riego_<?=$key->device_id?>").attr("class", "btn danger")
            $("#btn_riego_<?=$key->device_id?>").attr("value", "Apagar")
            riego = 'ENCENDIDO';
            $("#img_riego_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/canilla_on.png");
        }else{
            $("#btn_riego_<?=$key->device_id?>").attr("class", "btn success")
            $("#btn_riego_<?=$key->device_id?>").attr("value", "Encender")
            $("#img_riego_<?=$key->device_id?>").attr("src","<?=base_url()?>/public/img/dashboard/canilla_off.png");
            riego = 'APAGADO'}



        $("#estado_alarmadom_<?=$key->device_id?>").html(estado_alarma);
        $("#txt_luz_<?=$key->device_id?>").html(luz);
        $("#txt_bomba_<?=$key->device_id?>").html(bomba);
        $("#txt_riego_<?=$key->device_id?>").html(riego);
        $("#txt_act_desact_alarmadom_<?=$key->device_id?>").html(commando_alarma);


        }

        // BOTON ALARMA

        function act_desact_alarmadom_<?=$key->device_id?>(){
            var estado_alarmadom = document.getElementById('txt_act_desact_alarmadom_<?=$key->device_id?>');
            if (estado_alarmadom.innerHTML == 'Activar'){
                activar_alarmadom_<?=$key->device_id?>();
            }else{
                desactivar_alarmadom_<?=$key->device_id?>();
            }
        }

        function activar_alarmadom_<?=$key->device_id?>(){
            client.publish('alarma/command/<?= $key->device_serie?>', 'activar', (error) => {
            console.log(error || 'Mensaje enviado activacion alarma domotica!!! -> <?=$key->device_id?>')
            })
            actt.play();

        }

        function desactivar_alarmadom_<?=$key->device_id?>(){

            client.publish('alarma/command/<?= $key->device_serie?>', 'desactivar', (error) => {
            console.log(error || 'Mensaje enviado desactivacion alarma domotica!!! -> <?=$key->device_id?>')})
            desactt.play();

        }

        // BOTON LUZ


        function act_desact_luz_<?=$key->device_id?>(){
            var estado_luz = document.getElementById('txt_luz_<?=$key->device_id?>');
            if (estado_luz.innerHTML == 'ENCENDIDA'){
                desactivar_luz_<?=$key->device_id?>();
            }else{
                activar_luz_<?=$key->device_id?>();
            }
        }

        function activar_luz_<?=$key->device_id?>(){
            client.publish('domotica/luz/command/<?= $key->device_serie?>', 'activar', (error) => {
            console.log(error || 'Mensaje enviado activacion LUZ !!! -> <?=$key->device_id?>')
            })
            actt.play();

        }

        function desactivar_luz_<?=$key->device_id?>(){

            client.publish('domotica/luz/command/<?= $key->device_serie?>', 'desactivar', (error) => {
            console.log(error || 'Mensaje enviado desactivacion LUZ!!! -> <?=$key->device_id ?> : <?=$key->device_serie
            ?>')
            })
            desactt.play();

        }

        // BOTON BOMBA

        function act_desact_bomba_<?=$key->device_id?>(){
            var estado_bomba = document.getElementById('txt_bomba_<?=$key->device_id?>');
            if (estado_bomba.innerHTML == 'ENCENDIDA'){
                desactivar_bomba_<?=$key->device_id?>();
            }else{
                activar_bomba_<?=$key->device_id?>();
            }
        }

        function activar_bomba_<?=$key->device_id?>(){
            client.publish('domotica/bomba/command/<?= $key->device_serie?>', 'activar', (error) => {
            console.log(error || 'Mensaje enviado activacion bomba !!! -> <?=$key->device_id?>')
            })
            actt.play();

        }

        function desactivar_bomba_<?=$key->device_id?>(){

            client.publish('domotica/bomba/command/<?= $key->device_serie?>', 'desactivar', (error) => {
            console.log(error || 'Mensaje enviado desactivacion bomba!!! -> <?=$key->device_id ?> : <?=$key->device_serie
            ?>')
            })
            desactt.play();

        }

        // BOTON RIEGO

        function act_desact_riego_<?=$key->device_id?>(){
            var estado_riego = document.getElementById('txt_riego_<?=$key->device_id?>');
            if (estado_riego.innerHTML == 'ENCENDIDO'){
                desactivar_riego_<?=$key->device_id?>();
            }else{
                activar_riego_<?=$key->device_id?>();
            }

        }

        function activar_riego_<?=$key->device_id?>(){
            client.publish('domotica/riego/command/<?= $key->device_serie?>', 'activar', (error) => {
            console.log(error || 'Mensaje enviado activacion riego !!! -> <?=$key->device_id?>')
            })
            actt.play();

        }

        function desactivar_riego_<?=$key->device_id?>(){

            client.publish('domotica/riego/command/<?= $key->device_serie?>', 'desactivar', (error) => {
            console.log(error || 'Mensaje desactivacion riego!!! -> <?=$key->device_id ?> : <?=$key->device_serie
            ?>')
            })
            desactt.play();

        }






    <?php endif ?>

<?php endforeach ?>


</script>
