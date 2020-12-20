<link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> 
<title ><?= $title ?></title>
<section class="">
<div class="box-header">
  
  </div><hr>
     <h3 style="text-align:center;"><?= $title ?></h3>
        <p class="text-center">
            <strong>Data dari tanggal : <?= indo_date($_GET['dari'])?> || Sampai Tanggal : <?= indo_date($_GET['sampai']) ?></strong>
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
          <a href="<?= base_url('rawat_jalan/report') ?>" class="btn btn-primary btn-flat"> Kembali</a>
          </div>
        </div>
    	</div>
    </section>
    <script type="text/javascript">
          window.print();
   </script>