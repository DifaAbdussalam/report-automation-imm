<div class="content-wrapper">
<section class="content-header">
  <h1>
	Data Kota
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Data</a></li>
	<li><a href="#">Kota</a></li>
	<li class="active">List</a></li>
  </ol>
</section> 
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	<?php if ($this->session->flashdata('info')) { ?>
	<div class="alert alert-warning">
		<?php echo $this->session->flashdata('info'); ?>
	</div>
	<?php } ?>
	<a href="<?php echo site_url('Kota/add');?>">
		<button type="button" class="btn btn-primary btn-sm flat">
			<span class="glyphicon glyphicon-plus"></span> Tambah
		</button>
	</a>
	 <div class="box box-default">
		<div class="box-body">
		<div class="table-responsive">
		  <table id="user" class="display table-bordered table-striped table-hover" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th>No</th>
				<th>Kota</th>
				<th>Opsi</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			if($mdata->num_rows()>0){
				$no=1;
				foreach($mdata->result_array() as $rows){
					echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$rows['kota'].'</td>';
					echo '<td><a class="btn btn-sm btn-primary" href="'.site_url('kota/edit/'.trim(base64_encode($rows['id_kota']),'=').'').'">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
								<a class="btn btn-sm btn-danger" href="#" data-href="'.site_url('kota/remove/'.trim(base64_encode($rows['id_kota']),'=').'').'"  data-toggle="modal" data-target="#confirm-delete" >
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>
							</td>';
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
<!-- DataTables -->
<script type="text/javascript">
var user;
$(document).ready(function() {
    user = $('#user').DataTable({ 
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
		{ 
            "targets": [ 2 ],
            "orderable": false,
            "class": "text-center",
			"width": "10%",
			"targets": 2,
        },
        ],

    });

});
jQuery(function($) {
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
})
</script>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok btn-sm">Delete</a>
            </div>
        </div>
    </div>
</div>