
<?php echo app('Illuminate\Foundation\Vite')('resources/js/challenge.js'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-8 m-auto mt-4">
        <div class="card">
            <div class="card-header">
                Opdrachten
            </div>
            <div id="challengeContainer" class="d-flex row">
                <div id="ChallengeListLeft">
                    <ul class="list-group list-group-flush border-right" id="challengeList">
                        <?php $__currentLoopData = $challenges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $challenge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h2>Opdracht <?php echo e($challenge->id); ?></h2>
                                    <h3><?php echo e($challenge->name); ?></h3>
                                </div>
                                <button class="btn btn-primary" data-id="<?php echo e($challenge->id); ?>" id="info">
                                    <span class="material-symbols-outlined" data-id="<?php echo e($challenge->id); ?>" aria-label="informatie opdracht <?php echo e($challenge->slug); ?>">info</span>
                                </button>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        apiurl = "http://127.0.0.1:8000/api/challenge/"
        challengeRoute = 'http://127.0.0.1:8000/challenge/'
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AccessibilityAID\resources\views/challenge/index.blade.php ENDPATH**/ ?>