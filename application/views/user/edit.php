<!-- Content Header (Page header) -->
<section class="content-header">
      <h1><i class="fa fa-users"></i>
        Pengguna
       <small>Data Pengguna</small>
       
      </h1>
     <!-- <ol class="breadcrumb">
     	<li><a href=""><i class="fa fa-dashboard"></i></a></li>
     	<li class="active">Users</li>
     </ol> -->
    </section>
   
    <!-- Main Content -->
    <section class="content">
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title">Edit Pengguna</h3>
    			<div class="pull-right">
    			<a href="<?php echo base_url('user') ?>" class="btn btn-primary btn-flat">
    				<i class="fa fa-undo"></i>
					Kembali
    			</a>
    			</div>
    		</div>
			<div class="box-body">
    		  <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama')? 'has-error' : null?>">
                            <label>Nama </label>
                            <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                            <input type="text" name="nama" value="<?=$this->input->post('nama') ?$this->input->post('nama') : $row->nama?>" class="form-control">
                            <?php echo form_error('nama'); ?>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null?>">
                            <label>Username </label>
                            <input type="text" name="username" value="<?=$this->input->post('username') ?$this->input->post('username') : $row->username?>" class="form-control">
                            <?php echo form_error('username'); ?>
                        </div>
                         <div class="form-group <?= form_error('password') ? 'has-error' : null?>">
                            <label>Password </label><small> Biarkan kosong jika tidak diganti</small>
                            <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null?>">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                            <?php echo form_error('passconf'); ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <textarea name="alamat" class="form-control"><?=$this->input->post('alamat') ?$this->input->post('alamat') : $row->alamat?></textarea>
                        </div>
                         <div class="form-group <?= form_error('level') ? 'has-error' : null?>">
                            <label>Level </label>
                            <select name="level" class="form-control">
                            <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?=$level == 2 ? 'selected' : null?>>Apoteker</option>
                            </select>
                            <?php echo form_error('level'); ?>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
                           <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-times"></i> Reset</button>
                        </div>
                    </form>
                </div>      
              </div>
    		</div>
    	</div>
    </section>