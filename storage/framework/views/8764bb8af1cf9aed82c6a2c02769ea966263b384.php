

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center text-success"><?php echo e($review->challenge->name); ?></h3>
                        <br/>
                        <h2><?php echo e($review->user->name); ?></h2>
                        <p>
                            <?php echo e($review->content); ?>

                        </p>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AccessibilityAID\resources\views/reviews/show.blade.php ENDPATH**/ ?>