<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>

<div class="p-a white lt box-shadow">
	<div class="row">
		<div class="col-sm-8">
			<h4 class="mb-1 _900">Gráficos en tiempo real de <strong><?= strtoupper($device->device_alias) ?></strong></h4>
			<a href="<?=base_url().route_to('app_chart_selector_realtime')?>"><i class="fas fa-arrow-circle-left"></i> Seleccionar otro dispositivo</a>
		</div>
	</div>
</div>

<div class="padding">
<div class="row">

<div class="col-sm-6 col-md-6">
	        <div class="box">
	          <div class="box-header">
	            <h3>Estado de ALARMA</h3>
	            <small>1:Activada - 0:Desactivada</small>
	          </div>
	          <div class="box-body">
	          	<div class="text-center m-b">
                  <div id="container1" style="height: 400px; min-width: 310px"></div>
	          	</div>
	          </div>
	        </div>
	    </div>


    <div class="col-sm-6 col-md-6">
	        <div class="box">
	          <div class="box-header">
	            <h3>Estado de LUZ</h3>
                <small>1:Encendida - 0:Apagada</small>
	          </div>
	          <div class="box-body">
	          	<div class="text-center m-b">
                  <div id="container2" style="height: 400px; min-width: 310px"></div>
	          	</div>
	          </div>
	        </div>
	    </div>
</div>

<div class="row">
      <div class="col-sm-6 col-md-6">
	        <div class="box">
	          <div class="box-header">
	            <h3>Estado de BOMBA</h3>
	            <small>1:Encendida - 0:Apagada</small>
	          </div>
	          <div class="box-body">
	          	<div class="text-center m-b">
                  <div id="container3" style="height: 400px; min-width: 310px"></div>
	          	</div>
	          </div>
	        </div>
	    </div>

    <div class="col-sm-6 col-md-6">
	        <div class="box">
	          <div class="box-header">
	            <h3>Estado de RIEGO</h3>
	            <small>1:Encendido - 0:Apagado</small>
	          </div>
	          <div class="box-body">
	          	<div class="text-center m-b">
                  <div id="container4" style="height: 400px; min-width: 310px"></div>
	          	</div>
	          </div>
	        </div>
	    
</div>
<script>
    // Create the chart
Highcharts.stockChart('container1', {
    chart: {
        events: {
            load: function () {

                // set up the updating of the chart each second
                var series = this.series[0];
                setInterval(function () {
                    var x = (new Date()).getTime(), // current time
                        y = estado_alarmadom_<?=$device->device_serie?>;
                    series.addPoint([x, y]);
                }, 1000);
            }
        }
    },

    time: {
        useUTC: false
    },

    rangeSelector: {
        buttons: [{
            count: 1,
            type: 'minute',
            text: '1M'
        }, {
            count: 5,
            type: 'minute',
            text: '5M'
        }, {
            type: 'all',
            text: 'All'
        }],
        inputEnabled: false,
        selected: 0
    },

    title: {
        text: 'Mi Alarma'
    },

    exporting: {
        enabled: false
    },

    series: [{
        name: 'Estado de la central',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;

            for (i = -999; i <= 0; i += 1) {
                data.push([
                    time + i * 1000,
                    1
                ]);
            }
            return data;
        }())
    }]
});


Highcharts.stockChart('container2', {
    chart: {
        events: {
            load: function () {

                // set up the updating of the chart each second
                var series = this.series[0];
                setInterval(function () {
                    var x = (new Date()).getTime(), // current time
                        y = luz_<?=$device->device_serie?>;
                    series.addPoint([x, y]);
                }, 1000);
            }
        }
    },

    time: {
        useUTC: false
    },

    rangeSelector: {
        buttons: [{
            count: 1,
            type: 'minute',
            text: '1M'
        }, {
            count: 5,
            type: 'minute',
            text: '5M'
        }, {
            type: 'all',
            text: 'All'
        }],
        inputEnabled: false,
        selected: 0
    },

    title: {
        text: 'Dispositivo LUZ'
    },

    exporting: {
        enabled: false
    },

    series: [{
        name: 'Estado de luz',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;

            for (i = -999; i <= 0; i += 1) {
                data.push([
                    time + i * 1000,
                    1
                ]);
            }
            return data;
        }())
    }]
});


// ---------------------------------



Highcharts.stockChart('container3', {
    chart: {
        events: {
            load: function () {

                // set up the updating of the chart each second
                var series = this.series[0];
                setInterval(function () {
                    var x = (new Date()).getTime(), // current time
                        y = bomba_<?=$device->device_serie?>;
                    series.addPoint([x, y]);
                }, 1000);
            }
        }
    },

    time: {
        useUTC: false
    },

    rangeSelector: {
        buttons: [{
            count: 1,
            type: 'minute',
            text: '1M'
        }, {
            count: 5,
            type: 'minute',
            text: '5M'
        }, {
            type: 'all',
            text: 'All'
        }],
        inputEnabled: false,
        selected: 0
    },

    title: {
        text: 'Dispositivo BOMBA'
    },

    exporting: {
        enabled: false
    },

    series: [{
        name: 'Estado de bomba',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;

            for (i = -999; i <= 0; i += 1) {
                data.push([
                    time + i * 1000,
                    1
                ]);
            }
            return data;
        }())
    }]
});

// ---------------------------------



Highcharts.stockChart('container4', {
    chart: {
        events: {
            load: function () {

                // set up the updating of the chart each second
                var series = this.series[0];
                setInterval(function () {
                    var x = (new Date()).getTime(), // current time
                        y = riego_<?=$device->device_serie?>;
                    series.addPoint([x, y], true, true);
                }, 1000);
            }
        }
    },

    time: {
        useUTC: false
    },

    rangeSelector: {
        buttons: [{
            count: 1,
            type: 'minute',
            text: '1M'
        }, {
            count: 5,
            type: 'minute',
            text: '5M'
        }, {
            type: 'all',
            text: 'All'
        }],
        inputEnabled: false,
        selected: 0
    },

    title: {
        text: 'Dispositivo RIEGO'
    },

    exporting: {
        enabled: false
    },

    series: [{
        name: 'Estado de riego',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;

            for (i = -999; i <= 0; i += 1) {
                data.push([
                    time + i * 1000,
                    0
                ]);
            }
            return data;
        }())
    }]
});

</script>
    
    
    
<?php //aca hago la conexion y subscripcion a los topicos ?>
<?= view('users/dashboard/mqtt/main',['devices' => $devices]) ?>
<?php // ahora tengo que las funciones cada vez que llegue un mensaje ?>
<?= view('users/dashboard/mqtt/index',['devices' => $devices]) ?>
<?= $this->endSection() ?>