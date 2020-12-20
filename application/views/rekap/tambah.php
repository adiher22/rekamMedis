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
    			<h3 class="box-title">Tambah Rekapitulasi</h3>
    			<div class="pull-right">
    			<a href="<?php echo base_url('rekapitulasi') ?>" class="btn btn-primary btn-flat">
    				<i class="fa fa-undo"></i>
					Kembali
    			</a>
    			</div>
    		</div>
			<div class="box-body">
    		  <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="<?php echo base_url('rekapitulasi/add'); ?>" method="post">
                     
                    <div>
                            <label for="jenis_pendapatan">Jenis Pendapatan</label>
                   </div>
                     <div class="form-group input-group">
                          
                            <input type="hidden" name="budget_id" value="<?= $budget->budget_id ?>">
                            <input type="text" name="jenis_pendapatan" id="jenis_pendapatan" class="form-control" >
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal-pendapatan">
                                 <i class="fa fa-search-plus"></i>
                                </button>
                             </span>        
                        </div>
                        
                        <div class="form-group <?= form_error('lap_pendapatan')? 'has-error' : null?>">
                            <label>Laporan Pendapatan </label>
                            <input type="text" name="lap_pendapatan" id="lap_pendapatan" value="" class="form-control">
                            <?php echo form_error('lap_pendapatan'); ?>
                            <p>* Isi dengan angka</p>
                        </div>
                        <div class="form-group <?= form_error('jenis_pengeluaran')? 'has-error' : null?>">
                            <label>Jenis Pengeluaran </label>
                            <input type="text" name="jenis_pengeluaran" id="jenis_pengeluaran" value="<?=set_value('jenis_pengeluaran') ?>" class="form-control">
                            <?php echo form_error('jenis_pengeluaran'); ?>
                            <p>* Isi dengan huruf</p>
                        </div>
                        <div class="form-group <?= form_error('lap_pengeluaran')? 'has-error' : null?>">
                            <label>Laporan Pengeluaran </label>
                            <input type="text" name="lap_pengeluaran" id="lap_pengeluaran" value="<?=set_value('lap_pengeluaran') ?>" class="form-control">
                            <?php echo form_error('lap_pengeluaran'); ?>
                            <p>* Isi dengan Angka</p>
                        </div>
                        <div class="form-group <?= form_error('tgl_input')? 'has-error' : null?>">
                            <label>Tanggal Input </label>
                            <input type="date" name="tgl_input" value="<?= date('Y-m-d') ?>" class="form-control">
                            <?php echo form_error('tgl_input'); ?>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
                           <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-times"></i> Reset</button>
                        </div>
                    </form>
                </div>      
              </div>
    		</div>
    	</div>
    </section>

    <div class="modal fade" id="modal-pendapatan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Data Rekamedis</h4><br>
                <div class="form-group">
                <label>Tanggal:</label>

                <div class="input-group date col-md-4">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            
              </div>
              <div class="modal-body">
             
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>No Rekamedis</th>
                    <th>Tanggal</th>
                    
                    <th>Total Harga</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                <?php foreach($rekap as $p => $data) {
                 if($data->status=="Selesai Bayar" || $data->status_pasien=="Selesai Bayar") {  ?>

                 <tr>
                    <td><?php echo $data->no_rm ?></td>
                    <?php if($data->tgl_periksa==null){ ?>
                    <td><?php echo indo_date($data->tanggal_inap) ?></td>
                    <?php }else{ ?>
                    <td><?php echo indo_date($data->tgl_periksa) ?></td>
                    <?php } ?>
                   
                    <td><?php echo indo_curency($data->harga_total) ?> </td>
                    <td>
                        <button class="btn btn-success btn-xs" id="pilih-rekap" data-norm="<?= $data->no_rm ?>" data-rawat_jalan="Pasien Rawat Jalan" data-tgl_periksa="<?= $data->tgl_periksa ?>" data-tgl_ranap="<?= $data->tanggal_inap ?>" data-ranap="Pasien Rawat Inap"  data-total="<?= $data->harga_total ?>">
                            <i class="fa fa-check"> Pilih</i>
                        </button>
                    </td>
                 </tr>
                <?php } } ?>
                </tbody>                

              </table>
              </div>
  
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->