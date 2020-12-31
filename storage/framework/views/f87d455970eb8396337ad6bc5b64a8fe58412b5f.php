<?php $__env->startSection('title', 'Check Out'); ?>

<?php $__env->startSection('content'); ?>

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="<?php echo e(asset('storage/'.$tickets->film->image)); ?>" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title"><?php echo e($tickets->film->item_name); ?></h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="<?php echo e(route('home')); ?>">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="<?php echo e(route('movie.lists')); ?>">Movies</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="#"><?php echo e($tickets->film->item_name); ?></a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="#">Checkout</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="#">Transaction Details</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="sidebar-container">
                <div class="content">
                    <section class="section-long">
                        <div class="section-line">
                            <div class="movie-info-entity">

                                <div class="entity-content">
                                    <h2 class="entity-title"><?php echo e($tickets->film->item_name); ?></h2>
                                    <div class="entity-category">
                                        <?php $__currentLoopData = explode(',', $tickets->film->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="content-link" href="#"><?php echo e($film_genre); ?></a>,
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="entity-info">
                                        <div class="info-lines">
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                                <span class="info-text">8,7</span>
                                                <span class="info-rest">/10</span>
                                            </div>
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                <span class="info-text"><?php echo e($tickets->film->time); ?></span>
                                                <span class="info-rest">&nbsp;min</span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="entity-list">
                                        <li>
                                            <span class="entity-list-title">Broadcast date:</span><?php echo e(\Carbon\Carbon::parse($tickets->broadcast_date)->format('M d, Y')); ?>, <?php echo e($tickets->broadcast_time); ?>

                                        </li>
                                        <li>
                                            <span class="entity-list-title">Available at:</span>
                                            <a class="content-link" href="#"><?php echo e($tickets->cinema->cinema_name); ?></a>
                                        </li>
                                    </ul>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2">
                                                <span class="entity-list-title">Price</span>
                                            </div>
                                            <div class="col-2">
                                                <span class="entity-list-title">Rp. <?php echo e($tickets->price); ?></span>
                                            </div>
                                            <div class="col-4">
                                                <span class="entity-list-title"><?php echo e($qty); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2">
                                                <span class="entity-list-title">Total</span>
                                            </div>
                                            <?php if($total < $totalBefore): ?>
                                            <div class="col-2">
                                                <span class="entity-list-title">Rp. <strike><?php echo e($totalBefore); ?></strike></span>
                                            </div>
                                            <div class="col-2">
                                                <span class="entity-list-title">Rp. <?php echo e($total); ?></span>
                                            </div>
                                            <?php else: ?>

                                                <div class="col-2">
                                                    <span class="entity-list-title">Rp. <?php echo e($total); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row mt-2">
                                            <div class="col-2"><span class="">Promote Code</span></div>

                                            <div class="col-4"><span class=""><?php echo e($code); ?></span></div>
                                        </div>
                                    </div>

                                    <form action="<?php echo e(route('movie.checkout.process')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="ticket_id" value="<?php echo e($tickets->ticket_id); ?>">
                                        <input type="hidden" name="qty" value="<?php echo e($qty); ?>">
                                        <input type="hidden" name="item_price" value="<?php echo e($tickets->price); ?>">
                                        <input type="hidden" name="total" value="<?php echo e($total); ?>">
                                        <input type="hidden" name="valid" value="<?php echo e($tickets->broadcast_date); ?>">

                                        <select name="seats[]" multiple="multiple" hidden>
                                        <?php $__currentLoopData = $seats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item); ?>" selected><?php echo e($item); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <div class="entity-info">
                                            <hr>
                                            <button onclick="if (confirm('Cancel order ?')) location.href = '<?php echo e(route('movie.details', Crypt::encrypt($tickets->ticket_id))); ?>'; return false;" class="btn btn-outline-danger mr-2"><i class="fas fa-arrow-circle-left mr-2"></i>Cancel Transaction</button>
                                            <button onclick="return confirm('Continue Transaction?');" type="submit" class="btn btn-outline-primary">Order Ticket Now<i class="fas fa-arrow-right ml-2"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="section-line">
                            <div class="section-bottom">
                                <div class="row">
                                    <div class="mr-auto col-auto">
                                        <div class="entity-links">
                                            <div class="entity-list-title">Share:</div>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-twitter"></i></a>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="entity-links">
                                            <div class="entity-list-title">Tags:</div>
                                            <a class="content-link" href="#">family</a>,&nbsp;
                                            <a class="content-link" href="#">gaming</a>,&nbsp;
                                            <a class="content-link" href="#">historical</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/home/pages/checkout.blade.php ENDPATH**/ ?>