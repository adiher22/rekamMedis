<!-- Content Header (Page header) -->
<section class="content-header">
      <h1><i class="fa fa-calendar"></i>
        
     
       
      </h1>
     <ol class="breadcrumb">
     	<li><a href=""><i class="fa fa-dashboard"></i></a></li>
     	<li class="active">Data Laporan</li>
     </ol>
    </section>
   
    <!-- Main Content -->
    <section class="content">
    	<div class="box">
    		<div class="box-header">
          <div class="col-md-2 col-md-offset">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="<?php echo base_url('rawat_jalan/report'); ?>" method="post">
                       <div class="form-group <?= form_error('dari')? 'has-error' : null?>">
                            <label> Dari</label>
                            <input type="date" name="dari" value="<?=set_value('dari') ?>" class="form-control">
                            <?php echo form_error('dari'); ?>
                        </div>
                        <div class="form-group <?= form_error('sampai')? 'has-error' : null?>">
                            <label> Sampai</label>
                            <input type="date" name="sampai" value="<?=set_value('sampai') ?>" class="form-control">
                            <?php echo form_error('sampai'); ?>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i> Cari</button>
                        </div>
                    </form>
           </div>
    		</div>
        <div class="box">
        <h3 style="text-align: center; font-weight: bold; font-size: 30px;"><?= $title ?></h3>
        <div class="pull-right">
            <a href="<?= base_url('rawat_jalan/cetak/'.'?dari='.set_value('dari').'&sampai='.set_value('sampai')) ?>" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-print"></i> Cetak</a>
            <a href="<?= base_url('rawat_jalan/cetak_pdf/'.'?dari='.set_value('dari').'&sampai='.set_value('sampai')) ?>) ?>" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-file-pdf-o"></i> PDF</a>
            
        </div>
        </div><br>
        <p class="text-center">
            <strong>Data dari tanggal : <?= indo_date($_POST['dari'])?> || Sampai Tanggal : <?= indo_date($_POST['sampai']) ?></strong>
          </p>
       
        <div class="box-body">
          <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
                  <th>No</th>
                  <th>No Pendaftaran</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal</th>
                  <th>Dokter</th>
                  <th>Poli</th>
                  <th>Status</th>
                  <th>Total Harga</th>
                
                </tr>
            </thead>
          <tbody>
            <?php $no = 1;
                  $grand_total = 0;
                        foreach($report->result() as $data) {
                          $grand_total += $data->harga_total; 
                         ?>
                        <tr>
                        
                        <td><?php echo  $no++; ?></td>
                        <td><?php echo  $data->no_rm ?></td>
                        <td><?php echo  $data->nama_pasien ?></td>
                        <td> <?= indo_date($data->tgl_periksa) ?>
                        </td>  
                        <td><?= $data->nama_dokter ?></td>
                        <td><?= $data->nama_poli ?></td> 
                        <td><span class="label label-success"><?= $data->status ?></span></td>
                        <td><?= indo_curency($data->harga_total) ?></td>
                       
                        </tr> 
                        <?php } ?>
                        <tr>
                        <td colspan="7">
                          <p class="text-center">
                          <span style="font-weight: bold; font-size: 18px;">Total Pendapatan Rawat Jalan : </span>
                            </p>
                          </td>
                          <td>
                          <!-- <p class="text-center"> -->
                          <span style="font-weight: bold; font-size: 18px;"><?= indo_curency($grand_total) ?>,-</span>
                            <!-- </p> -->
                        </td>
                      </tr>
          </tbody>
          </table>
          </div>
        </div>
    	</div>
    </section>