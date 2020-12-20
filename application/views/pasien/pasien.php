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
            <a href="<?=base_url()?>pasien/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a><hr>
              <table id="dataTables" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pasien</th>
                  <th>Nama Pasien</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>TTL</th>
                  <th>Pekerjaan</th>
                  <th>No Handphone</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach($row->result() as $data) { ?>
                <tr>
                  <td><?php echo  $no++; ?></td>
                  <td><?php echo  $data->pasien_kd ?></td>
                  <td><?php echo  $data->nama_pasien ?></td>
                  <td><?php echo  $data->jenis_kelamin ?></td>
                  <td><?php echo  $data->usia ?> Th </td>
                  <td><?php echo  $data->tempat_lahir?>, &nbsp;<?php echo indo_date($data->tgl_lahir) ?></td>
                  <td><?php echo  $data->pekerjaan ?></td>
                  <td><?php echo  $data->no_hp ?></td>
                  <td><?php echo  $data->alamat ?></td>
                  <td class="text-center" width="100px">
                  <form action="<?=site_url('pasien/hapus')?>" method="post">
                  <a href="<?php echo base_url('pasien/edit/'.$data->pasien_kd) ?>" class="btn btn-info btn-flat"><i class="fa fa-edit"></i></a>
		    			  	<button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" name="pasien_kd" value="<?=$data->pasien_kd?>" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i></button>
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