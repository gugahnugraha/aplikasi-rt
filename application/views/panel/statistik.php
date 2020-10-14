<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
<div class="col-md-6">
	<div class="info-box">
		<div class="icon bg-indigo">
			<i class="material-icons">person</i>
		</div>
		<div class="content">
			<div class="text">Jumlah Total Warga</div>
			<div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $jml; ?></div>
		</div>
	</div>

</div>
<div class="col-md-6">
	<div class="info-box">
		<div class="icon bg-red">
			<i class="material-icons">house</i>
		</div>
		<div class="content">
			<div class="text">Jumlah Kepala Keluarga</div>
			<div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $kep; ?></div>
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
				Berdasarkan Status Tinggal
			</div>
			<div class="body">
				<canvas id="status_tinggal" width="100%" height="50px"></canvas>
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
	var status_tinggalC = document.getElementById("status_tinggal");
	var pekerjaanC = document.getElementById("pekerjaan");
	var usiaC = document.getElementById("usia");
	// 
	var status_tinggal = new Chart(status_tinggalC, {
		type: 'bar',
		data: {
			labels: [<?php foreach ($status_tinggal as $b) {
							echo '"' . $b->status_tinggal . '",';
						}; ?>],
			datasets: [{
				label: 'Jumlah Warga',
				data: [<?php foreach ($status_tinggal as $c) {
							echo jml_warga_by_status_tinggal($id, $c->status_tinggal) . ',';
						}; ?>],
				backgroundColor: [
					<?php foreach ($status_tinggal as $b) {
						echo "'" . warna() . "',";
					}; ?>
				],
				borderColor: [
					<?php foreach ($status_tinggal as $b) {
						echo "'" . warnaborder() . "',";
					}; ?>
				],
				borderWidth: 1
			}]
		},
		options: {
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
	// 
	var pekerjaan = new Chart(pekerjaanC, {
		type: 'bar',
		data: {
			labels: [<?php foreach ($pk as $b) {
							echo '"' . $b->pekerjaan . '",';
						}; ?>],
			datasets: [{
				label: 'Jumlah Warga',
				data: [<?php foreach ($pk as $c) {
							echo jml_warga_by_pekerjaan($id, $c->pekerjaan) . ',';
						}; ?>],
				backgroundColor: [
					<?php foreach ($pk as $b) {
						echo "'" . warna() . "',";
					}; ?>
				],
				borderColor: [
					<?php foreach ($pk as $b) {
						echo "'" . warnaborder() . "',";
					}; ?>
				],
				borderWidth: 1
			}]
		},
		options: {
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
	// 
	var pendidikan = new Chart(pendidikanC, {
		type: 'bar',
		data: {
			labels: [<?php foreach ($pn as $b) {
							echo '"' . $b->pendidikan . '",';
						}; ?>],
			datasets: [{
				label: 'Jumlah Warga',
				data: [<?php foreach ($pn as $c) {
							echo jml_warga_by_pen($id, $c->pendidikan) . ',';
						}; ?>],
				backgroundColor: [
					<?php foreach ($pn as $b) {
						echo "'" . warna() . "',";
					}; ?>
				],
				borderColor: [
					<?php foreach ($pn as $b) {
						echo "'" . warnaborder() . "',";
					}; ?>
				],
				borderWidth: 1
			}]
		},
		options: {
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Perempuan", "Laki-laki"],
			datasets: [{
				label: 'Jumlah Warga ',
				data: [<?php echo $w; ?>, <?php echo $p; ?>],
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
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

	var usia = new Chart(usiaC, {
		type: 'bar',
		data: {
			labels: ['0-5', '6-11', '12-17', '18-25', '26-35', '36-49', '50 keatas'],
			datasets: [{
				label: 'Jumlah Warga',
				data: [<?php echo get_range_age(0, 5, $id); ?>, <?php echo get_range_age(6, 11, $id); ?>, <?php echo get_range_age(12, 17, $id); ?>, <?php echo get_range_age(18, 25, $id); ?>, <?php echo get_range_age(26, 35, $id); ?>, <?php echo get_range_age(36, 49, $id); ?>, <?php echo get_range_age(50, 200, $id); ?>],
				backgroundColor: [
					<?php foreach ($pn as $b) {
						echo "'" . warna() . "',";
					}; ?>
				],
				borderColor: [
					<?php foreach ($pn as $b) {
						echo "'" . warnaborder() . "',";
					}; ?>
				],
				borderWidth: 1
			}]
		},
		options: {
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>