<link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> 
<title ><?= $title ?></title> 
    <div class="box-header">
    <center><h1><?= $title ?></h1></center>
    </div><hr>
    
     <div class="box-body">
         <p class="text-center">
            <strong>Data dari tanggal : <?= indo_date($_GET['awal'])?> || Sampai Tanggal : <?= indo_date($_GET['akhir']) ?></strong>
          </p>
            <table id="" class="table table-bordered table-hover">
              <thead>
              <tr class="bg-info">
                <th>No</th>
                <th>Tanggal Input</th>
                <th>Jenis Pendapatan</th>
                <th>Laporan Pendapatan</th>
                <th>Jenis Pengeluaran</th>
                <th>Laporan Pengeluaran</th>
                <th>Rekapitulasi</th>
              
              </tr>
              </thead>
              <tbody>
              <?php 
              $total_pendapatan = 0;
              $total_pengeluaran = 0;
              $total_rekapitulasi = 0;
              $no = 1; foreach($report as $data) {
              $total_pendapatan += $data->lap_pendapatan; 
              $total_pengeluaran += $data->lap_pengeluaran;
              $total_rekapitulasi += $data->jml_rekap;  ?>
              
              <tr>
                <td><?php echo  $no++; ?></td>
                <td><?php echo  indo_date($data->tgl_input) ?></td>
                <td><?php echo  $data->jenis_pendapatan ?></td>
                <td><span class="label label-success"><?php echo  indo_curency($data->lap_pendapatan) ?></span></td>
                <td><?php echo  $data->jenis_pengeluaran ?></td>
                <td><span class="label label-danger"><?php echo  indo_curency($data->lap_pengeluaran) ?></span></td>
                <td><?php echo  indo_curency($data->jml_rekap)?></td>
               
              </tr>
              <?php } ?>
             <tr>
                <td colspan="3">
                   <p class="text-center">
                  <span style="font-weight: bold; font-size: 18px;">Total Pendapatan : </span>
                    </p>
                  </td>
                  <td colspan="4">
                  <!-- <p class="text-center"> -->
                  <span style="font-weight: bold; font-size: 18px;"><?= indo_curency($total_pendapatan) ?></span>
                    <!-- </p> -->
                </td>
             </tr>
             <tr>
             <td colspan="5">
                    <p class="text-center">
                  <span style="font-weight: bold; font-size: 18px; ">Total Pengeluaran : </span>
                    </p>
                  </td>
                  <td colspan="2">
                  <!-- <p class="text-center"> -->
                  <span style="font-weight: bold; font-size: 18px; "><?= indo_curency($total_pengeluaran) ?></span>
                  <!-- </p> -->
                  </td>
             </tr>
                 <tr>
                 
                  <td colspan="6">
                  <p class="text-center">
                   <span style="font-weight: bold; font-size: 18px; ">Total Rekapitulasi : </span>
                  </p>
                  </td>
                  <td>
                  <!-- <p class="text-center"> -->
                  <span style="font-weight: bold; font-size: 18px; "><?= indo_curency($total_rekapitulasi) ?></span>
                  <!-- </p> -->
                  </td>
               </tr>
     
            </table>
          </div>
          <a href="<?= base_url('rekapitulasi/report') ?>" class="btn btn-primary btn-flat"> Kembali</a>
          <script type="text/javascript">
          window.print();
          </script>