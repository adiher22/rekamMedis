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
            <a href="<?=base_url()?>rawat_jalan/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a><hr>
              <table id="dataTables" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No RM</th>
                  <th>Kode Pasien</th>
                  <th>Nama Pasien</th>
                  <th>Dokter</th>
                  <th>Tensi Darah</th>
                  <th>Status</th>
                  <th>Poli</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach($row->result() as $data) { ?>
                <tr>
                  <td><?php echo  $no++; ?></td>
                  <td><?php echo  $data->no_rm ?></td>
                  <td><?php echo  $data->pasien_kd ?></td>
                  <td><?php echo  $data->nama_pasien ?></td>
                  <td><?php echo  $data->nama_dokter ?></td>
                  <td><?php echo  $data->tensi_darah ?></td>
                  <?php if($data->status=="Periksa") { ?>
                  <td><a href="<?=site_url('rawat_jalan/pembayaran/'.$data->no_rm) ?>" class="btn btn-success btn-xs" ><?php echo  $data->status ?></a></td>
                  <?php }else if($data->status=="Antrian"){ ?>
                  <td><a href="<?=site_url('rawat_jalan/periksa/'.$data->no_rm) ?>" class="btn btn-success btn-xs" ><?php echo  $data->status ?></a></td>
                  <?php }else if($data->status=="Selesai Bayar"){ ?>
                  <td><a href="" disabled class="btn btn-danger btn-xs" ><?php echo  $data->status ?></a></td>
                  <?php }else{ ?>
                  <td><a href="<?=site_url('pembayaran/add_/'.$data->no_rm) ?>" class="btn btn-primary btn-xs" ><?php echo  $data->status ?></a></td>
                  <?php } ?>
                  <td><?php echo  $data->nama_poli ?></td>
                  <td><?php echo  indo_date($data->tgl_periksa) ?></td>
                  <td class="text-center" width="160px">
                  <?php if($data->status=="Periksa") { ?>
                    <a href="<?=base_url('rawat_inap/add_/'.$data->no_rm) ?>" class="btn btn-warning btn-flat"><i class="fa fa-hotel"></i> Rawat</a>
                  <?php }else if($data->status=="Pembayaran") { ?>
                     <a href="<?=base_url('pembayaran/add_/'.$data->no_rm) ?>" class="btn btn-info btn-flat"><i class="fa fa-credit-card"></i> Bayar</a>
                  <?php } else if($data->status=="Selesai Bayar") { ?>
                    <a href="<?=base_url('pembayaran/cetak/'.$data->no_rm) ?>" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak</a>
                  <?php }else{ ?>
                  <form action="<?=site_url('rawat_jalan/hapus')?>" method="post">
		    			  	<button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" name="rekamedis_id" value="<?=$data->no_rm?>" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i>Hapus</button>
                  <?php } ?>
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