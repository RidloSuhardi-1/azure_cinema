<?php $__env->startSection('title', 'Thank Your For Your Purchases'); ?>

<?php $__env->startSection('content'); ?>

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Thank You</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="#">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>

                        <span>Transaction</span>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>

                        <span>Thank You</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-long">
            <div class="container">
                <div class="status-entity">
                    <div class="entity-icon"><i class="fas fa-shopping-basket opacity-20"></i></div>
                    <h4 class="entity-title">THANK YOU FOR YOUR PURCHASES</h4>
                    <p class="entity-text">We hope you are satisfied with your purchase</p>
                    <div class="entity-actions">
                        <a class="btn btn-theme" href="#">Back To Homepage</a>
                    </div>
                </div>
            </div>
        </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/home/pages/thankyou.blade.php ENDPATH**/ ?>