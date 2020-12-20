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
    <div class="row">
    <div class="col-sm-6">
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title">Edit Dokter</h3>
    			<div class="pull-right">
    			<a href="<?php echo base_url('dokter') ?>" class="btn btn-primary btn-flat">
    				<i class="fa fa-undo"></i>
					Kembali
    			</a>
    			</div>
    		</div>
			<div class="box-body">
    		  <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama_obat')? 'has-error' : null?>">
                            <label>Nama </label>
                            <input type="hidden" name="dokter_id" value="<?= $row->dokter_id ?>">
                            <input type="text" name="nama_dokter" value="<?=$this->input->post('nama_dokter') ?$this->input->post('nama_dokter') : $row->nama_dokter?>" class="form-control">
                            <?php echo form_error('nama_dokter'); ?>
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
                          
                        <div class="form-group <?= form_error('spesialis')? 'has-error' : null?>">
                            <label>Spesialis </label>
                           
                            <input type="text" name="spesialis" value="<?=$this->input->post('spesialis') ?$this->input->post('spesialis') : $row->spesialis?>" class="form-control">
                            <?php echo form_error('spesialis'); ?>
                         
                        </div>
                        <div class="form-group <?= form_error('fee_dokter')? 'has-error' : null?>">
                            <label>Fee Dokter </label>
                           
                            <input type="number" name="fee_dokter" value="<?=$this->input->post('fee_dokter') ?$this->input->post('fee_dokter') : $row->fee_dokter?>" class="form-control">
                            <?php echo form_error('fee_dokter'); ?>
                         
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
         </div>
    	</div>
    </section>