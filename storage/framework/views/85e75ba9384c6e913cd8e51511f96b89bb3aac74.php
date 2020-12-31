<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">User settings</li>
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
                <form action="">

                    <!-- Form Insert -->
                    <div class="card clearfix">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-edit mr-1"></i>
                                Form add
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label" for="cinemaSelection1">Choose Ticket</label>
                                <select name="cinema_id" id="cinemaSelection1" class="form-control form-control-sm select2">
                                    <optgroup label="Select Films">

                                    <!-- retrieve all cinema -->

                                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ticketList->film->item_id); ?>"><?php echo e($ticketList->film->item_name. ' - [ ' .$ticketList->cinema->cinema_name. ' ]'); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </optgroup>
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="inputPassword1">Text</label>
                                
                                <select name="cinema_id" id="cinemaSelection1" class="form-control form-control-sm select2">
                                    <optgroup label="Select Films">

                                    <!-- retrieve all cinema -->

                                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ticketList->film->item_id); ?>"><?php echo e($ticketList->film->item_name. ' - [ ' .$ticketList->cinema->cinema_name. ' ]'); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </optgroup>
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="inputPassword1">Text</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>

                                <div class="input-group">
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <img class="img-thumbnail img-fluid"
                                src="dist/img/user4-128x128.jpg"
                                id="previewImage_update"
                                alt="User profile picture" style="width: 150px;">

                                <div class="custom-file mt-2">
                                    <input type="file" class="custom-file-input" id="imgInput_update">
                                    <label class="custom-file-label overflow-hidden" id="fileName_update" for="exampleInputFile">Edit profile..</label>
                                </div>
                            </div>
                            <!-- /.form-group -->

                            <hr>

                            <button onclick="window.location.href = 'index.html'; return false;" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>

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

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/management/forms/add.blade.php ENDPATH**/ ?>