
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 |</title>

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/ba78558982.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <?php echo $__env->yieldContent('frontend'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php echo $__env->make('layouts.admin.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php echo $__env->make('layouts.admin.partial.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $__env->yieldContent('admin_content'); ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo e(asset('admin')); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo e(asset('admin')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin')); ?>/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo e(asset('admin')); ?>/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="<?php echo e(asset('admin')); ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="<?php echo e(asset('admin')); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo e(asset('admin')); ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo e(asset('admin')); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="<?php echo e(asset('admin')); ?>/plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo e(asset('admin')); ?>/dist/js/pages/dashboard2.js"></script>
<?php echo $__env->yieldContent('js'); ?>



</body>
</html>
<?php /**PATH C:\xampp\htdocs\ecommerce\ecommerce\resources\views/layouts/admin/app.blade.php ENDPATH**/ ?>