<section class="content">
    
      <div class="row">
    		<div class="col-xs-6">
        <div class="box">
        <div class="box-header">
    			<h3 class="box-title">Tambah Obat</h3>
    		</div>
    		
    
			<div class="box-body">
    		  <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="<?= base_url('obat/add')?>" method="post">
                        <div class="form-group <?= form_error('nama_obat')? 'has-error' : null?>">
                            <label>Nama </label>
                            <input type="text" name="nama_obat" value="<?=set_value('nama_obat') ?>" class="form-control">
                            <?php echo form_error('nama_obat'); ?>
                        </div>
                        <div class="form-group <?= form_error('stok')? 'has-error' : null?>">
                            <label>Stok </label>
                            <input type="text" name="stok" value="<?=set_value('stok') ?>" class="form-control">
                            <?php echo form_error('stok'); ?>
                        </div>
                        <div class="form-group <?= form_error('harga')? 'has-error' : null?>">
                            <label>Harga </label>
                            <input type="text" name="harga" value="<?=set_value('harga') ?>" class="form-control">
                            <?php echo form_error('harga'); ?>
                        </div>
                        
                        <div class="form-group">
                           <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
                           <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-times"></i> Reset</button>
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
                  <th>Nama Obat</th>
                  <th>Stok Obat</th>
                  <th>Harga Obat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach($row->result() as $data) { ?>
                <tr>
                  <td><?php echo  $no++; ?></td>
                  <td><?php echo  $data->nama_obat ?></td>
                  <?php if($data->stok > 15 || $data->stok==15) {  ?>
                  <td><span class="label label-success"><?php echo  $data->stok ?></span></td>
                  <?php } ?>
                  <?php if($data->stok < 10 || $data->stok==10) {  ?>
                  <td><span class="label label-warning"><?php echo  $data->stok ?></span></td>
                  <?php } ?>
                
                  <td><?php echo indo_curency($data->harga) ?></td>
                  <td class="text-center" width="160px">
                  <form action="<?=site_url('obat/hapus')?>" method="post">
                  <a href="<?php echo base_url('obat/edit/'.$data->obat_id) ?>" class="btn btn-info btn-flat"><i class="fa fa-edit"></i>Edit</a>
		    			  	<button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" name="obat_id" value="<?=$data->obat_id?>" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i>Hapus</button>
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

