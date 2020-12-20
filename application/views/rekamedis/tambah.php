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
    			<h3 class="box-title">Rawat Jalan</h3>
    			<div class="pull-right">
    			<a href="<?php echo base_url('rawat_jalan') ?>" class="btn btn-primary btn-flat">
    				<i class="fa fa-undo"></i>
					Kembali
    			</a>
    			</div>
    		</div>
			<div class="box-body">
    		  <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="<?php echo base_url('rawat_jalan/add'); ?>" method="post">
                    <div class="form-group <?= form_error('no_rm')? 'has-error' : null?>">
                            <label>No Pendaftaran </label>
                            <input type="text" name="no_rm" value="<?= $no_rm; ?>" readonly="readonly" class="form-control">
                            <?php echo form_error('no_rm'); ?>
                        </div>
                        <div>
                            <label for="nama_pasien">Nama Pasien</label>
                        </div>
                        <div class="form-group input-group">
                          
                            
                            <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" required autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-pasien">
                                 <i class="fa fa-search-plus"></i>
                                </button>
                             </span>        
                        </div>
                        <div class="form-group <?= form_error('pasien_kd')? 'has-error' : null?>">
                            <label>Kode Pasien </label>
                            <input type="text" name="pasien_kd" readonly="" id="pasien_kd" class="form-control">
                            <?php echo form_error('pasien_kd'); ?>
                        </div>
                       
                        <div class="form-group <?= form_error('tanggal')? 'has-error' : null?>">
                            <label>Tanggal </label>
                            <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control">
                            <?php echo form_error('tanggal'); ?>
                        </div>
                       
                        <div class="form-group <?= form_error('dokter')? 'has-error' : null?>">
                            <label>Dokter</label>
                            <select name="dokter" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php foreach($dokter->result() as $d) { ?>
                            <option value="<?= $d->dokter_id ?>"><?= $d->nama_dokter ?></option>
                      
                            <?php } ?>
                            </select>
                            <?php echo form_error('dokter'); ?>
                        </div>
                        <div class="form-group <?= form_error('tensi')? 'has-error' : null?>">
                            <label>Tensi </label>
                            <input type="text" name="tensi" value="<?= set_value('tensi') ?>" class="form-control">
                            <?php echo form_error('tensi'); ?>
                        </div>
                        <div class="form-group <?= form_error('poli')? 'has-error' : null?>">
                            <label>Poli</label>
                            <select name="poli" id="poli" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php foreach($poli->result() as $p) { ?>
                            <option value="<?= $p->poli_id ?>"><?= $p->nama_poli ?></option>
                         
                         
                            <?php } ?>
                            </select>
                            <?php echo form_error('poli'); ?>
                        </div>
                        <div class="form-group <?= form_error('diagnosa')? 'has-error' : null?>">
                            <label>Diagnosa </label>
                         <textarea name="diagnosa" id="editor" class="form-control"></textarea>
                            <?php echo form_error('diagnosa'); ?>
                        </div>
                        <div class="form-group <?= form_error('nomor_kartu')? 'has-error' : null?>">
                            <label>No Kartu </label>
                            <input type="text" name="no_kartu" id="no_kartu" class="form-control">
                            <p>*Jika ada asuransi</p>
                            <?php echo form_error('nomor_kartu'); ?>
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

    <div class="modal fade" id="modal-pasien">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Data Pasien</h4>
               
              </div>
              <div class="modal-body">
              <a href="<?=base_url()?>pasien/add" class="btn btn-primary"><i class="fa fa-plus"></i> Daftar Pasien</a><hr>
              <table id="dataTables" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Kode Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Aksi</th>

                  </tr>
                </thead>
                <tbody>
                <?php foreach($pasien as $p => $data) { ?>
                 <tr>
                    <td><?php echo $data->pasien_kd ?></td>
                    <td><?php echo $data->nama_pasien ?></td>
                    <td><?php echo $data->jenis_kelamin ?></td>
                    <td><?php echo $data->usia ?> Thn</td>
                    <td>
                        <button class="btn btn-success btn-xs" id="pilih" data-kd="<?= $data->pasien_kd ?>" data-nama="<?= $data->nama_pasien ?>">
                            <i class="fa fa-check"> Pilih</i>
                        </button>
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
     