<section class="content">
    
      <div class="row">
    		<div class="col-xs-6">
        <div class="box">
        <div class="box-header">
    			<h3 class="box-title">Tambah Dokter</h3>
    		</div>
    		
    
			<div class="box-body">
    		  <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="<?= base_url('dokter/add')?>" method="post">
                        <div class="form-group <?= form_error('nama_dokter')? 'has-error' : null?>">
                            <label>Nama Dokter</label>
                            <input type="text" name="nama_dokter" value="<?=set_value('nama_dokter') ?>" class="form-control">
                            <?php echo form_error('nama_dokter'); ?>
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
                        <div class="form-group <?= form_error('no_hp')? 'has-error' : null?>">
                            <label>No Handphone </label>
                            <input type="number" name="no_hp" value="<?=set_value('no_hp') ?>" class="form-control">
                            <p>* No HP boleh kosong</p>
                            <?php echo form_error('no_hp'); ?>
                        </div>
                        <div class="form-group <?= form_error('spesialis')? 'has-error' : null?>">
                            <label>Spesialis </label>
                            <input type="text" name="spesialis" value="<?=set_value('spesialis') ?>" class="form-control">
                            <?php echo form_error('spesialis'); ?>
                        </div>
                        <div class="form-group <?= form_error('fee_dokter')? 'has-error' : null?>">
                            <label>Fee Dokter </label>
                            <input type="number" name="fee_dokter" value="<?=set_value('fee_dokter') ?>" class="form-control">
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
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $title ?></h3>
            <?php if($this->session->flashdata('sukses')) { ?>
            <div class="callout callout-success">
                   
            <h4><?php echo $this->session->flashdata('sukses') ?></h4>
            </div>
            <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
              <table id="dataTables" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dokter</th>
                  <th>Jenis Kelamin</th>
                  <th>Spesialis</th>
                  <th>Fee Dokter</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach($row->result() as $data) { ?>
                <tr>
                  <td><?php echo  $no++; ?></td>
                  <td><?php echo  $data->nama_dokter ?></td>
                  <td><?php echo  $data->jenis_kelamin ?></td>
                  <td><?php echo  $data->spesialis ?></td>
                  
                  <td><?php echo indo_curency($data->fee_dokter) ?></td>
                  <td class="text-center" width="160px">
                  <form action="<?=site_url('dokter/hapus')?>" method="post">
                  <a href="<?php echo base_url('dokter/edit/'.$data->dokter_id) ?>" class="btn btn-info btn-flat"><i class="fa fa-edit"></i></a>
		    			  	<button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" name="dokter_id" value="<?=$data->dokter_id?>" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i></button>
                  </form>
		    				</td>
                </tr>
                <?php } ?>
               
            
              </table>
            </div>
            <!-- /.box-body -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>

