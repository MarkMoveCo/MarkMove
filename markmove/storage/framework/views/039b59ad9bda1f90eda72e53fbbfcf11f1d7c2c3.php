<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('/css/index.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'MarkMove'); ?>

<?php $__env->startSection('content'); ?>
    <div class="story">
        <p>"Traveling - it leaves you speechless, then turns you into a storyteller." - Ibn Battuta</p>
        <div class="message">
            <p>Tell your story to us</p>
            <a href="<?php echo e(url('user/create')); ?>">Sign up</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('layouts/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>