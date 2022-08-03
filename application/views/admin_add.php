<div class="content-wrapper">
 <section class="content-header">
  <h1>
	Edit Admin
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Data</a></li>
	<li><a href="#">Admin</a></li>
	<li class="active">Edit</a></li>
  </ol>
</section> 
<section class="content">
<?php
if ($this->session->flashdata('info')){  
	echo $this->session->flashdata('info');
}
?>
<div class="box box-default">
<div class="box-header with-border">
	<a href="<?php echo site_url('admin');?>">
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
	  <form id="frm" method="post" class="form-horizontal" action="<?php echo site_url('admin/save'); ?>" enctype="multipart/form-data">
		<div class="box-body">
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="nama">Nama</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="telepon">Telepon</label>
				<div class="col-sm-7">
				  <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-7">
				  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="level">Role Akses</label>
				<div class="col-sm-7">
					<select name="level" class="form-control select3" id="level" placeholder="Role" required>
						<?php
						foreach($mlevel as $key=>$val){
							echo'<option value="'.$key.'">'.$val.'</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="status">Status</label>
				<div class="col-sm-7">
					<select name="status" class="form-control select3" id="level" placeholder="Status" required>
						<?php
						foreach($mstatus as $key=>$val){
							echo'<option value="'.$key.'">'.$val.'</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="username">Username</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Password</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
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
