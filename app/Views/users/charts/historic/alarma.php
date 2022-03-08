<?= $this->extend('users/templates/layout')?>
<?= $this->section('content') ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="p-a white lt box-shadow">
	<div class="row">
		<div class="col-sm-8">
			<h4 class="mb-1 _900">Gráficos de <strong><?= strtoupper($device->device_alias) ?></strong></h4>
			<a href="<?=base_url().route_to('app_chart_selector_historic')?>"><i class="fas fa-arrow-circle-left"></i> Seleccionar otro dispositivo</a>
		</div>
	</div>
</div>

<div class="padding">
<div class="row">
    <div class="col-12 col-sm-12 col-md-12">
	        <div class="box">
	          <div class="box-header">
	            <h3>Estado de alarma</h3>
	            <small>Últimos 100 eventos</small>
	          </div>
	          <div class="box-body">
	          	<div class="text-center m-b">
                  <div id="container1" class="fluid" fill="#424242"></div>
	          	</div>
	          </div>
	        </div>
	    </div>

    <div class="col-12 col-sm-12 col-md-12">
	        <div class="box">
	          <div class="box-header">
	            <h3>Estado de sirena</h3>
	            <small>Últimos 100 eventos</small>
	          </div>
	          <div class="box-body">
	          	<div class="text-center m-b">
                  <div id="container2" fill="#424242"></div>
	          	</div>
	          </div>
	        </div>
	    </div>


    </div>

<script>

//--------------------------------

Highcharts.chart('container1', {

subtitle: {
    text: '1: Activada - 0: Desactivada'
},

chart: {
            type: 'line',
            zoomType: 'x'
        },
        colors: ['#337ab7', '#cc3c1a'],
        title: {
            text: 'Activaciones y Desactivaciones'
        },
        xAxis: {
             type: 'datetime',
        },
        yAxis: {
            title: {
                text: 'Estado'
            }
        },

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2010
    }
},

series: [{
    name: 'Estado de alarma',
    data: [
      <?php foreach ($actdesact_data as $key => $value) {
    echo "[";
    echo (($value['UNIX_TIMESTAMP(created_at)'])*1000)-10800000; //le resto 3 horas = 10800000 mill
    echo ",";
    echo  $value['actdesact_value'];
    echo "],";

} ?>
    ]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
//--------------------------------

Highcharts.chart('container2', {


subtitle: {
    text: '1: Disparada - 0: No disparada'
},

chart: {
            type: 'line',
            zoomType: 'x'
        },
        colors: ['#337ab7', '#cc3c1a'],
        title: {
            text: 'Disparos de sirena'
        },
        xAxis: {
             type: 'datetime',
        },
        yAxis: {
            title: {
                text: 'Estado'
            }
        },

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2010
    }
},

series: [{
    name: 'Estado sirenas',
    data: [
      <?php foreach ($disparos_data as $key => $value) {
    echo "[";
    echo (($value['UNIX_TIMESTAMP(created_at)'])*1000)-10800000; //le resto 3 horas = 10800000 mill
    echo ",";
    echo  $value['disparos_value'];
    echo "],";

} ?>
    ]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>



</div>
</div>


<?php //aca hago la conexion y subscripcion a los topicos ?>
<?= view('users/dashboard/mqtt/main',['devices' => $devices]) ?>
<?php // ahora tengo que las funciones cada vez que llegue un mensaje ?>
<?= view('users/dashboard/mqtt/index',['devices' => $devices]) ?>
<?= $this->endSection() ?>
