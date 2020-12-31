<?php $__env->startSection('title', 'Transaction History'); ?>

<?php $__env->startSection('content'); ?>

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="<?php echo e(asset('dist/img/parts/bg-banner-3.jpg')); ?>" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Transaction History</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="<?php echo e(route('home')); ?>">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="<?php echo e(route('movie.transactions')); ?>">Transaction</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="<?php echo e(route('movie.transactions')); ?>">Transaction History</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-long">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title text-uppercase">Transaction</h2>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Film</th>
                            <th scope="col">Broadcast date</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $transact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>#</td>
                            <td><?php echo e($item->ticket->film->item_name); ?></td>
                            <td><?php echo e($item->ticket->broadcast_date); ?></td>
                            <td><?php echo e($item->created_at); ?></td>
                            <td class="text-center">
                                <button onclick="location.href = '<?php echo e(route('movie.ticket.print', $item->transaction_id)); ?>';" class="btn btn-outline-warning">Download Ticket</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- section -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/home/pages/transaction.blade.php ENDPATH**/ ?>