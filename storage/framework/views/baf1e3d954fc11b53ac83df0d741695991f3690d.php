<?php $__env->startSection('title', 'Manage Tickets'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tickets</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal/home">Home</a></li>
                <li class="breadcrumb-item">Ticket Management</li>
                <li class="breadcrumb-item active">Tickets</li>
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
              <h3 class="card-title">All Ticket Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-ticket">
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

              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Film</th>
                    <th>Cinema</th>
                    <th>Broadcast</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($tickets->isEmpty()): ?>
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                <?php else: ?>
                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($tickets->firstItem() + $ticket); ?></td>
                    <td><?php echo e($value->film->item_name); ?></td>
                    <td><span class="badge badge-primary"><?php echo e($value->cinema->cinema_name); ?></span></td>
                    <td><?php echo e($value->broadcast_date); ?> <?php echo e($value->broadcast_time); ?></td>
                    <td><?php echo e($value->stock); ?></td>
                    <td>Rp. <?php echo e($value->price); ?>,-</td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-danger" data-id="<?php echo e(route('ticket.destroy', Crypt::encrypt($value->ticket_id))); ?>" data-name="<?php echo e($value->film->item_name); ?>" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  <!-- /.tr -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <?php echo e($tickets->links()); ?>

              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-ticket">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Ticket</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                    <form action="<?php echo e(route('ticket.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="col-form-label" for="cinemaSelection1">Choose Cinema</label>
                            <select name="cinema_id" id="cinemaSelection1" class="form-control form-control-sm select2">
                            <optgroup label="Select Cinema">

                            <!-- retrieve all cinema -->

                            <?php $__currentLoopData = $cinemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cinemaList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cinemaList->cinema_id); ?>"><?php echo e($cinemaList->cinema_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </optgroup>
                            </select>

                            <?php $__errorArgs = ['cinema_id'];
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
                            <label class="col-form-label" for="ticketSelection">Choose Films</label>
                            <select name="item_id" id="ticketSelection" class="form-control form-control-sm select2">
                                <optgroup label="Select films">
                                <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($film_list->item_id); ?>"><?php echo e($film_list->item_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            </select>

                            <?php $__errorArgs = ['item_id'];
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

                        <!-- Date -->
                        <div class="form-group">
                            <label class="col-form-label">Broadcast Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" name="broadcast_date" class="form-control <?php $__errorArgs = ['broadcast_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> datetimepicker-input" data-target="#reservationdate"/>
                            </div>

                            <?php $__errorArgs = ['broadcast_date'];
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
                        <!-- /.form group -->

                        <div class="form-group">
                            <label class="col-form-label">Broadcast Time</label>

                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <input type="time" name="broadcast_time" class="form-control <?php $__errorArgs = ['broadcast_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> datetimepicker-input" data-target="#timepicker"/>
                            </div>
                            <!-- /.input group -->

                            <?php $__errorArgs = ['broadcast_time'];
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
                        <!-- /.form group -->

                        <div class="form-group">
                            <label class="col-form-label" for="priceInput">Price</label>
                            <input type="text" name="price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="priceInput" value="<?php echo e(old('price')); ?>" placeholder="Enter ...">

                            <?php $__errorArgs = ['price'];
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
                            <label class="col-form-label" for="stockInput">Stock</label>
                            <input type="number" name="stock" class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="stockInput" value="1" min="1" max="99" placeholder="Enter stock ...">

                            <?php $__errorArgs = ['stock'];
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
                </div>
                <!-- /.Modal Body -->
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
                  <p>Are you sure want to remove this ticket "Member 1001" ?</p>
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
      $("#create-ticket").modal('show')
  </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/management/ticket.blade.php ENDPATH**/ ?>