<!-- Content Header (Page header) -->
<section class="content-header">
      <!-- <h1><i class="fa fa-user"></i>
        Dokter
       <small>Data Pasien</small>
       
      </h1> -->
     <!-- <ol class="breadcrumb">
     	<li><a href=""><i class="fa fa-dashboard"></i></a></li>
     	<li class="active">Pasien</li>
     </ol> -->
    </section>
   
    <!-- Main Content -->
    <section class="content">
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title">Tambah Pasien</h3>
    			<div class="pull-right">
    			<a href="<?php echo base_url('pasien') ?>" class="btn btn-primary btn-flat">
    				<i class="fa fa-undo"></i>
					Kembali
    			</a>
    			</div>
    		</div>
			<div class="box-body">
    		  <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="<?php echo base_url('pasien/add'); ?>" method="post">
                        <div class="form-group <?= form_error('kd_pasien')? 'has-error' : null?>">
                            <label>Kode Pasien </label>
                            <input type="text" name="kd_pasien" readonly="readonly" value="<?= $pasien_kd ?>" class="form-control">
                            <?php echo form_error('kd_pasien'); ?>
                        </div>
                        <div class="form-group <?= form_error('nama_pasien')? 'has-error' : null?>">
                            <label>Nama </label>
                            <input type="text" name="nama_pasien" value="<?=set_value('nama_pasien') ?>" class="form-control">
                            <?php echo form_error('nama_pasien'); ?>
                        </div>
                        <div class="form-group <?= form_error('jenis_kelamin')? 'has-error' : null?>">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            </select>
                            <?php echo form_error('jenis_kelamin'); ?>
                        </div>
                        <div class="form-group <?= form_error('umur')? 'has-error' : null?>">
                            <label>Umur </label>
                            <input type="text" name="umur" value="<?=set_value('umur') ?>" class="form-control">
                            <?php echo form_error('umur'); ?>
                        </div>
                        <div class="form-group <?= form_error('tempat_lahir')? 'has-error' : null?>">
                            <label>Tempat Lahir </label>
                            <input type="text" name="tempat_lahir" value="<?=set_value('tempat_lahir') ?>" class="form-control">
                            <?php echo form_error('tempat_lahir'); ?>
                        </div>
                        <div class="form-group <?= form_error('tgl_lahir')? 'has-error' : null?>">
                            <label>Tanggal Lahir </label>
                            <input type="date" name="tgl_lahir" value="<?=set_value('tgl_lahir') ?>" class="form-control">
                            <?php echo form_error('tgl_lahir'); ?>
                        </div>
                        <div class="form-group <?= form_error('pekerjaan')? 'has-error' : null?>">
                            <label>Pekerjaan </label>
                            <input type="text" name="pekerjaan" value="<?=set_value('pekerjaan') ?>" class="form-control">
                            <?php echo form_error('pekerjaan'); ?>
                        </div>
                        <div class="form-group <?= form_error('no_hp')? 'has-error' : null?>">
                            <label>No Handphone </label>
                            <input type="text" name="no_hp" value="<?=set_value('no_hp') ?>" class="form-control">
                            <?php echo form_error('no_hp'); ?>
                        </div>
                        <div class="form-group <?= form_error('no_hp')? 'has-error' : null?>">
                            <label>Alamat </label>
                            <textarea id="editor" name="alamat" class="form-control"></textarea>
                            <?php echo form_error('alamat'); ?>
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