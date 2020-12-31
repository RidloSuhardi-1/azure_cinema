<?php $__env->startSection('title', 'Manage Transactions'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transactions</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Transactions</li>
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
              <h3 class="card-title">All Transaction Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                        <button onclick="window.location.href = '<?php echo e(route('transaction.add')); ?>';" type="button" class="btn btn-sm btn-primary">
                          <i class="fas fa-plus mr-1 mr-2"></i>
                          Create New
                        </button>
                    </li>

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
                    <th>Customer</th>
                    <th>Film</th>
                    <th>Total Price</th>
                    <th>Transaction Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($transaction->isEmpty()): ?>
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                <?php else: ?>
                <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($transaction->firstItem() + $trx); ?></td>
                    <td><?php echo e($value->member->username); ?></td>
                    <td><?php echo e($value->ticket->film->item_name); ?></td>
                    <td><?php echo e($value->total_price); ?></td>
                    <td><?php echo e($value->created_at); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <?php echo e($transaction->links()); ?>

              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For Delete -->
          <div class="modal fade" id="remove-trx">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Remove "Member 1001"</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure want to remove this ticket "Member 1001" ?</p>
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

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/management/transaction.blade.php ENDPATH**/ ?>