<?php $__env->startSection('title', 'Update Cinemas'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo e(__('Change cinemas')); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal">Home</a></li>
                <li class="breadcrumb-item active"><a href="/cinemas">Cinema</a></li>
                <li class="breadcrumb-item active"><a href="/cinema/id/<?php echo e(Crypt::encrypt($cinemas->cinema_id)); ?>/edit"><?php echo e($cinemas->cinema_name); ?> Update</a></li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <form action="/cinema/id/<?php echo e(Crypt::encrypt($cinemas->cinema_id)); ?>/update" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <!-- Form Insert -->
                <div class="card clearfix">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-edit mr-1"></i>
                            Change '<b><?php echo e($cinemas->cinema_name); ?></b>' details
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <!-- item identifier -->
                        <input type="hidden" name="cinema_id" class="form-control" id="cinemaNameInput" value="<?php echo e(Crypt::encrypt($cinemas->cinema_id)); ?>">

                        <div class="form-group">
                            <label for="cinemaNameInput"><?php echo e(__('Cinema name')); ?></label>
                            <input type="text" name="cinema_name" class="form-control" id="cinemaNameInput" value="<?php echo e($cinemas->cinema_name); ?>" placeholder="Cinema name..">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaLocInput"><?php echo e(__('Location')); ?></label>
                            <input type="text" name="location" class="form-control" id="cinemaLocInput" value="<?php echo e($cinemas->location); ?>" placeholder="Cinema location..">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaDescInput"><?php echo e(__('Description')); ?></label>
                            <textarea name="desc" class="form-control" id="cinemaDescInput" rows="3" value="<?php echo e($cinemas->desc); ?>" placeholder="Enter ..."><?php echo e($cinemas->desc); ?></textarea>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaImageInput"><?php echo e(__('Cinema background')); ?></label>
                            <img class="img-thumbnail img-fluid d-block"
                            src="<?php echo e(asset('storage/'.$cinemas->image)); ?>"
                            id="previewImage_update"
                            alt="<?php echo e($cinemas->cinema_name); ?> - Cinema Picture" style="width: 150px;">

                            <div class="custom-file mt-2">
                                <input type="file" name="image" class="custom-file-input" id="imgInput_update">
                                <label class="custom-file-label overflow-hidden" id="fileName_update" for="cinemaImageInput">Change cinema background..</label>
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <hr>

                        <button onclick="window.location.href = '/cinemas'; return false;" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>

                        <div class="row float-right">
                            <div class="col">
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
          </form>
        <!-- /.form -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/cinema_edit.blade.php ENDPATH**/ ?>