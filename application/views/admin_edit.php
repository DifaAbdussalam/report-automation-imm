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
	if ($this->session->flashdata('info'))
	{  
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
	  <form id="frm" method="post" class="form-horizontal" action="<?php echo site_url('admin/update'); ?>" enctype="multipart/form-data">
		<input type="hidden" id="id_admin" name="id_admin" value="<?php echo $mdata->id_admin;?>">
		<div class="box-body">			
			<div class="form-group">
				<label class="control-label col-sm-2" for="nama">Nama</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mdata->nama;?>" placeholder="Nama" required>
				</div>
			</div>		
			<div class="form-group">
				<label class="control-label col-sm-2" for="telepon">Telepon</label>
				<div class="col-sm-7">
				  <input type="number" class="form-control" id="telepon" name="telepon" value="<?php echo $mdata->telepon;?>" placeholder="Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-7">
				  <input type="email" class="form-control" id="email" name="email" value="<?php echo $mdata->email;?>" placeholder="Email" required>
				  <input type="hidden" id="current_email" name="current_email" value="<?php echo $mdata->email;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="level">Role Akses</label>
				<div class="col-sm-7">
					<select name="level" class="select3 form-control" id="level" required>
					<?php
					foreach($mlevel as $key=>$val){
						$selected=($key==$mdata->level) ? 'selected' : '';
						echo'<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
					}
					?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="status">Status</label>
				<div class="col-sm-7">
					<select name="status" class="select3 form-control" id="status" required>
					<?php
					foreach($mstatus as $key=>$val){
						$selected=($key==$mdata->status) ? 'selected' : '';
						echo'<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
					}
					?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="username">Username</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="username" name="username" value="<?php echo $mdata->username;?>" placeholder="Username" required>
				  <input type="hidden" id="current_username" name="current_username" value="<?php echo $mdata->username;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Password</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="password" name="password" placeholder="New Password">
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Update
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
