<?php $__env->startSection('title', 'Buy tickets easily only at Azure Cinema'); ?>

<?php $__env->startSection('content'); ?>

        <!-- New added -->
        <section class="section-text-white position-relative">
            <div class="d-background" data-image-src="<?php echo e(asset('dist/img/parts/bg-banner-2.jpg')); ?>" data-parallax="scroll"></div>
            <div class="d-background bg-theme-blacked"></div>
            <div class="mt-auto container position-relative">
                <div class="top-block-head text-uppercase">
                    <h2 class="display-4">Now
                        <span class="text-theme">in cinema</span>
                    </h2>
                </div>
                <div class="top-block-footer">
                    <div class="slick-spaced slick-carousel" data-slick-view="navigation responsive-4">
                        <!-- Items slide -->
                        <div class="slick-slides">

                            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- This list of item -->
                            <div class="slick-slide">
                                <article class="poster-entity" data-role="hover-wrap">
                                    <div class="embed-responsive embed-responsive-poster">
                                        <img class="embed-responsive-item" src="<?php echo e(asset('storage/'.$t->film->image)); ?>" alt="" />
                                    </div>
                                    <div class="d-background bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                                    <div class="d-over bg-highlight-bottom">
                                        <div class="collapse animated faster entity-play" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?php echo e($t->film->trailer); ?>" data-magnific-popup="iframe">
                                                <span class="icon-content"><i class="fas fa-play"></i></span>
                                            </a>
                                        </div>
                                        <h4 class="entity-title">
                                            <a class="content-link" href="movie-info-sidebar-right.html"><?php echo e($t->film->item_name); ?></a>
                                        </h4>
                                        <div class="entity-category">
                                            <?php $count = 0; ?>
                                            <?php $__currentLoopData = explode(',', $t->film->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($count == 4) break; ?>
                                                <a class="content-link" href="#"><?php echo e($film_genre); ?></a>,
                                                <?php $count++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            ...
                                        </div>
                                        <div class="entity-info">
                                            <div class="info-lines">
                                                <div class="info info-short">
                                                    <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                                    <span class="info-text">8,1</span>
                                                    <span class="info-rest">/10</span>
                                                </div>
                                                <div class="info info-short">
                                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                    <span class="info-text"><?php echo e($t->film->time); ?></span>
                                                    <span class="info-rest">&nbsp;min</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- /.slick-slide -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                        <!-- /.slick-slide -->
                        <div class="slick-arrows">
                            <div class="slick-arrow-prev">
                                <span class="th-dots th-arrow-left th-dots-animated">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <div class="slick-arrow-next">
                                <span class="th-dots th-arrow-right th-dots-animated">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section in play -->
        <section class="section-long">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title text-uppercase">Now in play</h2>
                    <p class="section-text">Dates: 13 - 15 february 2019</p>
                </div>

                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <article class="movie-line-entity">
                    <div class="entity-poster" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-poster">
                            <img class="embed-responsive-item" src="<?php echo e(asset('storage/'.$list->film->image)); ?>" alt="" />
                        </div>
                        <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                            <div class="entity-play">
                                <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?php echo e($list->film->trailer); ?>" data-magnific-popup="iframe">
                                    <span class="icon-content"><i class="fas fa-play"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="entity-content">
                        <h4 class="entity-title">
                            <a class="content-link" href="movie-info-sidebar-right.html"><?php echo e($list->film->item_name); ?></a>
                        </h4>
                        <div class="entity-category">
                            <?php $__currentLoopData = explode(',', $list->film->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="content-link" href="#"><?php echo e($film_genre); ?></a>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="entity-info">
                            <div class="info-lines">
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                    <span class="info-text">8,1</span>
                                    <span class="info-rest">/10</span>
                                </div>
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                    <span class="info-text"><?php echo e($list->film->time); ?></span>
                                    <span class="info-rest">&nbsp;min</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-short entity-text"><?php echo e($list->film->desc); ?></p>
                    </div>
                    <div class="entity-extra">
                        <div class="text-uppercase entity-extra-title">Details</div>
                        <div class="entity-showtime">
                            <a href="<?php echo e(route('movie.details', Crypt::encrypt($list->ticket_id))); ?>" class="btn btn-outline-warning"><i class="fas fa-ticket-alt mr-2"></i>Buy a Ticket</a>
                        </div>
                    </div>
                </article>
                <!-- /.article -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <!-- /section -->
        <section class="section-solid-long section-text-white position-relative">
            <div class="d-background" data-image-src="<?php echo e(asset('dist/img/parts/bg-banner-1.jpg')); ?>" data-parallax="scroll"></div>
            <div class="d-background bg-gradient-black"></div>
            <div class="container position-relative">
                <div class="section-head">
                    <h2 class="section-title text-uppercase">Coming Soon</h2>
                </div>
                <div class="slick-spaced slick-carousel" data-slick-view="navigation single">
                    <!-- Items slide -->
                    <div class="slick-slides">
                        <?php $__currentLoopData = $comingsoon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <!-- This list of items -->
                        <div class="slick-slide">
                            <article class="movie-line-entity">
                                <div class="entity-preview">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <img class="embed-responsive-item" src="<?php echo e(asset('storage/'.$list->image)); ?>" alt="" />
                                    </div>
                                    <div class="d-over">
                                        <div class="entity-play">
                                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?php echo e($list->trailer); ?>" data-magnific-popup="iframe">
                                                <span class="icon-content"><i class="fas fa-play"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="entity-content">
                                    <h4 class="entity-title">
                                        <a class="content-link" href="movie-info-sidebar-right.html"><?php echo e($list->item_name); ?></a>
                                    </h4>
                                    <div class="entity-category">
                                        <?php $__currentLoopData = explode(',', $list->genre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film_genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="content-link" href="#"><?php echo e($film_genre); ?></a>,
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="entity-info">
                                        <div class="info-lines">
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-calendar-alt"></i></span>
                                                <span class="info-text">Coming soon in Cinemas</span>
                                            </div>
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                <span class="info-text"><?php echo e($list->time); ?></span>
                                                <span class="info-rest">&nbsp;min</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-short entity-text"><?php echo e($list->desc); ?></p>
                                </div>
                            </article>
                        </div>
                        <!-- /.slick-slide -->

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="slick-arrows">
                        <div class="slick-arrow-prev">
                            <span class="th-dots th-arrow-left th-dots-animated">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div class="slick-arrow-next">
                            <span class="th-dots th-arrow-right th-dots-animated">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/home/index.blade.php ENDPATH**/ ?>