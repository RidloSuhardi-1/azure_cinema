<?php $__env->startSection('title', 'Manage Cinemas'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cinemas</h1>
                <span><?php echo e(isset($result) ? __('Result of '.$result.', '.$total.' record found') : ''); ?></span>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal/home">Home</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item active"><a href="<?php echo e(route('cinemas')); ?>">Cinemas</a></li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Cinema Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-cinemas">
                        <i class="fas fa-plus mr-1 mr-2"></i>
                        Create New
                      </button>
                    </li>
                    <!-- /.nav-item -->
                    <li class="nav-item">
                      <form action="#" target="_blank">
                        <button type="button" class="btn btn-sm btn-success">
                          <i class="fas fa-print mr-2"></i>
                          Print Documents
                        </button>
                      </form>
                    </li>
                    <!-- /.nav-item -->
                  </ul>
                  <!-- /.nav -->
                </div>
                <!-- /.col -->
                <form action="<?php echo e(route('cinema.search', 'cinema_name')); ?>" id="search">
                <div class="col">

                        <div class="input-group input-group-sm float-right" style="width: 180px;">

                            <input type="text" name="keyword" id="search-input" class="form-control float-right" value="<?php echo e($result ?? ''); ?>" placeholder="Search by Name">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </div>

                    <!-- /.input-group -->
                </div>
                </form>
                <!-- /.col -->

                <div class="col col-3">
                  <select id="searchBy" class="form-control form-control-sm select2">
                    <option value="<?php echo e(route('cinema.search', 'cinema_name')); ?>" selected="selected">Name</option>
                    <option value="<?php echo e(route('cinema.search', 'location')); ?>">Location</option>
                  </select>
                </div>
                <!-- /.col -->
              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Cinema Image</th>
                    <th>Cinema Name</th>
                    <th>Location</th>
                    <th>Seats</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($cinemas->isEmpty()): ?>
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                <?php else: ?>
                <?php $__currentLoopData = $cinemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cinema => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <tr>
                    <td><?php echo e($cinemas->firstItem() + $cinema); ?></td>
                    <td>
                        <img src="<?php echo e($value->image != 'empty' ? asset('storage/'.$value->image) : asset('dist/img/default-150x150.png')); ?>" alt="<?php echo e($value->cinema_name); ?> Images" class="img-sm elevation-2">
                    </td>
                    <td><?php echo e($value->cinema_name); ?></td>
                    <td><?php echo e($value->location); ?></td>
                    <td class="text-center">

                        <button onclick="window.location.href = '<?php echo e(route('seats', Crypt::encrypt($value->cinema_id))); ?>';" class="btn btn-outline-primary btn-sm">
                            Seats - <?php echo e($value->seats->count()); ?>

                        </button>

                    </td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary"
                                data-name="<?php echo e($value->cinema_name); ?>"
                                data-desc="<?php echo e($value->desc); ?>"
                                data-location="<?php echo e($value->location); ?>"
                                data-img="<?php echo e($value->image != 'empty' ? asset('storage/'.$value->image) : asset('dist/img/default-150x150.png')); ?>" data-toggle="modal" data-target="#view"><i class="far fa-eye"></i></button>

                          <button onclick="window.location.href = '<?php echo e(route('cinema.edit', Crypt::encrypt($value->cinema_id))); ?>'; " type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="<?php echo e(route('cinema.destroy', Crypt::encrypt($value->cinema_id))); ?>" data-name="<?php echo e($value->cinema_name); ?>" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                  <?php echo e($cinemas->links()); ?>

              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For View Item -->
          <div class="modal fade" id="view">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="name">Cinema 1</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <div class="row">
                    <!-- Item image -->
                    <div class="col">
                      <div class="position-relative" style="width: 350px; height: 250px;">
                        <img src="<?php echo e(asset('dist/img/photo1.png')); ?>" alt="Photo 1" id="image" class="img-thumbnail img-fluid" style="width: 350px; height: 250px;">
                      </div>
                    </div>
                    <!-- /.col -->

                    <div class="col">
                      <table class="table table-borderless">
                        <tr>
                          <th>Cinema</th>
                          <td id="name">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                          <th>Details</th>
                          <td id="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro tempora quo, consequuntur velit aliquam molestias!</td>
                        </tr>
                        <tr>
                          <th>Location</th>
                          <td id="location">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro tempora quo, consequuntur velit aliquam molestias!</td>
                        </tr>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.Modal Body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Done</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-cinemas">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Cinema</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <form action="<?php echo e(route('cinema.store')); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="col-form-label" for="cinemaInput">Cinema Name</label>
                        <input type="text" name="cinema_name" class="form-control <?php $__errorArgs = ['cinema_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="cinemaInput" value="<?php echo e(old('cinema_name')); ?>" placeholder="Enter ...">

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
                        <label class="col-form-label" for="emailInput">Location</label>
                        <input type="text" name="location" class="form-control <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="emailInput" value="<?php echo e(old('location')); ?>" placeholder="Enter ...">

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
                        <label class="col-form-label" for="emailInput">Cinema Details</label>
                        <textarea name="desc" class="form-control <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3" value="<?php echo e(old('desc')); ?>" placeholder="Enter ..."></textarea>

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
                        <label class="d-block">Item Background</label>
                        <img src="<?php echo e(asset('dist/img/default-150x150.png')); ?>" id="previewImage_create" class="img-thumbnail" alt="#" style="width: 150px;">

                        <div class="custom-file mt-3">
                            <input type="file" name="image" class="custom-file-input <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="imgInput_create">
                            <label class="custom-file-label" id="fileName_create" for="validatedCustomFile">Choose file...</label>

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
                <!-- /.Modal Body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>

                    <div class="row">
                      <div class="col">
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                      <div class="col">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                    </div>
                    <!-- /.row -->
                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Delete -->
          <div class="modal fade" id="remove">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Remove selected item</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure want to remove ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                  <button type="button" id="remove-btn" class="btn btn-outline-light">Remove</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>

<?php if($errors->any()): ?>
  <script>
      $("#create-cinemas").modal('show')
  </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/cinemas/cinemas.blade.php ENDPATH**/ ?>