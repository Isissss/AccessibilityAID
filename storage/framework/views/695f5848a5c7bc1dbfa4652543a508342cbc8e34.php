<?php $__env->startSection('content'); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Builds</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Tip</h2>
            </div>
        </div>
    </div>
    <?php if(session('status')): ?>
        <div class="alert alert-success mb-1 mt-1">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('adminTips.update',$adminTip->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <input type="text" name="content" value="<?php echo e($adminTip->content); ?>" class="form-control"
                           placeholder="Content">
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CMGT-TLE\resources\views/adminTips/edit.blade.php ENDPATH**/ ?>