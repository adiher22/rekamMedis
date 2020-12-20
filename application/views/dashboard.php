 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Dashboard
       <small>Halaman Utama</small>
       
      </h1>
     
    </section>
     <!-- Main content -->
    <section class="content">
           <!-- Small boxes  -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $obat ?></h3>

              <p>Data Obat</p>
            </div>
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <a href="<?= base_url()?>obat" class="small-box-footer">Lihat info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $rawat_jalan ?></h3>

              <p>Data Rawat Jalan</p>
            </div>
            <div class="icon">
              <i class="fa fa-ambulance"></i>
            </div>
            <a href="<?= base_url()?>rawat_jalan" class="small-box-footer">Lihat info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- Col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $rawat_inap ?></h3>

              <p>Pasien Rawat Inap</p>
            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
            <a href="<?= base_url()?>rawat_inap" class="small-box-footer">Lihat info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $pasien ?></h3>

              <p>Pasien Terdaftar</p>
            </div>
            <div class="icon">
              <i class="fa fa-hospital-o"></i>
            </div>
            <a href="<?= base_url()?>pasien" class="small-box-footer">Lihat info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $dokter ?></h3>

              <p>Data Dokter</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="<?= base_url()?>dokter" class="small-box-footer">Lihat info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->
      </div>
    
      <!-- /.row -->
       <!-- AREA CHART -->
  <div class="row">
     <div class="col-md-8">
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rekamedis Tahun <?= date('Y') ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <p class="text-center">
            <strong>Data: 1 Januari, <?= date('Y') ?> - 31 Desember, <?= date('Y') ?></strong>
            </p>
              <div class="chart">
                <canvas id="areaChart" style="display: block; width: 669px; height: 320px;"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
  
    <div class="col-md-4">
    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data Rekamedis </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart-responsive">
              <canvas id="pieChart" style="display: block; width: 669px; height: 320px;"></canvas>
              </div> 
          <ul class="chart-legend clearfix">
          <li><i class="fa fa-circle-o text-red"></i> Rawat Inap</li>
          <li><i class="fa fa-circle-o text-green"></i> Rawat Jalan</li>
          </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->  
     
    
    </div>
  </div>
                <!-- /.col -->
      <!-- PRODUCT LIST -->
  <div class="row">  
    <div class="col-md-4">
    
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Total Barang Stok Minim</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                  <table class="table mb-0 text-center table-striped table-sm">
                  <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($barang_min) :
                            foreach ($barang_min as $b) :
                             ?>
                        <tr>
                            <td><?= $b['nama_obat']?></td>
                            <td><?= $b['stok']?></td>
                            <td>
                            <a href="<?= base_url('obat/edit/'.$b['obat_id'])?>" class="label label-danger"><i class="fa fa-plus"></i></a>
                            </td>
                        </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                          <tr>
                                <td colspan="3" class="text-center">
                                    Tidak ada barang stok minim
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                  </table>
                
               
                
              </ul>
            </div>
          
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /col -->

     <div class="col-md-8">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Transaksi Rekamedis Terakhir</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No Rekamedis</th>
                    <th>Nama Pasien</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Jenis Pasien</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($last->result() as $data) { ?>
                  <tr>
                    <td><?= $data->no_rm ?></td>
                    <?php if($data->nama_pasien) { ?>
                    <td><?= $data->nama_pasien ?></td>
                    <?php }else{ ?>
                    <td><?= $data->nama_passien ?></td>
                    <?php } ?>
                    <?php if($data->status) { ?>
                    <td><span class="label label-success"><?= $data->status ?></span></td>
                    <?php } else {?>
                    <td><span class="label label-primary"><?= $data->status_pasien ?></span></td>
                    <?php } ?>
                    <?php if($data->tgl_periksa) { ?>
                    <td> <?= indo_date($data->tgl_periksa) ?>
                    </td>
                    <?php } else{ ?>
                     <td><?= indo_date($data->tanggal_inap) ?></td>   
                    <?php }if($data->tgl_periksa) { ?>
                    <td><span class="label label-warning">Pasien Rawat Jalan</span></td>
                    <?php }else{ ?>
                      <td><span class="label label-danger">Pasien Rawat Inap</span></td>
                    <?php } ?>
                    <td><?= indo_curency($data->harga_total) ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    <!-- / row -->
    </section>
    <!-- /.content -->
