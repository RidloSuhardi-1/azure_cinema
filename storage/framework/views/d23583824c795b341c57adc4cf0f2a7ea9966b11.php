<?php $__env->startSection('title', 'Update Item'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo e(__('Change Film Details')); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal/home">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('films')); ?>">Films</a></li>
                <li class="breadcrumb-item active"><?php echo e(substr($films->item_name, 0, 30)); ?>... </li>
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
            <!-- Form Insert -->
            <div class="card clearfix">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-edit mr-1"></i>
                        Change '<b><?php echo e($films->item_name); ?></b>' details
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form action="<?php echo e(route('film.update', Crypt::encrypt($films->item_id))); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="item_id" class="form-control" id="itemIdInput" value="<?php echo e($films->item_id); ?>" placeholder="Enter ...">

                        <div class="form-group">
                            <label class="col-form-label" for="itemNameInput">Change Item Name</label>
                            <input type="text" name="item_name" class="form-control <?php $__errorArgs = ['item_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="itemNameInput" value="<?php echo e($films->item_name); ?>" placeholder="Enter ...">

                            <?php $__errorArgs = ['item_name'];
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
                            <label>Change Genre Selection</label>
                            <div class="select2-danger">
                                <select class="select2 <?php $__errorArgs = ['genre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="genre[]" multiple="multiple" data-placeholder="Select a Genre" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <!-- get current genre -->
                                <?php $__currentLoopData = explode(',', $films->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($film_genre); ?>" selected><?php echo e($film_genre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <option value="Action">Action</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Criminal">Criminal</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Romantic">Romantic</option>
                                    <option value="Epic">Epic</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Science Fiction">Science Fiction</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Thriller">Thriller</option>
                                    <option value="Music">Music</option>
                                    <option value="War">War</option>
                                    <option value="Spy">Spy</option>
                                    <option value="Monster">Monster</option>
                                    <option value="Fantasy">Fantasy</option>
                                    <option value="Martial Arts">Martial Arts</option>
                                    <option value="Supernatural">Supernatural</option>
                                </select>

                                <?php $__errorArgs = ['genre'];
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

                        <div class="form-group">
                            <label class="col-form-label" for="descInput">Synopsis</label>
                            <textarea name="desc" id="descInput" class="form-control <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3" value="<?php echo e($films->desc); ?>" placeholder="Short story from the film.."><?php echo e($films->desc); ?></textarea>

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
                            <label class="col-form-label" for="timeInput">Duration /minute</label>
                            <input type="number" name="time" class="form-control <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="timeInput" min="1" value="<?php echo e($films->time); ?>" placeholder="Enter film duration ...">

                            <?php $__errorArgs = ['time'];
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
                            <label class="col-form-label" for="trailerLinkInput">Trailer</label>
                            <input type="text" name="trailer" class="form-control <?php $__errorArgs = ['trailer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="trailerLinkInput" value="<?php echo e($films->trailer); ?>" placeholder="Enter video link ...">

                            <?php $__errorArgs = ['trailer'];
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
                            <label class="d-block">Change Item Background</label>
                            <img src="<?php echo e($films->image != 'empty' ? asset('storage/'.$films->image) : asset('dist/img/default-150x150.png')); ?>" id="previewImage_create" class="img-thumbnail" alt="#" style="width: 150px;">

                            <div class="custom-file mt-3">
                                <input type="file" name="image" class="custom-file-input <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="imgInput_create">
                                <label class="custom-file-label" id="fileName_create" for="validatedCustomFile"><?php echo e($films->image); ?></label>

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

                        <div class="form-group">
                            <label>Change Status</label>
                            <select name="label" class="form-control">
                                <optgroup label="Selected label">
                                    <option value="<?php echo e($films->label); ?>"><?php echo e($films->label == 'standart' ? 'Standart' : ($films->label == 'premium' ? 'Premium' : 'Coming soon')); ?></option>
                                </optgroup>
                                <optgroup label="Select label">
                                    <option value="standart">Standart</option>
                                    <option value="premium">Premium</option>
                                    <option value="soon">Coming Soon</option>
                                </optgroup>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <hr>

                        <button onclick="window.location.href = '<?php echo e(route('films')); ?>'; return false;" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>

                        <div class="row float-right">
                            <div class="col">
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.form -->

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/films/film_edit.blade.php ENDPATH**/ ?>