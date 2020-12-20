<section class="content">
    
      <div class="row">
    		<div class="col-xs-6">
        <div class="box">
        <div class="box-header">
    			<h3 class="box-title">Tambah Poli</h3>
    		</div>
    		
    
			<div class="box-body">
    		  <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="<?= base_url('poli/add')?>" method="post">
                        <div class="form-group <?= form_error('nama_poli')? 'has-error' : null?>">
                            <label>Nama Poli </label>
                            <input type="text" name="nama_poli" value="<?=set_value('nama_poli') ?>" class="form-control">
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
                  <th>Nama Poli</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach($row->result() as $data) { ?>
                <tr>
                  <td><?php echo  $no++; ?></td>
                  <td><?php echo  $data->nama_poli ?></td>
              
                  <td class="text-center" width="160px">
                  <form action="<?=site_url('poli/hapus')?>" method="post">
                  <a href="<?php echo base_url('poli/edit/'.$data->poli_id) ?>" class="btn btn-info btn-flat"><i class="fa fa-edit"></i>Edit</a>
		    			  	<button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" name="poli_id" value="<?=$data->poli_id?>" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i>Hapus</button>
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

