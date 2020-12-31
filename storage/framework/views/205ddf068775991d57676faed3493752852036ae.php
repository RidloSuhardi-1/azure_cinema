<?php $__env->startSection('title', 'Manage Films'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cinemas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item"><a href="/cinemas">Cinemas</a></li>
                <li class="breadcrumb-item active">Seats</li>
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
              <h3 class="card-title">All Seat of Cinema Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-seat">
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

                <div class="col">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.input-group -->
                </div>
                <!-- /.col -->
                <div class="col">
                  <select class="form-control form-control-sm select2">
                    <option selected="selected">Name</option>
                    <option>Recently added</option>
                  </select>
                </div>
                <!-- /.col -->
              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Seats Name</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($seats->isEmpty()): ?>
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                <?php else: ?>
                <?php $__currentLoopData = $seats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($seat->seat_name); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-warning ml-1 mr-1" data-toggle="modal" data-target="#change-seat">Change</button>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove-seat">Remove</button>
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
              <a href="/cinemas" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-circle-left mr-1"></i>
                Back to Cinemas
              </a>

              <ul class="pagination pagination-sm m-0 float-right">

              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-seat">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Seat</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <form>

                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Cinema ID</label>
                        <input type="text" class="form-control" id="emailInput" placeholder="Enter ...">
                    </div>
                      <!-- /.form-group -->

                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Seat ID</label>
                        <input type="text" class="form-control" id="emailInput" placeholder="Enter ...">
                    </div>
                      <!-- /.form-group -->

                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Seat Name</label>
                        <input type="text" class="form-control" id="emailInput" placeholder="Enter ...">
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
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>

                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Edit -->
          <div class="modal fade" id="change-seat">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Change Seat Details</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <form>
                      <!-- input states -->
                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Seat Name</label>
                        <input type="text" class="form-control" id="emailInput" placeholder="Enter ...">
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
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>

                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Delete -->
          <div class="modal fade" id="remove-seat">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Remove "Member 1001"</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure want to remove seat "1" ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-outline-light">Remove</button>
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

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/cinema_seats.blade.php ENDPATH**/ ?>