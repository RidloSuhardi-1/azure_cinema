<?php $__env->startSection('title', 'Register to Azure'); ?>

<?php $__env->startSection('content'); ?>

<div class="register-box m-5">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo e(route('home')); ?>" class="h1">Azure Cinema</a>
    </div>

    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

    <form action="<?php echo e(route('consumer.register.process')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Full name" />
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" />
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" />
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" />
            <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label>Change Status</label>
            <select name="label" class="form-control">
                <optgroup label="Select label">
                        <option value="Free">Free Customers</option>
                        <option value="VIP" selected>VIP Customers</option>
                </optgroup>
            </select>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
                </label>
                </div>
            </div>
            <!-- /.col -->
            <input type="hidden" name="roles" value="Customer">

                        <!-- /.form-group -->
            <hr class='my-4'>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

      <hr>

        <a href="<?php echo e(route('home')); ?>">Back to landing</a>
        <a href="<?php echo e(route('consumer.login')); ?>" class="float-right">Already have an account</a>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/home/pages/register.blade.php ENDPATH**/ ?>