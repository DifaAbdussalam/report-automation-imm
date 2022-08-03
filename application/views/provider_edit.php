<div class="content-wrapper">
<section class="content-header">
  <h1>
	Edit Provider
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Data</a></li>
	<li><a href="#">Provider</a></li>
	<li class="active">Edit</a></li>
  </ol>
</section>
<section class="content">
<?php
	if ($this->session->flashdata('info'))
	{  
		echo $this->session->flashdata('info');
	}
?>
<div class="box box-primary">
<div class="box-header with-border">
	<a href="<?php echo site_url('provider');?>">
		<span class="glyphicon fa fa-mail-reply"></span> <b>Kembali</b>
	</a> 
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
  </div>
</div>
<div class="box-body">
  <div class="row">
	<div class="col-md-12">
	  <form id="frm" method="post" class="form-horizontal" action="<?php echo site_url('provider/update'); ?>" enctype="multipart/form-data">
		<input type="hidden" name="id_provider" value="<?php echo $mdata->id_provider;?>">
		<div class="box-body">
			<div class="form-group">
				<label class="control-label col-sm-2" for="id_mnc">ID Mnc</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="id_mnc" name="id_mnc" value="<?php echo $mdata->id_mnc;?>"  placeholder="ID Mnc" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="provider">Provider</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="provider" name="provider" value="<?php echo $mdata->provider;?>"  placeholder="Provider" required>
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Save
				  </button>
				  <button type="button" class="btn btn-md btn-danger">
					<i class="ace-icon fa fa-ban"></i> Reset
				  </button>
				</div>
			</div>
		</div>
	  </form>
	</div>
  </div>
</div>
</div>
</section>
</div>
