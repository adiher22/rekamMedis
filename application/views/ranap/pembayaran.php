
<section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $title ?></h3>
          
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-bed"> Kepada Pasien : <?= $rm->nama_pasien ?></i> 
                <small class="pull-right"></small>
              </h2>
            </div>
         
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="col-sm-4 invoice-col">
            <b>No Rekamedis : <?= $rm->no_rm ?></b><br>
            <br>
            <b>Kode Pasien:</b> <?= $rm->pasien_kd ?><br>
            
            <b>Diperiksa oleh:</b> <?= $rm->nama_dokter ?>
          </div>
          <!-- /.col -->
         <!-- info row -->
           <div class="col-sm-4 invoice-col">
            <b>Diagnosa : <?= $rm->diagnosa ?></b><br>
         
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
          
            </div>
            <!-- /.box-body -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
                    <form action="<?= base_url('pembayaran/add_obat_ranap/'.$rm->no_rm)?>" method="post">
                        
                            <input type="hidden" name="no_rm" value="<?= $rm->no_rm ?>" class="form-control">
                            <input type="hidden" name="obat_id" id="obat_id"  class="form-control">
                        <div>
                            <label for="nama_pasien">Nama Obat</label>
                        </div>
                        <div class="form-group input-group">
                          
                            
                            <input type="text" name="nama_obat" id="nama_obat" class="form-control" autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal-obat">
                                 <i class="fa fa-search-plus"></i>
                                </button>
                             </span>        
                        </div>
                        <div class="form-group <?= form_error('harga')? 'has-error' : null?>">
                            <label>Harga </label>
                            <input type="text" readonly name="harga" id="harga" value="<?=set_value('harga') ?>" class="form-control">
                            <?php echo form_error('harga'); ?>
                        </div>
                        <div class="form-group <?= form_error('jumlah')? 'has-error' : null?>">
                            <label>Jumlah </label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control">
                            <?php echo form_error('jumlah'); ?>
                        </div>
                        <div class="form-group <?= form_error('total')? 'has-error' : null?>">
                            <label>Total </label>
                            <input type="text" name="total" id="total" readonly class="form-control">
                       
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
              <h3 class="box-title">Data Obat Resep</h3>
            <?php if($this->session->flashdata('sukses')) { ?>
            <div class="callout callout-success">
                   
            <h4><?php echo $this->session->flashdata('sukses') ?></h4>
            </div>
            <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
              <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Obat</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                
                <?php 
                $no = 1; foreach($robat->result() as $data) {
                 ?>
                <tr>
                  <td><?php echo  $no++; ?></td>
                  <td><?php echo  $data->nama_obat ?></td>   
                  <td><?php echo  $data->harga ?></td>
                  <td><?php echo  $data->jumlah ?></td>
                  <td><?php echo  $data->total ?></td>
                </tr>
                <?php  }?>
               
            
              </table>
            </div>
            <!-- /.box-body -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </section>
      <section class="center">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transaksi Total Pembayaran</h3>
          
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
              <form action="<?= base_url('pembayaran/add_bayar/'.$rm->no_rm)?>" method="post">
                <small class="pull-right"></small>
              </h2>
            </div>
         
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="col-sm-4 invoice-col">
          <div class="form-group">
          <label>Fee Dokter </label>
          <input type="text" name="fee_dokter" readonly value="<?= $rm->fee_dokter ?>" class="form-control">
          <input type="hidden" name="no_rm" value="<?= $rm->no_rm ?>">
           </div>
          </div>
          <!-- /.col -->
         <!-- info row -->
           <div class="col-sm-4 invoice-col">
           <div class="form-group">
           <label>Fee Admin </label>
          <input type="text" name="fee_admin"  readonly value="15000" class="form-control">
          </div>
         
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
          <div class="form-group">
          <label>Total Harga Obat </label>
          <input type="text" name="total_obat" readonly value="<?= $total_obat['total_obat'] ?>" class="form-control">
    
         </div>
         <div class="form-group">
             <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                 
          </div>
          </div>
        </div>
        
      </section>
  
 
  <div class="modal fade" id="modal-obat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Data Obat</h4>
               
              </div>
              <div class="modal-body">
              <a href="<?=base_url()?>obat/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Obat</a><hr>
              <table id="dataTables" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach($obat->result() as $o => $data) { ?>
                 <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data->nama_obat ?></td>
                    <td><?php echo $data->stok ?></td>
                    <td><?php echo $data->harga ?></td>
                  
                    <td>
                    <?php if($data->stok==0){ ?>
                      <button class="btn btn-danger btn-xs" disabled>
                            <i class="fa fa-minus-square"> Stok Habis</i>
                        </button>
                    <?php }else{ ?>
                        <button class="btn btn-success btn-xs" id="pilih_obat" data-obat_id="<?= $data->obat_id ?>" data-nama_obat="<?= $data->nama_obat ?>" data-harga="<?= $data->harga ?>">
                            <i class="fa fa-check"> Pilih</i>
                        </button>
                    <?php } ?>
                    </td>
                 </tr>
                <?php } ?>
                </tbody>                

              </table>
              </div>
  
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->