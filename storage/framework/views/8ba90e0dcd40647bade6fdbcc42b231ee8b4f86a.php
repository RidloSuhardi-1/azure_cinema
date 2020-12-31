<?php $__env->startSection('title', 'Film'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1><b>Film</b> '<?php echo e(__($films->item_name)); ?>'</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal">Home</a></li>
                <li class="breadcrumb-item"><a href="/films">Films</a></li>
                <li class="breadcrumb-item active"><?php echo e(__($films->item_name)); ?></li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Form Insert -->
            <div class="card clearfix">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-film mr-1"></i>
                        <?php echo e(__($films->item_name)); ?>

                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <!-- Item image -->
                        <div class="col">
                            <div class="position-relative" style="width: 350px;">
                                <img src="<?php echo e($films->image != 'empty' ? asset('storage/'.$films->image) : asset('dist/img/default-150x150.png')); ?>" alt="Photo 1" class="img-thumbnail img-fluid" style="width: 350px;">
                                <div class="ribbon-wrapper ribbon-lg">
                                <div class="ribbon <?php echo e($films->label == 'standart' ? 'bg-primary' : ($films->label == 'premium' ? 'bg-warning' : 'bg-gray')); ?>">
                                    <?php echo e($films->label == 'standart' ? 'Standart' : ($films->label == 'premium' ? 'Premium' : 'Coming soon')); ?>

                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="col">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Item Name</th>
                                    <td><?php echo e($films->item_name); ?></td>
                                </tr>
                                <tr>
                                    <th>Genre</th>
                                    <td>
                                        <?php $__currentLoopData = explode(',', $films->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-danger"><?php echo e($film_genre); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Broadcast<br>Date and Time</th>
                                    <td><?php echo e($films->broadcast_date); ?> <?php echo e($films->broadcast_time); ?></td>
                                </tr>
                                <tr>
                                    <th>Available</th>
                                    <td>
                                        <span class="badge badge-primary"><?php echo e($films->cinema->cinema_name); ?></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>

                    <hr>

                    <button onclick="window.location.href = '/films'; return false;" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/films/film_details.blade.php ENDPATH**/ ?>