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
                <li class="breadcrumb-item"><a href="/portal/home">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo e(route('cinemas')); ?>">Cinema</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo e(route('cinema.edit', Crypt::encrypt($cinemas->cinema_id))); ?>"><?php echo e($cinemas->cinema_name); ?> Update</a></li>
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
            <form action="<?php echo e(route('cinema.update', Crypt::encrypt($cinemas->cinema_id))); ?>" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="cinema_name" class="form-control <?php $__errorArgs = ['cinema_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid swalDefaultError <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="cinemaNameInput" value="<?php echo e($cinemas->cinema_name); ?>" placeholder="Cinema name..">

                            <?php $__errorArgs = ['cinema_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaLocInput"><?php echo e(__('Location')); ?></label>
                            <input type="text" name="location" class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="cinemaLocInput" value="<?php echo e($cinemas->location); ?>" placeholder="Cinema location..">

                            <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaDescInput"><?php echo e(__('Description')); ?></label>
                            <textarea name="desc" class="form-control <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="cinemaDescInput" rows="3" value="<?php echo e($cinemas->desc); ?>" placeholder="Enter ..."><?php echo e($cinemas->desc); ?></textarea>

                            <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaImageInput"><?php echo e(__('Cinema background')); ?></label>
                            <img class="img-thumbnail img-fluid d-block"
                            src="<?php echo e($cinemas->image != 'empty' ? asset('storage/'.$cinemas->image) : asset('dist/img/default-150x150.png')); ?>"
                            id="previewImage_update"
                            alt="<?php echo e($cinemas->cinema_name); ?> - Cinema Picture" style="width: 150px;">

                            <div class="custom-file mt-2">
                                <input type="file" name="image" class="form-control custom-file-input <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="imgInput_update">
                                <label class="custom-file-label overflow-hidden" id="fileName_update" for="cinemaImageInput"><?php echo e($cinemas->image); ?></label>

                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>
                        <!-- /.form-group -->

                        <hr>

                        <button onclick="window.location.href = '<?php echo e(route('cinemas')); ?>'; return false;" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>

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

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/cinemas/cinema_edit.blade.php ENDPATH**/ ?>