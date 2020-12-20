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