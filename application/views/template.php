
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Klinik Citra Prima Medika</title>
  <!-- Favicon -->
  <link rel="icon" href="<?=base_url();?>img/klinik.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets//bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
 
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
   <!-- SweetAlert -->
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/select2/dist/css/select2.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url()?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>CPM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?= base_url();?>img/klinik-icon.png" width="50" weight="50"><b> Citra </b>Medika</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url()?>assets/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->fungsi->user_login()->username ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url()?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                 <?php echo $this->fungsi->user_login()->nama ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
             
                <div class="pull-right">
                  <a href="<?php echo base_url('login/logout')?>" onclick="return confirm('Apakah anda yakin akan logout? ')" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url()?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->fungsi->user_login()->username ?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
     
      <ul class="sidebar-menu" data-widget="tree">
      <?php if($this->fungsi->user_login()->user_id==3 || $this->fungsi->user_login()->user_id==1) { ?>
        
        <li class="header">MASTER</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
       
            <li><a href="<?= base_url()?>obat"><i class="fa fa-circle-o"></i> Master Obat</a></li>
          
            <li><a href="<?= base_url()?>dokter"><i class="fa fa-circle-o"></i> Master Dokter</a></li>
            <li><a href="<?= base_url()?>pasien"><i class="fa fa-circle-o"></i> Master Pasien</a></li>
            <li><a href="<?= base_url()?>poli"><i class="fa fa-circle-o"></i> Master Poli</a></li>
          </ul>
        </li>
        <?php } ?>
        
          <!-- <ul class="treeview-menu">
            <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul> -->
       <?php if($this->fungsi->user_login()->user_id==1) { ?>
        <li class="header">TRANSAKSI</li>
        <li>
          <a href="<?= base_url()?>rawat_jalan">
            <i class="fa fa-h-square"></i> <span>Rawat Jalan</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?=base_url()?>rawat_inap">
            <i class="fa fa-bed"></i> <span>Rawat Inap</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
        
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-ambulance"></i>
            <span>Rawat Jalan Passien</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Pasien Umum</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Pasien BPJS</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Pasien Member</a></li>
            
          </ul>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Data Pasien</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Pasien Rawat Jalan</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Pasien Umum</a></li>
            
          </ul>
        </li> -->
          <?php } ?>
        <?php if($this->session->userdata('level')==1) { ?>   
        <li class="header">MODUL ADMIN</li>
        <li class="treeview">
        <li>
          <a href="<?=base_url()?>user">
            <i class="fa fa-users"></i> <span>Manajemen User</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li> 

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('rekapitulasi/report') ?>"><i class="fa fa-circle-o"></i> Laporan Rekapitulasi</a></li>
            <li><a href="<?= base_url('rawat_jalan/report')?>"><i class="fa fa-circle-o"></i> Laporan Rawat Jalan</a></li>
            <li><a href="<?= base_url('rawat_inap/report')?>"><i class="fa fa-circle-o"></i> Laporan Rawat Inap</a></li>
          </ul>
        </li>
        <li>
          <a href="<?=base_url()?>rekapitulasi">
            <i class="fa fa-bank"></i> <span>Rekapitulasi</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li> 
       <?php } ?>
       <li>
          <a href="<?= base_url()?>login/logout" onclick="return confirm('Apakah anda yakin akan logout ?')">
            <i class="fa fa-sign-out"></i>
            <span>Logout</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href=""></a>.</strong> Klinik Citra Prima Medika.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<!-- date-range-picker -->
<script src="<?= base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- CK Editor -->
<script src="<?= base_url()?>assets/bower_components/ckeditor/ckeditor.js"></script>
<!--  -->
<script src="<?= base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- ChartJS -->
<script src="<?= base_url()?>assets/bower_components/chart.js/Chart.js"></script>
<!-- <script src="<?= base_url()?>assets/bower_components/chart.js/Chart.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>assets/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?= base_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
    $('.select2').select2()
  })
</script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor');
    CKEDITOR.replace('editor1');

   
  });
  
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','#pilih', function() {
            var kd_pasien = $(this).data('kd');
            var nama_pasien = $(this).data('nama');
            $('#pasien_kd').val(kd_pasien);
            $('#nama_pasien').val(nama_pasien);
           
            $('#modal-pasien').modal('hide');


        });

    });
    $(document).ready(function(){
        $(document).on('click','#pilih-rekap', function() {
            var no_rm = $(this).data('norm');
            var rajal = $(this).data('rawat_jalan');
            var ranap = $(this).data('ranap');
            var tgl = $(this).data('tgl_periksa');
            var tgl_ranap = $(this).data('tgl_inap');
            var harga_total = $(this).data('total');
            
           if(tgl=="") {
             $('#jenis_pendapatan').val(ranap)
           }else{
             $('#jenis_pendapatan').val(rajal)
            }
            $('#lap_pendapatan').val(harga_total);
            $('#modal-pendapatan').modal('hide');


        });

    });
   
        
    </script>
    <script>
    $(document).ready(function(){
        $(document).on('click','#detail-ranap', function() {
            var no_rm = $(this).data('rekamedis');
            var nama_pasien = $(this).data('nama_pasien');
            var pasien_kd = $(this).data('pasien_kd');
            var tanggal_inap = $(this).data('tanggal_inap');
            var dokter = $(this).data('dokter');
            var diagnosa = $(this).data('diagnosa');

            $('#no_rm').html(no_rm);
            $('#nama_pasien').html(nama_pasien);
            $('#pasien_kd').html(pasien_kd);
            $('#tanggal_inap').html(tanggal_inap);
            $('#dokter').html(dokter);
            $('#diagnosa').html(diagnosa);
            // $('#modal-pasien').modal('hide');


        });

    });
   
        
    </script>
    <script>
    $(document).ready(function(){
        $(document).on('click','#pilih_obat', function() {
            var obat_id = $(this).data('obat_id');
            var nama_obat = $(this).data('nama_obat');
            var harga = $(this).data('harga');
            $('#obat_id').val(obat_id);
            $('#nama_obat').val(nama_obat);
            $('#harga').val(harga);
            $('#total').val(harga);
            $('#modal-obat').modal('hide');


        });

        $(document).on('keyup', '#jumlah', function() {
            let totalHarga = parseInt($('#harga').val()) * parseInt(this.value);
              if(isNaN(totalHarga)){
                totalHarga=0;
            }  
            $('#total').val(Number(totalHarga));
        });


    });
   
        
    </script>
<script type="application/javascript">  
     /** After windod Load */  
     $(window).bind("load", function() {  
       window.setTimeout(function() {  
         $(".callout").fadeTo(500, 0).slideUp(500, function() {  
           $(this).remove();  
         });  
       }, 1000);  
     });  
 </script>
<script>
$(function () {
    $('#dataTables').DataTable({
      'paging'      : true,
      'serverside'  : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'lengthMenu'  : [
                      [5, 10, 25, 50, 100, -1],
                      [5, 10, 25, 50, 100, "All"]
                      ]
    });
  });
</script>
<script>
$(function () {
  var table  = $('#dataTable').DataTable({
      'paging'      : true,
      'serverside'  : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'lengthMenu'  : [
                      [5, 10, 25, 50, 100, -1],
                      [5, 10, 25, 50, 100, "All"]
                      ]
    });
    $("#datepicker").datepicker({
    format: "dd-mm-yyyy",
    autoclose: true,
    timePicker: true, 
    timePickerIncrement: 30
  });
  

    $.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
        var FilterStart = $('#datepicker').val();
       
        var DataTableStart = data[1].trim();
        // var DataTableEnd = data[5].trim();
        if (FilterStart == '') {
            return true;
        }
        if (DataTableStart >= FilterStart)
        {
            return true;
        }
        else {
            return false;
        }
        
    });
 
 $('#datepicker').change(function (e) {
        table.draw();

    });
});
</script>
<script>
 $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Rawat Jalan',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?= json_encode($rjn); ?>,
        },
        {
          label               : 'Rawat Inap',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?= json_encode($rnp); ?>,
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [ 
      {
        value    : <?= $rawat_inap ?>,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Rawat Inap'
      },
      {
        value    : <?= $rawat_jalan ?>,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Rawat Jalan'
      },
      // {
      //   value    : 400,
      //   color    : '#f39c12',
      //   highlight: '#f39c12',
      //   label    : 'FireFox'
      // },
      // {
      //   value    : 600,
      //   color    : '#00c0ef',
      //   highlight: '#00c0ef',
      //   label    : 'Safari'
      // },
      // {
      //   value    : 300,
      //   color    : '#3c8dbc',
      //   highlight: '#3c8dbc',
      //   label    : 'Opera'
      // }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    
  });
</script>
</body>
</html>
