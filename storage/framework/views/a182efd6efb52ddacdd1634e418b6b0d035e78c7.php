<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Azure Cinema Portal | <?php echo $__env->yieldContent('title'); ?></title>

  <link rel="icon" type="image/png" href="<?php echo e(asset('dist/img/icon/favicon-32x32.png')); ?>" sizes="32x32">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
</head>
<body class="hold-transition <?php echo $__env->yieldContent('body-css'); ?>">

<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldSection(); ?>

<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\laravel\azure_cinema\resources\views/portal/master/auth.blade.php ENDPATH**/ ?>