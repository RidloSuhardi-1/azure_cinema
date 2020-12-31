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

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="#">Checkout</a>
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
                                            <span class="entity-list-title">Broadcast date:</span><?php echo e(\Carbon\Carbon::parse($ticket->broadcast_date)->format('M d, Y')); ?>

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
                                                <span class="entity-list-title">Rp. <?php echo e($total); ?></span>
                                            </div>
                                            <div class="col-4">
                                                <span class="entity-list-title">Qty: <?php echo e($qty); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Checkout process -->
                                    <form action="<?php echo e(route('movie.checkout', Crypt::encrypt($ticket->ticket_id))); ?>" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="qty" value="<?php echo e($qty); ?>">
                                    <input type="hidden" name="total" value="<?php echo e($total); ?>">

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2"><span class="">Choose Seat</span></div>
                                            <div class="col-4">
                                                <table class="table table-bordered">
                                                    <?php $seatKey = $ticket->cinema->seats; ?>
                                                    <?php $__currentLoopData = $seatKey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($key % 4 == 0): ?>
                                                            <tr>
                                                        <?php endif; ?>

                                                        <td class="text-center">
                                                            <input type="checkbox" class="check-seats" name="seat-selection[]" value="<?php echo e($item['seat_id']); ?>" />
                                                            <?php echo e($item['seat_name']); ?>

                                                        </td>

                                                        <?php if(($key + 1) % 4 == 0): ?>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>

                                                <?php $__errorArgs = ['seat-selection'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="<?php $__errorArgs = ['seat-selection'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> text-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                <?php if(session('seatqty')): ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo e(session('seatqty')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- ./row -->
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2">
                                                <span class="entity-list-title">Promote Code</span>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" name="code" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('code')); ?>" placeholder="Enter Promote Code..">

                                                    <?php $__errorArgs = ['code'];
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

                                            <?php if(session('codeinvalid')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session('codeinvalid')); ?>

                                                </div>
                                            <?php elseif(session('reachminimum')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session('reachminimum')); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <button onclick="location.href = '<?php echo e(route('movie.details', Crypt::encrypt($ticket->ticket_id))); ?>'; return false;" type="button" class="btn btn-outline-default pl-4 pr-4 mr-2"><i class="fas fa-arrow-circle-left mr-2"></i>Back to Movie</button>
                                        <button type="submit" class="btn btn-outline-warning pl-4 pr-4">Checkout<i class="fas fa-shopping-cart ml-2"></i></button>
                                    </div>

                                    </form>
                                    <!-- Checkout process -->

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

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function () {
        var limit = <?php echo e($qty); ?>;

        $('.check-seats').on('change', function(evt) {
            if($('.check-seats:checked').length > limit) {
                this.checked = false;
                alert('You can only choose ' + limit + ' seats');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/home/pages/movie_cart.blade.php ENDPATH**/ ?>