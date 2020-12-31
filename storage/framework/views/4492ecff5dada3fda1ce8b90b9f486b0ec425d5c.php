<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dist/css/pdf/style.scss')); ?>"/>
</head>
<body>

<section class="container">
    <div class="cardWrap">
        <div class="card cardLeft">
          <h1><?php echo e($transact->ticket->cinema_id); ?> <span>Cinema</span></h1>
          <div class="title">
            <h2><?php echo e($transact->ticket->film->item_name); ?></h2>
            <span>movie</span>
          </div>
          <div class="title">
            <h2><?php echo e($transact->ticket->film->item_name); ?></h2>
            <span>
            <?php $__currentLoopData = explode(',', $transact->ticket->film->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($film_genre); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
          </div>
          <div class="name">
            <h2><?php echo e(__('Jenengmu')); ?></h2>
            <span>name</span>
          </div>
          <div class="seat">
            <h2><?php echo e($transact->seat->seat_name); ?></h2>
            <span>seat</span>
          </div>
          <div class="time">
            <h2><?php echo e($transact->ticket->broadcast_date); ?></h2>
            <span>date</span>
          </div>
          <div class="time">
            <h2><?php echo e($transact->ticket->broadcast_time); ?></h2>
            <span>time</span>
          </div>

        </div>
        <div class="card cardRight">
          <div class="eye"></div>
          <div class="number">
            <h3>156</h3>
            <span>seat</span>
          </div>
          <div class="barcode"></div>
          <small><?php echo e(__('X'.$transact->transaction_id.$transact->ticket->ticket_id)); ?></small>
        </div>

      </div>
</section>

</body>
</html>
<?php /**PATH C:\laravel\azure_cinema\resources\views/home/pages/ticket.blade.php ENDPATH**/ ?>