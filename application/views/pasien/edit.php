<!-- Content Header (Page header) -->
<section class="content-header">
      <!-- <h1><i class="fa fa-user"></i>
        Dokter
       <small>Data Dokter</small> -->
       
      <!-- </h1>
     <ol class="breadcrumb">
     	<li><a href=""><i class="fa fa-dashboard"></i></a></li>
     	<li class="active">Obat</li>
     </ol> -->
    </section>
   
    <!-- Main Content -->
    <section class="content">
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title">Edit Pasien</h3>
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
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama_pasien')? 'has-error' : null?>">
                            <label>Nama </label>
                            <input type="hidden" name="kd_pasien" value="<?= $row->pasien_kd ?>">
                            <input type="text" name="nama_pasien" value="<?=$this->input->post('nama_pasien') ?$this->input->post('nama_pasien') : $row->nama_pasien?>" class="form-control">
                            <?php echo form_error('nama_pasien'); ?>
                        </div>
                        <div class="form-group <?= form_error('jenis_kelamin')? 'has-error' : null?>">
                            <label>Jenis Kelamin </label>
                            <select name="jenis_kelamin" class="form-control">
                                <?php $jeniskel = $this->input->post('jenis_kelamin') ? $this->input->post('jenis_obat') : $row->jenis_kelamin ?>
                                <option value="Laki-laki" <?=$jeniskel == "Laki-laki" ? "selected" : null ?>>Laki-laki</option>
                                <option value="Perempuan" <?=$jeniskel == "Perempuan" ? "selected" : null ?>>Perempuan</option>
                           
                            <?php echo form_error('jenis_kelamin'); ?>
                           </select>
                        </div>
                        <div class="form-group <?= form_error('umur')? 'has-error' : null?>">
                            <label>Umur </label>
                           
                            <input type="text" name="umur" value="<?=$this->input->post('umur') ?$this->input->post('umur') : $row->usia?>" class="form-control">
                            <?php echo form_error('umur'); ?>
                           
                        </div>
                        <div class="form-group <?= form_error('tempat_lahir')? 'has-error' : null?>">
                            <label>Tempat Lahir </label>
                           
                            <input type="text" name="tempat_lahir" value="<?=$this->input->post('tempat_lahir') ?$this->input->post('tempat_lahir') : $row->tempat_lahir?>" class="form-control">
                            <?php echo form_error('tempat_lahir'); ?>
                            
                        </div>
                        <div class="form-group <?= form_error('tgl_lahir')? 'has-error' : null?>">
                            <label>Tanggal Lahir </label>
                           
                            <input type="date" name="tgl_lahir" value="<?=$this->input->post('tgl_lahir') ?$this->input->post('tgl_lahir') : $row->tgl_lahir?>" class="form-control">
                            <?php echo form_error('tgl_lahir'); ?>
                         
                        </div>
                        <div class="form-group <?= form_error('pekerjaan')? 'has-error' : null?>">
                            <label>Pekerjaan </label>
                           
                            <input type="text" name="pekerjaan" value="<?=$this->input->post('pekerjaan') ?$this->input->post('pekerjaan') : $row->pekerjaan?>" class="form-control">
                            <?php echo form_error('pekerjaan'); ?>
                         
                        </div>
                        <div class="form-group <?= form_error('no_hp')? 'has-error' : null?>">
                            <label>No Handphone </label>
                           
                            <input type="text" name="no_hp" value="<?=$this->input->post('no_hp') ?$this->input->post('no_hp') : $row->no_hp?>" class="form-control">
                            <?php echo form_error('no_hp'); ?>
                         
                        </div>
                        <div class="form-group <?= form_error('no_hp')? 'has-error' : null?>">
                            <label>Alamat </label>
                            <textarea name="alamat" id="editor" class="form-control"><?=$this->input->post('alamat') ?$this->input->post('alamat') : $row->alamat?></textarea>
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