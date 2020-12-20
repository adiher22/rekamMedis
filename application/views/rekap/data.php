<section class="content">
      <div class="row">
        <div class="col-xs-12">
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
            <a href="<?=base_url()?>rekapitulasi/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            <a href="<?=base_url()?>rekapitulasi/report" class="btn btn-success"><i class="fa fa-calendar-minus-o"></i> Laporan Data Rekap</a>
           
           <div class="pull-right">
           <strong id="total" style="font-size: xx-large; text-align: center;">Budget Klinik : <?= indo_curency($budget->jumlah_budget) ?></strong>
            </div><hr>
            <div class="form-group">
                <label>Filter Tanggal:</label>

                <div class="input-group date col-md-2">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Input</th>
                  <th>Jenis Pendapatan</th>
                  <th>Laporan Pendapatan</th>
                  <th>Jenis Pengeluaran</th>
                  <th>Laporan Pengeluaran</th>
                  <th>Rekapitulasi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach($row->result() as $data) { ?>
                <tr>
                  <td><?php echo  $no++; ?></td>
                  <td><?php echo  indo_date($data->tgl_input) ?></td>
                  <td><?php echo  $data->jenis_pendapatan ?></td>
                  <td><span class="label label-success"><?php echo  indo_curency($data->lap_pendapatan) ?></span></td>
                  <td><?php echo  $data->jenis_pengeluaran ?></td>
                  <td><span class="label label-danger"><?php echo  indo_curency($data->lap_pengeluaran) ?></span></td>
                  <td><?php echo  indo_curency($data->jml_rekap)?></td>
                  <td class="text-center" width="100px">
                  <form action="<?=site_url('rekapitulasi/hapus')?>" method="post">
		    	  <button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" name="rekapitulasi_id" value="<?=$data->rekapitulasi_id?>" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i> Hapus</button>
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