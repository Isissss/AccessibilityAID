<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('reviews.search')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <label for="search">Search:</label>
        <input id="search" type="text" name="search">
        <input name="submit" type="submit" class="btn btn-primary"/>
    </form>
    <div class="row justify-content-center g-2">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($review->challenge->name); ?></h5>
                        <p class="font-bold">User:
                        <span class="card-title"><?php echo e($review->user->name); ?> </span>
                        <p class="card-text">Review:</p>
                        <p class="card-text"><?php echo e($review->content); ?></p>

                        <form action="<?php echo e(route('reviews.destroy',$review->id)); ?>" method="Post">
                            <a class="btn btn-primary" href="<?php echo e(route('reviews.show',$review->id)); ?>">show</a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CMGT-TLE\resources\views/reviews/index.blade.php ENDPATH**/ ?>