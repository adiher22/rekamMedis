
<section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $title ?></h3>
          
            </div><hr>
            <!-- /.box-header -->
     <div class="box-body">
       <form action="<?= base_url()?>rekapitulasi/report" method="post">
         <!-- info row -->
           <div class="col-sm-2 invoice-col">
           <div class="form-group <?= form_error('awal') ? 'has-error' : null?>">
           <label>Dari Tanggal : </label>
           <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="awal" class="form-control" placeholder="dd-mm-yyyy">
            </div>
            <?php echo form_error('awal') ?>
          </div>
          
          </div>
          <!-- /.col -->
          <div class="col-sm-2 invoice-col">
          <div class="form-group <?= form_error('akhir') ? 'has-error' : null?>">
           <label>Sampai Tanggal : </label>
           <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="akhir" class="form-control" placeholder="dd-mm-yyyy">

            </div>
            <?php echo form_error('akhir') ?>
          </div>
          
          </div>
          <div class="col-sm-2 invoice-col">
         <div class="form-group">
         <label>Cari : </label>
         <div class="input-group">
         <i class=""></i>
           </div>
             <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Cari</button>
         
          </div>
          </div>
       </form>
       </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <p class="text-center">
            <strong>Data dari tanggal : <?= indo_date($_POST['awal'])?> || Sampai Tanggal : <?= indo_date($_POST['akhir']) ?></strong>
            </p>
            <div class="pull-right">
            <a href="<?= base_url('rekapitulasi/cetak/'.'?awal='.set_value('awal').'&akhir='.set_value('akhir')) ?>" target="_blank" class="btn btn-primary btn-flat"><i class="fa fa-print"></i> Cetak</a>
            <a href="<?= base_url('rekapitulasi/cetak_pdf/'.'?awal='.set_value('awal').'&akhir='.set_value('akhir')) ?>) ?>" target="_blank" class="btn btn-success btn-flat"><i class="fa fa-file-pdf-o"></i> PDF</a>
            
            </div><br><hr>
               
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
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
                    <span style="font-weight: bold; font-size: 18px;">Total Pendapatan : </span>
                    </td>
                    <td colspan="4">
                    <span style="font-weight: bold; font-size: 18px;"><?= indo_curency($total_pendapatan) ?></span>
                  </td>
               </tr>
               <tr>
               <td colspan="5">
                    <span style="font-weight: bold; font-size: 18px; ">Total Pengeluaran : </span>
                    </td>
                    <td colspan="2">
                    <span style="font-weight: bold; font-size: 18px; "><?= indo_curency($total_pengeluaran) ?></span>
                    </td>
               </tr>
                   <tr>
                   
                    <td colspan="6">
                     <span style="font-weight: bold; font-size: 18px; ">Total Rekapitulasi : </span>
                    </td>
                    <td colspan="1">
                    <span style="font-weight: bold; font-size: 18px; "><?= indo_curency($total_rekapitulasi) ?></span>
                    </td>
                 </tr>
       
              </table>
            </div>
            <!-- /.box-body -->               

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>