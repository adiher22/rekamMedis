<!-- Content Header (Page header) -->
<section class="content-header">
      <h1><i class="fa fa-calendar"></i>
        Laporan
       <small>Data Rawat Jalan</small>
       
      </h1>
  
    </section>
   
    <!-- Main Content -->
    <section class="content">
    	<div class="box">
    		<div class="box-header">
          <div class="col-md-2 col-md-offset">
                    <!-- <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> -->
                    <form action="<?php echo base_url('rawat_jalan/report'); ?>" method="post">
                        <div class="form-group <?= form_error('dari')? 'has-error' : null?>">
                            <label> Dari</label>
                            <input type="date" name="dari" value="<?=set_value('dari') ?>" class="form-control">
                            <?php echo form_error('dari'); ?>
                        </div>
                        <div class="form-group <?= form_error('sampai')? 'has-error' : null?>">
                            <label> Sampai</label>
                            <input type="date" name="sampai" value="<?=set_value('sampai') ?>" class="form-control">
                            <?php echo form_error('sampai'); ?>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i> Cari</button>
                           
                        </div>
                    </form>
           </div>
    		</div>
    	</div>
    </section>