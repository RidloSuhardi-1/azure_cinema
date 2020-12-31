<?php $__env->startSection('title', 'Movie Details'); ?>

<?php $__env->startSection('content'); ?>

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="<?php echo e(asset('storage/'.$ticket->film->image)); ?>" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title"><?php echo e($ticket->film->item_name); ?></h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="<?php echo e(route('home')); ?>">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="<?php echo e(route('movie.lists')); ?>">Movies</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="<?php echo e(route('movie.details', Crypt::encrypt($ticket->ticket_id))); ?>"><?php echo e($ticket->film->item_name); ?></a>
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
                                <div class="entity-poster" data-role="hover-wrap">
                                    <div class="embed-responsive embed-responsive-poster">
                                        <img class="embed-responsive-item" src="<?php echo e(asset('storage/'.$ticket->film->image)); ?>" alt="" />
                                    </div>
                                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                        <div class="entity-play">
                                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?php echo e($ticket->film->trailer); ?>" data-magnific-popup="iframe">
                                                <span class="icon-content"><i class="fas fa-play"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="entity-content">
                                    <h2 class="entity-title"><?php echo e($ticket->film->item_name); ?></h2>
                                    <div class="entity-category">
                                        <?php $__currentLoopData = explode(',', $ticket->film->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <span class="info-text"><?php echo e($ticket->film->time); ?></span>
                                                <span class="info-rest">&nbsp;min</span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="entity-list">
                                        <li>
                                            <span class="entity-list-title">Broadcast date:</span><?php echo e(\Carbon\Carbon::parse($ticket->broadcast_date)->format('M d, Y')); ?>, <?php echo e($ticket->broadcast_time); ?>

                                        </li>
                                        <li>
                                            <span class="entity-list-title">Available at:</span>
                                            <a class="content-link" href="#"><?php echo e($ticket->cinema->cinema_name); ?></a>
                                        </li>
                                    </ul>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2">
                                                <span class="entity-list-title">Price</span>
                                            </div>
                                            <div class="col-4">

                                                <span class="entity-list-title">Rp. <span id="item-price"><?php echo e($ticket->price); ?></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="<?php echo e(route('movie.carts', Crypt::encrypt($ticket->ticket_id))); ?>" method="GET">
                                        <?php echo csrf_field(); ?>
                                        <div class="entity-info">
                                            <hr>
                                            <div class="row">
                                                <div class="col-2"><span class="">Quantity</span></div>
                                                <div class="col-4">
                                                    <div class="btn-group">
                                                        <input type="number" name="qty" class="form-control" id="item-qty" placeholder="Quantity" size="20" value="1" min="1" max="99" readonly />

                                                        <button type="button" class="btn btn-danger inline-block" onclick="decreaseValue()" value="Decrease Value">-</button>
                                                        <button type="button" class="btn btn-primary" id="increase" onclick="increaseValue()" value="Increase Value">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./row -->
                                        </div>

                                        <div class="entity-info">
                                            <hr>
                                            <button onclick="location.href = '<?php echo e(route('home')); ?>';" type="button" class="btn btn-outline-default mr-2"><i class="fas fa-arrow-circle-left mr-2"></i>Back to Movies</button>
                                            <button type="submit" class="btn btn-outline-warning">Order Ticket Now</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        
                        <div class="section-line">
                            <div class="section-head">
                                <h2 class="section-title text-uppercase">Synopsis</h2>
                            </div>
                            <div class="section-description">
                                <p class="lead"><?php echo e($ticket->film->desc); ?></p>
                            </div>
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

<?php echo $__env->make('home.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/home/pages/movie_details.blade.php ENDPATH**/ ?>