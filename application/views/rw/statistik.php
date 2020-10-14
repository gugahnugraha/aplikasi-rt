<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
<div class="col-md-3">
	<div class="info-box">
                        <div class="icon bg-indigo">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Warga Terdaftar</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $jml;?></div>
                        </div>
                    </div>
</div>
<div class="col-md-12 row">
	<div class="col-md-6">
	<div class="card">
		<div class="header bg-blue">
			Berdasarkan Jenis Kelamin
		</div>
		<div class="body">
			<canvas id="myChart" width="100%" height="50px"></canvas>
		</div>
	</div>
	</div>
	<div class="col-md-6">
	<div class="card">
		<div class="header bg-blue">
			Berdasarkan Pendidikan
		</div>
		<div class="body">
			<canvas id="pendidikan" width="100%" height="50px"></canvas>
		</div>
	</div>
	</div>
	<div class="col-md-6">
	<div class="card">
		<div class="header bg-blue">
			Berdasarkan Usia
		</div>
		<div class="body">
			<canvas id="usia" width="100%" height="50px"></canvas>
		</div>
	</div>
	</div>
	<div class="col-md-6">
	<div class="card">
		<div class="header bg-blue">
			Berdasarkan Agama
		</div>
		<div class="body">
			<canvas id="agama" width="100%" height="50px"></canvas>
		</div>
	</div>
	</div>
	<div class="col-md-6">
	<div class="card">
		<div class="header bg-blue">
			Berdasarkan Pekerjaan
		</div>
		<div class="body">
			<canvas id="pekerjaan" width="100%" height="50px"></canvas>
		</div>
	</div>
	</div>
</div>


<script type="text/javascript">

	var ctx = document.getElementById("myChart");
	var pendidikanC = document.getElementById("pendidikan");
	var agamaC = document.getElementById("agama");
	var pekerjaanC = document.getElementById("pekerjaan");
	var usiaC = document.getElementById("usia");
	// 
	var agama = new Chart(agamaC,{
		type:'bar',
		data: {
			labels:[<?php foreach($ag as $b){echo '"'.$b->agama.'",';};?>],
			datasets:[{
				label:'Jumlah Warga',
				data:[<?php foreach($ag as $c){echo jml_warga_by_agama_rw($c->agama).',';};?>],
				backgroundColor:[
				<?php foreach($ag as $b){echo "'".warna()."',";};?>			
				],
            borderColor: [
                <?php foreach($ag as $b){echo "'".warnaborder()."',";};?>
            ],
            borderWidth: 1
			}]
		},
		options: {
    	legend:{
    		display:false
    	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
	});
	// 
	var pekerjaan = new Chart(pekerjaanC,{
		type:'bar',
		data: {
			labels:[<?php foreach($pk as $b){echo '"'.$b->pekerjaan.'",';};?>],
			datasets:[{
				label:'Jumlah Warga',
				data:[<?php foreach($pk as $c){echo jml_warga_by_pekerjaan_rw($c->pekerjaan).',';};?>],
				backgroundColor:[
				<?php foreach($pk as $b){echo "'".warna()."',";};?>			
				],
            borderColor: [
                <?php foreach($pk as $b){echo "'".warnaborder()."',";};?>
            ],
            borderWidth: 1
			}]
		},
		options: {
    	legend:{
    		display:false
    	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
	});
	// 
	var pendidikan = new Chart(pendidikanC,{
		type:'bar',
		data: {
			labels:[<?php foreach($pn as $b){echo '"'.$b->pendidikan.'",';};?>],
			datasets:[{
				label:'Jumlah Warga',
				data:[<?php foreach($pn as $c){echo jml_warga_by_pen_rw($c->pendidikan).',';};?>],
				backgroundColor:[
				<?php foreach($pn as $b){echo "'".warna()."',";};?>			
				],
            borderColor: [
                <?php foreach($pn as $b){echo "'".warnaborder()."',";};?>
            ],
            borderWidth: 1
			}]
		},
		options: {
    	legend:{
    		display:false
    	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
	});
	var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Wanita", "Pria"],
        datasets: [{
            label: 'Jumlah Warga ',
            data: [<?php echo $w;?>, <?php echo $p;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
    	legend:{
    		display:false
    	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var usia = new Chart(usiaC,{
		type:'bar',
		data: {
			labels:['0-5','6-11','12-17','18-25','26-35','36-49','50 keatas'],
			datasets:[{
				label:'Jumlah Warga',
				data:[<?php echo get_range_age_rw(0,5);?>,<?php echo get_range_age_rw(6,11);?>,<?php echo get_range_age_rw(12,17);?>,<?php echo get_range_age_rw(18,25);?>,<?php echo get_range_age_rw(26,35);?>,<?php echo get_range_age_rw(36,49);?>,<?php echo get_range_age_rw(50,200);?>],
				backgroundColor:[
				<?php foreach($pn as $b){echo "'".warna()."',";};?>			
				],
            borderColor: [
                <?php foreach($pn as $b){echo "'".warnaborder()."',";};?>
            ],
            borderWidth: 1
			}]
		},
		options: {
    	legend:{
    		display:false
    	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
	});
	
</script>