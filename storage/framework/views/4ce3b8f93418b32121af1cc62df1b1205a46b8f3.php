
<?php echo app('Illuminate\Foundation\Vite')(['resources/js/votehandler.js']); ?>

<?php $__env->startSection('content'); ?>

    <div class="container p-4 bg-white rounded card">
        <div class="d-flex align-items-center">
            <h3>
                <span class="material-symbols-outlined">schedule</span> <?php echo e($average); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col overflow-auto">
                <div id="tips">
                    <h2>Tips
                        <?php if(Auth::user()->admin): ?>
                        <a class="btn btn-primary" href="<?php echo e(route('adminTips.create', ['id' => $challenge->id])); ?>">Create</a>
                        <?php endif; ?>
                    </h2>
                    <hr class="mt-2 mb-3"/>
                    <ul>
                        <?php $__currentLoopData = $challenge->tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li> <?php echo Str::markdown($tip->content); ?>

                                <?php if(Auth::user()->admin): ?>
                                    <form action="<?php echo e(route('adminTips.destroy', $tip)); ?>" method="Post">
                                        <a class="btn btn-primary" href="<?php echo e(route('adminTips.edit', $tip)); ?>">Edit</a>
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col">
                <h2>Voorbeelden</h2>
                <hr class="mt-2 mb-3"/>
                <div class="row">
                    Voorbeeld van een toegankelijke website waar het contrast goed is:
                    <img class="ps-0" src="<?php echo e(Vite::asset('resources/images/contrast_example.png')); ?>" alt="Voorbeeld van toegankelijke website">
                </div>
                <div class="row border border-danger">
                    << Hier komen voorbeeld 2 >>
                </div>
            </div>

        </div>
        <div class="align-content-center text-center py-4">
            <h3>Hoe denkt u dat uw webshop scoort op dit onderdeel?</h3>

            <div id="voting">
                <i class="far fa-star" data-vote="1"></i>
                <i class="far fa-star" data-vote="2"></i>
                <i class="far fa-star" data-vote="3"></i>
                <i class="far fa-star" data-vote="4"></i>
                <i class="far fa-star" data-vote="5"></i>
            </div>
            <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            Uw score: <span id="count"><?php echo e($completedChallenge?->score); ?></span>/5

            <a href="<?php echo e(route('challenge.show', $challenge)); ?>">Terug</a>
            <form method="POST" action="<?php echo e(route('completed-challenge.update', $completedChallenge)); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="rating" id="rating" value="">
                <button class="btn btn-primary">Sla op en ga naar de volgende uitdaging.</button>
            </form>
        </div>
        << Hier komt feedback >>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\AccessibilityAID\resources\views/finished/show.blade.php ENDPATH**/ ?>