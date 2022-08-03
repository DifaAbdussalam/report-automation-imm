<style>
#map {
	width: 100%;
	height: 250px;
}
</style>
<div class="content-wrapper">	
	 <form id="frm" class="form-horizontal" method="post" action="<?php echo site_url('profile/update'); ?>" enctype="multipart/form-data">   
	<section class="content">
	
	  <div class="row">
		<div class="col-md-3">
			<div class="box box-default">
				<div class="box-header with-border">
					<b>FOTO</b>
				</div>
				<div class="box-body box-profile">
					<img class="profile-user-img img-responsive img-circle" src="<?php echo asset_url('upload/admin/'.$this->auth->foto.''); ?>" alt="profile picture">
					<h3 class="profile-username text-center"><?php echo $this->auth->nama;?></h3>
				</div>
				<input class="btn btn-primary btn-block" type="file" name="userfile">
				<input type="hidden" name="foto" value="<?php echo $this->auth->foto;?>">
			</div>
		</div>
	  <div class="col-md-9">
		  <div class="box box-default">
			<div class="box-header with-border">
			<?php
			if ($this->session->flashdata('info')){  
				echo $this->session->flashdata('info');
			}else{
				echo'<b>AKUN</b>';
			}
			?>
			</div>
			  <div class="box-body">
				
			
				<div class="form-group">
				  <label for="nama" class="col-sm-2 control-label">Nama</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $this->auth->nama;?>" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="telepon" class="col-sm-2 control-label">Telepon</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="<?php echo $this->auth->telepon;?>" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="email" class="col-sm-2 control-label">Email</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $this->auth->email;?>" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="username" class="col-sm-2 control-label">Username</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $this->auth->username;?>" readonly>
				  </div>
				</div>
				<div class="form-group">
				  <label for="password" class="col-sm-2 control-label">Password</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="newpassword" name="newpassword" placeholder="Ganti Password">
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" id="btn-update" class="btn btn-md btn-primary">
						  <i class="ace-icon fa fa-save"></i> Update
						</button>
						<a type="button" class="btn btn-md btn-danger" href="<?php echo site_url();?>">
						  <i class="ace-icon fa fa-ban"></i> Cancel
						</a>
				  </div>
				</div>
			  </div>               
		  </div>
		</div>
	  </div>
	</section>
	</form>
  </div>