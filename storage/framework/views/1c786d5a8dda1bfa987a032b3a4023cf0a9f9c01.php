<?php $__env->startSection('title', 'Manage Films'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Films</h1>
                <span><?php echo e(isset($result) ? __('Result of '.$result.', '.$total.' record found') : ''); ?></span>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal/home">Home</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item active"><a href="<?php echo e(route('films')); ?>">Films</a></li>
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
              <h3 class="card-title">All Film Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-films">
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

                <form action="<?php echo e(route('film.search', 'item_name')); ?>" id="search">
                <div class="col">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
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
                    <option value="<?php echo e(route('film.search', 'item_name')); ?>" selected="selected">Name</option>
                    <option value="<?php echo e(route('film.search', 'genre')); ?>">Genre</option>
                    <option value="<?php echo e(route('film.search', 'label')); ?>">Label</option>
                  </select>
                </div>
                <!-- /.col -->
              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Label</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($films->isEmpty()): ?>
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                <?php else: ?>
                <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($films->firstItem() + $film); ?></td>
                    <td><?php echo e($value->item_name); ?></td>
                    <td>
                        <img src="<?php echo e($value->image != 'empty' ? asset('storage/'.$value->image) : asset('dist/img/default-150x150.png')); ?>" alt="<?php echo e($value->item_name); ?> Images" class="img-sm elevation-2">
                    </td>
                    <td><span class="badge <?php echo e($value->label == 'standart' ? 'bg-primary' : ($value->label == 'premium' ? 'bg-warning' : 'bg-gray')); ?>"><?php echo e($value->label == 'standart' ? 'Standart' : ($value->label == 'premium' ? 'Premium' : 'Coming soon')); ?></span></td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary"
                                data-name="<?php echo e($value->item_name); ?>"
                                data-img="<?php echo e($value->image != 'empty' ? asset('storage/'.$value->image) : asset('dist/img/default-150x150.png')); ?>"
                                data-genre="<?php $__currentLoopData = explode(',', $value->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <span class='badge badge-danger'><?php echo e($film_genre); ?></span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
                                data-lbl="<?php echo e($value->label == 'standart' ? 'Standart' : ($value->label == 'premium' ? 'Premium' : 'Coming soon')); ?>"
                                data-lbl-class="<?php echo e($value->label == 'standart' ? 'bg-primary' : ($value->label == 'premium' ? 'bg-warning' : 'bg-gray')); ?>"
                                data-desc="<?php echo e(substr($value->desc, 0, 120)); ?> .." data-toggle="modal" data-target="#view"><i class="far fa-eye"></i></button>

                          <button onclick="window.location.href = '<?php echo e(route('film.edit', Crypt::encrypt($value->item_id))); ?>'; " type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="<?php echo e(route('film.destroy', Crypt::encrypt($value->item_id))); ?>" data-name="<?php echo e($value->item_name); ?>" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
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
                <?php echo e($films->links()); ?>

              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For View Item -->
          <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="name">Film</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <div class="row">
                    <!-- Item image -->
                    <div class="col">
                        <div class="position-relative" style="width: 320px; height: 180px;">
                            <img src="<?php echo e(asset('dist/img/default-150x150.png')); ?>" alt="Photo 1" id="image" class="img-thumbnail img-fluid" style="width: 320px; height: 180px;">
                            <div class="ribbon-wrapper ribbon-lg">
                            <div class="">
                                genre here
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col overflow-hidden">
                      <table class="table table-borderless">
                        <tr>
                          <th>Film</th>
                          <td id="name">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                          <th>Genre</th>
                          <td id="genre"></td>
                        </tr>
                        <tr>
                          <th>Synopsis</th>
                          <td id="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro tempora quo, consequuntur velit aliquam molestias!</td>
                        </tr>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.Modal Body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-films" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Item</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                    <form action="<?php echo e(route('film.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="col-form-label" for="itemNameInput">Item Name</label>
                            <input type="text" name="item_name" class="form-control <?php $__errorArgs = ['item_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="itemNameInput" value="<?php echo e(old('item_name')); ?>" placeholder="Enter ...">

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
                            <label>Genre Selection</label>
                            <div class="select2-danger">
                                <select class="select2 <?php $__errorArgs = ['genre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="genre[]" multiple="multiple" data-placeholder="Select a Genre" data-dropdown-css-class="select2-danger" style="width: 100%;">
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
unset($__errorArgs, $__bag); ?>" rows="3" value="<?php echo e(old('desc')); ?>" placeholder="Short story from the film.."></textarea>

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
unset($__errorArgs, $__bag); ?>" id="timeInput" value="1" min="1" placeholder="Enter film duration ...">

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
unset($__errorArgs, $__bag); ?>" id="trailerLinkInput" value="<?php echo e(old('trailer')); ?>" placeholder="Enter video link ...">

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

                        <div class="form-group">
                            <label>Status</label>
                            <select name="label" class="form-control">
                                <option value="standart">Standart</option>
                                <option value="premium">Premium</option>
                                <option value="soon">Coming Soon</option>
                            </select>
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
      $("#create-films").modal('show')
  </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/films/films.blade.php ENDPATH**/ ?>