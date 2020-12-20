<!-- Content Header (Page header) -->
<section class="content-header">
      <h1><i class="fa fa-users"></i>
        Pengguna
       <small>Data Pengguna</small>
       
      </h1>
     <!-- <ol class="breadcrumb">
     	<li><a href=""><i class="fa fa-dashboard"></i></a></li>
     	<li class="active">Users</li>
     </ol> -->
    </section>

    <!-- Main Content -->
    <section class="content">
    	<div class="box">
    		<div class="box-header">
    			<h3 class="box-title">Data Pengguna</h3>
    			<div class="pull-right">
    			<a href="<?php echo base_url('user/add') ?>" class="btn btn-primary btn-flat">
    				<i class="fa fa-user-plus"></i>
					Tambah Pengguna
    			</a>
    			</div>
    		</div>
			<div class="box-body" class="table-responsive">
    			<table class="table table-bordered table-striped" id="dataTables">
    				<thead>
    					<tr>
    						<th>No</th>
    						<th>Pengguna</th>
    						<th>Nama</th>
    						<th>Alamat</th>
    						<th>Level</th>
    						<th>Aksi</th>
    					</tr>
    				</thead>
					<tbody>
						<?php $no = 1;
						 foreach($row->result() as $data){ ?>
						<tr>
    						<td><?php echo $no++ ?></td>
    						<td><?php echo $data->username ?></td>
    						<td><?php echo $data->nama ?></td>
    						<td><?php echo $data->alamat ?></td>
    						<td><?php echo $data->level == 1 ? "Admin" : "Apoteker" ?></td>
    						<td class="text-center" width="160px">
							<?php if($data->level!=1) { ?>
                            <form action="<?=site_url('user/hapus')?>" method="post">
                            <a href="<?php echo base_url('user/edit/'.$data->user_id) ?>" class="btn btn-info btn-flat"><i class="fa fa-edit"></i>Edit</a>
		    				<button onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" name="user_id" value="<?=$data->user_id?>" class="btn btn-danger btn-flat"><i class="fa fa-trash-o"></i>Hapus</button>
                            </form>
							<?php } ?>
		    				</td>
    					</tr>
    					<?php } ?>
					</tbody>
    			</table>
    		</div>
    	</div>
    </section>