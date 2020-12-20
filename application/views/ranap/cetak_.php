<!-- Content Header (Page header) -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
 <title><?= $title ?></title>
 <style type="tex/css" media="print">
 table {
			border: solid thin #000;
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 1cm;
		}
    th {
			padding: 6px 12px;
			border: solid thin #000;
			text-align: left;
		}
		td {
			padding: 6px 12px;
			border: solid thin #000;
			text-align: left;
		}
 
 </style> 
<body>
    

<section class="">
<div class="box-header">
  
  </div><hr>
     <h3 style="text-align:center;"><?= $title ?></h3>
        <p class="text-center">
            <strong>Data dari tanggal : <?= indo_date($_GET['dari'])?> || Sampai Tanggal : <?= indo_date($_GET['sampai']) ?></strong>
          </p>
       
        <div class="box-body">
          <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="bg-info">
            <tr>
                  <th>No</th>
                  <th>No Pendaftaran</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal</th>
                  <th>Dokter</th>
                  <th >No Kamar</th>
                  <th>Status</th>
                  <th style="text-align:center;">Total Harga</th>
                
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
                        <td> <?= indo_date($data->tanggal_inap) ?>
                        </td>  
                        <td><?= $data->nama_dokter ?></td>
                        <td><?= $data->no_kamar ?></td> 
                        <td><span class="label label-success"><?= $data->status_pasien ?></span></td>
                        <td style="text-align: center;"><?= indo_curency($data->harga_total) ?></td>
                       
                        </tr> 
                        <?php } ?>
                        <tr>
                        <td colspan="6">
                          <p class="text-center">
                          <span style="font-weight: bold; font-size: 18px;">Total Pendapatan Rawat Inap : </span>
                            </p>
                          </td>
                          <td colspan="2" style="text-align: center;">
                          <!-- <p class="text-center"> -->
                          <span style="font-weight: bold; font-size: 18px;"><?= indo_curency($grand_total) ?>,-</span>
                            <!-- </p> -->
                        </td>
                      </tr>
          </tbody>
          </table>
          <a href="<?= base_url('rawat_inap/report') ?>" class="btn btn-primary btn-flat"> Kembali</a>
          </div>
        </div>
    	</div>
    </section>
    </body>
    <script type="text/javascript">
          window.print();
   </script>