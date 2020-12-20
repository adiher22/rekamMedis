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
    			<h3 class="box-title">Edit Poli</h3>
    			<div class="pull-right">
    			<a href="<?php echo base_url('poli') ?>" class="btn btn-primary btn-flat">
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
                            <input type="hidden" name="poli_id" value="<?= $row->poli_id ?>">
                            <input type="text" name="nama_poli" value="<?=$this->input->post('nama_poli') ?$this->input->post('nama_poli') : $row->nama_poli?>" class="form-control">
                            <?php echo form_error('nama_poli'); ?>
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