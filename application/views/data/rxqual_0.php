<div class="content-wrapper">
<section class="content-header">
  <h1>Data rxqual_0</h1>
	<ol class="breadcrumb">
	<li><a href="#">Data</a></li>
	<li><a href="#">Table</a></li>
	<li class="active">List</a></li>
	</ol>
</section> 
<section class="content">
  <div class="row" style="min-height:400px;">
	<div class="col-xs-12">
		<?php if ($this->session->flashdata('info')) { ?>
		<div class="alert alert-warning">
			<?php echo $this->session->flashdata('info'); ?>
		</div>
		<?php } ?>
		<button type="button" class="btn btn-primary btn-sm flat" data-toggle="modal" data-target="#modalUpload">
			<span class="fa fa-upload"></span> Upload
		</button>
		<button type="button" class="btn btn-primary btn-sm flat" data-toggle="modal" data-target="#modalExport">
			<span class="fa fa-file-excel-o"></span> Export
		</button>
		<button type="button" class="pull-right btn-primary btn-sm flat">
		<strong>FILTER</strong>
			<select style="color:black" id="kota" name="kota" required="required">
				<option value=''>ALL</option>
				<?php
				$filter=($this->session->userdata('filter_kota')) ? $this->session->userdata('filter_kota') : '';
				if($mkota->num_rows()>0){
					foreach($mkota->result() as $row){
						$selected=($filter==$row->id_kota) ? 'selected' : '';
						echo "<option value='".$row->id_kota."' ".$selected.">".$row->kota."</option>";					
					}
				}
				?>
			</select>
		</button>
		<div class="box box-default">
		<div class="box-body">
		<div class="table-responsive">
		  <table id="myTable" class="display table-bordered table-striped table-hover" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th>No</th>
				<th>InputDate</th>
				<th>Kota</th>
				<th>CID</th>
				<th>LAC</th>
				<th>MCC</th>
				<th>MNC</th>
				<th>CGI</th>
				<th>Technology</th>
				<th>Lon</th>
				<th>Lat</th>
				<th>SessionId</th>
				<th>TestId</th>
				<th>NetworkId</th>
				<th>SystemName</th>
				<th>ADevice</th>
				<th>Time</th>
				<th>PosId</th>
				<th>FileId</th>
				<th>BTSLon</th>
				<th>BTSLat</th>
				<th>BTSLonDiff</th>
				<th>BTSLatDiff</th>
				<th>BTSDist</th>
				<th>BTS2LonDiff</th>
				<th>BTS2LatDiff</th>
				<th>BTS2Dist</th>
				<th>BTS3LonDiff</th>
				<th>BTS3LatDiff</th>
				<th>BTS3Dist</th>
				<th>BTSTech</th>
				<th>FloorPlanName</th>
				<th>FloorPlanLevel</th>
				<th>SessionIdLP</th>
				<th>TestIdLP</th>
				<th>PosIdLP</th>
				<th>NetworkIdLP</th>
				<th>RxQual</th>		
				<th>RxQualVal</th>
				<th>ChNr</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			if($mdata->num_rows()>0){
				$no=1;
				foreach($mdata->result() as $rows){
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$rows->inputDate.'</td>';
					echo '<td>'.$rows->kota.'</td>';
					echo '<td>'.$rows->CID.'</td>';
					echo '<td>'.$rows->LAC.'</td>';
					echo '<td>'.$rows->MCC.'</td>';
					echo '<td>'.$rows->MNC.'</td>';
					echo '<td>'.$rows->CGI.'</td>';
					echo '<td>'.$rows->Technology.'</td>';
					echo '<td>'.$rows->Lon.'</td>';
					echo '<td>'.$rows->Lat.'</td>';
					echo '<td>'.$rows->SessionId.'</td>';
					echo '<td>'.$rows->TestId.'</td>';
					echo '<td>'.$rows->NetworkId.'</td>';
					echo '<td>'.$rows->SystemName.'</td>';
					echo '<td>'.$rows->ADevice.'</td>';
					echo '<td>'.$rows->Time.'</td>';
					echo '<td>'.$rows->PosId.'</td>';
					echo '<td>'.$rows->FileId.'</td>';
					echo '<td>'.$rows->BTSLon.'</td>';
					echo '<td>'.$rows->BTSLat.'</td>';
					echo '<td>'.$rows->BTSLonDiff.'</td>';
					echo '<td>'.$rows->BTSLatDiff.'</td>';
					echo '<td>'.$rows->BTSDist.'</td>';
					echo '<td>'.$rows->BTS2LonDiff.'</td>';
					echo '<td>'.$rows->BTS2LatDiff.'</td>';
					echo '<td>'.$rows->BTS2Dist.'</td>';
					echo '<td>'.$rows->BTS3LonDiff.'</td>';
					echo '<td>'.$rows->BTS3LatDiff.'</td>';
					echo '<td>'.$rows->BTS3Dist.'</td>';
					echo '<td>'.$rows->BTSTech.'</td>';
					echo '<td>'.$rows->FloorPlanName.'</td>';
					echo '<td>'.$rows->FloorPlanLevel.'</td>';
					echo '<td>'.$rows->SessionIdLP.'</td>';
					echo '<td>'.$rows->TestIdLP.'</td>';
					echo '<td>'.$rows->PosIdLP.'</td>';
					echo '<td>'.$rows->NetworkIdLP.'</td>';
					echo '<td>'.$rows->RxQual.'</td>';
					echo '<td>'.$rows->RxQualVal.'</td>';
					echo '<td>'.$rows->ChNr.'</td>';
					echo '</tr>';
					$no++;
				}
			}
			?>
			</tbody>
		  </table>
		  </div>
		</div>
		</div>
	</div>
  </div>
</section>
</div>
<style>
.select2-container {
	z-index: 9999 !important;
}
</style>
<div id="modalUpload" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Data</h4>
      </div>
      <div class="modal-body">
        <form id="frm-import" method="post" class="form-horizontal" action="<?php echo site_url('rxqual_0/upload'); ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-sm-2" for="inputDate">Date</label>
				<div class="col-sm-7">
				  <input type="date" class="form-control" id="inputDate" name="inputDate" value="<?php echo $date;?>" placeholder="inputDate" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="id_kota">Kota</label>
				<div class="col-sm-7">
					<select class="form-control select2" id="id_kota" name="id_kota" placeholder="Kota" required>
						<?php
						if($mkota->num_rows()>0){
							foreach($mkota->result() as $row){
								echo'<option value="'.$row->id_kota.'">'.$row->kota.'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="userfile">File</label>
				<div class="col-sm-7">
				  <input type="file" class="form-control" id="userfile" name="userfile" placeholder="File" required>
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Save
				  </button>
				  <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">
					<i class="ace-icon fa fa-ban"></i> Close
				  </button>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div id="modalExport" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Export Data</h4>
      </div>
		<div class="modal-body">
        <form id="frm-import" method="post" class="form-horizontal" action="<?php echo site_url('rxqual_0/export'); ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-sm-2" for="start">Periode</label>
				<div class="col-sm-3">
				  <input type="date" class="form-control" id="start" name="start" value="<?php echo $date;?>" placeholder="Start Date" required>
				</div>
				<label class="control-label col-sm-1" for="end">S/D</label>
				<div class="col-sm-3">
				  <input type="date" class="form-control" id="end" name="end" value="<?php echo $date;?>" placeholder="End Date" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="id_kota">Kota</label>
				<div class="col-sm-7">
					<select class="form-control select2" id="id_kota" name="id_kota" placeholder="Kota" required>
						<?php
						echo'<option value="ALL">ALL</option>';
						if($mkota->num_rows()>0){
							foreach($mkota->result() as $row){
								echo'<option value="'.$row->id_kota.'">'.$row->kota.'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-export" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-file-excel-o"></i> Export
				  </button>
				  <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">
					<i class="ace-icon fa fa-ban"></i> Close
				  </button>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var myTable;
$(document).ready(function() {
    myTable = $('#myTable').DataTable({
		dom: "Bfrtip",
		buttons: [
			{extend: "print", text: "<span class='glyphicon glyphicon-print'></span> Print"},          
			{extend: "excelHtml5", text: "<span class='glyphicon glyphicon-th-list'></span> Excel"},
			{extend: "pdfHtml5", text: "<span class='glyphicon glyphicon-save'></span> PDF", title: "Filename"}
		],
        "oLanguage": {
		"sProcessing": "<img src='<?php echo asset_url('core/img/loader.gif')?>'>"
		},
		"processing": true, 
        "serverSide": false, 
        "order": [], 
        "columnDefs": [
        { 
            "targets": [ 0 ],
            "orderable": true,
			"width": "5%",
			"targets": 0,
        },
        ],

    });
	$("#kota").change(function(){
		var kota= $("#kota").val();
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('rxqual_0/filter_kota');?>",
			data: {kota:kota},
			beforeSend: function (){
				$(".modal").show();
			},
			complete: function(xhr){
				$(".modal").hide();
			}, 
			success: function(data){
				window.location.reload();
			}
		});
		
	});

});
</script>