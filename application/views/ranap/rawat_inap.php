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
            <hr><br>
              <table id="dataTables" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No RM</th>
                
                  <th>Nama Pasien</th>
                  <th>Dokter</th>
                  <th>status_pasien</th>
                  <th>No Kamar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach($row->result() as $data) { ?>
                <tr>
                  <td><?php echo  $no++; ?></td>
                  <td><?php echo  $data->no_rm ?></td>
                  <td><?php echo  $data->nama_pasien ?></td>
                  <td><?php echo  $data->nama_dokter ?></td>
                
                  <?php if($data->status_pasien=="Dirawat") { ?>
                  <td><a href="<?=site_url('rawat_inap/pembayaran/'.$data->no_rm) ?>" class="btn btn-success btn-xs" ><?php echo  $data->status_pasien ?></a></td>
                  <?php }else if($data->status_pasien=="Pembayaran"){ ?>
                  <td><a href="<?=site_url('rawat_inap/selesai/'.$data->no_rm) ?>" class="btn btn-success btn-xs" ><?php echo  $data->status_pasien ?></a></td>
                  <?php }else if($data->status_pasien=="Selesai Bayar"){ ?>
                  <td><a href="" disabled class="btn btn-danger btn-xs" ><?php echo  $data->status_pasien ?></a></td>
                  <?php }else{ ?>
                  <td><a href="<?=site_url('pembayaran/add_/'.$data->no_rm) ?>" class="btn btn-primary btn-xs" ><?php echo  $data->status_pasien ?></a></td>
                  <?php } ?>
                  <td><?php echo  $data->no_kamar ?></td>
                  <td class="text-center" width="160px">
                  <?php if($data->status_pasien=="Pembayaran") { ?>
                     <a href="<?=base_url('pembayaran/addbayar_/'.$data->no_rm) ?>" class="btn btn-primary btn-flat"><i class="fa fa-credit-card"></i> Bayar</a>
                  <?php } else if($data->status_pasien=="Selesai Bayar") { ?>
                    <a href="<?=base_url('pembayaran/cetak_/'.$data->no_rm) ?>" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak</a>
                  <?php }else{ ?>
                  <a id="detail-ranap" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-detail"
                  data-rekamedis="<?= $data->no_rm?>" data-nama_pasien="<?= $data->nama_pasien ?>" data-pasien_kd="<?= $data->pasien_kd ?>" data-tanggal_inap="<?= indo_date($data->tanggal_inap) ?>"
                  data-dokter="<?= $data->nama_dokter ?>" data-diagnosa="<?= $data->diagnosa ?>" 
                  ><i class="fa fa-eye"></i> Detail</a>
                  <!-- <form action="<?=site_url('rawat_inap/hapus')?>" method="post">
		    			  	<button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" name="rekamedis_id" value="<?=$data->no_rm?>" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i>Hapus</button> -->
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
  <div class="modal fade" id="modal-detail">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Pasien Rawat Inap</h4>
               
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header">
                    <!-- <?php foreach($row->result() as $row) ?> -->
                      <i class="fa fa-bed"><p>Nama Pasien: </p></i> <span id="nama_pasien"></span>
                      <small class="pull-right"></small>
                    </h2>
                  </div>
              
              
                            <!-- info row -->
                <div class="col-sm-4 invoice-col">
               
                 <b>No Rekamedis : </b><span id="no_rm"></span><br>
                  <br>
                  <b>Kode Pasien : </b><span id="pasien_kd"></span><br>
                  <b>Tanggal Inap : </b><span id="tanggal_inap"></span><br>
                  <b>Diperiksa Oleh : </b><span id="dokter"></span><br>
                </div>
                <!-- /.col -->
              <!-- info row -->
                <div class="col-sm-4 invoice-col">
                <b>Diagnosa : </b><span id="diagnosa"></span><br>
              
                </div>
                <!-- /.col -->
              </div>
            <!-- /.row -->
            </div>
          
  
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->