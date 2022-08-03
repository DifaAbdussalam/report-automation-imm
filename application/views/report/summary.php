<link rel="stylesheet" href="<?php echo asset_url('core/css/mystyle.css'); ?>"/>
<!-- DataTables -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div class="content-wrapper">
<section class="content-header">
  <h1>Summary Radio</h1>
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
			<form id="frm" method="get" class="form-horizontal" action="<?php echo site_url('summary'); ?>" enctype="multipart/form-data">
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
  <?php
  $thProv='';
  $thSign='';
  $tdRow1='';
  $tdRow2='';
  $tdRow3='';
  $tdRow4='';
  $tdRow5='';
  $tdRow6='';
  $index=0;
  if($mprovider->num_rows()>0){
	foreach($mprovider->result() as $row){
		$thProv.='<th colspan="3" class="danger text-center">'.$row->provider.'</th>';
		foreach($msignal as $key => $val){
			$row1=$this->chart_model->summary_row1($row->provider,$key,$kota,$sdate,$edate);
			$row2=$this->chart_model->summary_row2($row->provider,$key,$kota,$sdate,$edate);
			$row3=($row1>0) ? ($row1/$row2) * 100 : 0;
			$row4=$this->chart_model->summary_row4($row->provider,$key,$kota,$sdate,$edate);
			$row5=$this->chart_model->summary_row5($row->provider,$key,$kota,$sdate,$edate);
			$row6=($row4>0) ? ($row4/$row5) * 100 : 0;
			$thSign.='<th class="warning text-center">'.$val.'</th>';
			$tdRow1.='<td class="text-center">'.number_format($row1,2).'</td>';
			$tdRow2.='<td class="text-center">'.number_format($row2,2).'</td>';
			$tdRow3.='<td class="text-center">'.number_format($row3,2).'</td>';
			$tdRow4.='<td class="text-center">'.number_format($row4,2).'</td>';
			$tdRow5.='<td class="text-center">'.number_format($row5,2).'</td>';
			$tdRow6.='<td class="text-center">'.number_format($row6,2).'</td>';
		}
		
	}  
  }
  ?>
  <div class="row">
	<div class="col-md-12" style="min-height:250px;">
		<div class="box box-primary">
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<tbody>
						  <tr>
							<th colspan="2" rowspan="2"></th>
							<?php echo $thProv;?>
						  </tr>
						  <tr>
							<?php echo $thSign;?>
						  </tr>
						  <tr>
							<th rowspan="3">Coverage</th>
							<td>Bad Signal Strength Samples</td>
							<?php echo $tdRow1;?>
						  </tr>
						  <tr>
							<td>Total Signal Strength Sample</td>
							<?php echo $tdRow2;?>
						  </tr>
						  <tr>
							<td>Bad Signal Strength Percentage (%)</td>
							<?php echo $tdRow3;?>
						  </tr>
						   <tr>
							<th rowspan="3">Quality</th>
							<td>Bad Signal Quality Samples</td>
							<?php echo $tdRow4;?>
						  </tr>
						   <tr>
							<td>Total Signal Quality Sample</td>
							<?php echo $tdRow5;?>
						  </tr>
						  <tr>
							<td>Bad Signal Quality Percentage (%)</td>
							<?php echo $tdRow6;?>
						  </tr>
						</tbody>
					  </table>
				</div>
			</div>
		</div>
	</div>
  </div>
</section>
</div>