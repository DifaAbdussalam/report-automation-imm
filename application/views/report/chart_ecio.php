<link rel="stylesheet" href="<?php echo asset_url('core/css/mystyle.css'); ?>"/>
<!-- DataTables -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div class="content-wrapper">
<section class="content-header">
  <h1>Grafik ECIO</h1>
	<ol class="breadcrumb">
	<li><a href="#">Data</a></li>
	<li><a href="#">Grafik</a></li>
	<li class="active">List</a></li>
	</ol>
</section> 
<section class="content">
	 <div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				FILTER DATA
			</div>
			<form id="frm" method="get" class="form-horizontal" action="<?php echo site_url('chart_ecio'); ?>" enctype="multipart/form-data">
			<div class="box-body">
				<div class="form-group">
					<label class="control-label col-sm-1 text-left" for="kota">KOTA</label>
					<div class="col-sm-3">
						<select name="kota" class="form-control select3" id="kota" placeholder="Kota" required>
							<?php
							echo'<option value="ALL">ALL</option>';
							if($mkota->num_rows()>0){
								foreach($mkota->result() as $row){
									$selected=($kota==$row->id_kota) ? 'selected' : '';
									echo'<option value="'.$row->id_kota.'" '.$selected.'>'.$row->kota.'</option>';
								}
							}
							?>
						</select>
					</div>
					<label class="control-label col-sm-1 text-center" for="periode">PERIODE</label>
					<div class="col-sm-2">
					  <input type="date" class="form-control" id="sdate" name="sdate" value="<?php echo $sdate;?>" placeholder="Start Date" required>
					</div>
					<label class="control-label col-sm-1 text-center" for="periode">S/D</label>
					<div class="col-sm-2">
					  <input type="date" class="form-control" id="edate" name="edate" value="<?php echo $edate;?>" placeholder="End Date" required>
					</div>
					<div class="col-sm-2">
					  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
						<i class="ace-icon fa fa-filter"></i> Filter
					  </button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
  </div>
  <div class="row">
	<?php if($mprovider->num_rows()>0){ ?>
	<?php foreach($mprovider->result() as $row ){ ?>
	<div class="col-md-6" style="min-height:250px;">
		<div class="box box-primary">
			<div class="box-body">
				<figure class="highcharts-figure">
					<div id="container-<?php echo $row->provider;?>"></div>
				</figure>
			</div>
		</div>
	</div>
	<?php
	$dataList=$this->chart_model->chart_ecio($row->provider,$kota,$sdate,$edate);
	?>
	<script type="text/javascript">
	Highcharts.chart('container-<?php echo $row->provider;?>', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: '<?php echo $row->provider;?>'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				}
			}
		},
		series: [{
			name: 'Persentase',
			colorByPoint: true,
			data: [<?php echo $dataList;?>]
		}]
	});
	</script>
	
	<?php } ?>
	<?php } ?>
  </div>
</section>
</div>