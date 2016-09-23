<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('/css/user/login.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Registration'); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel-primary panel">
        <div class="panel-body">
            <?php echo Form::open(array('url' => '/user', 'class' => 'form')); ?>


            <div class="form-group">
                <h2>Login</h2>
            </div>

            <div class="form-group">
                <?php echo Form::label('email', 'E-mail',
                    array(
                        'class' => 'control-label')); ?>

                <?php echo Form::email('email', null,
                    array('required',
                          'autofocus' => 'true',
                          'class'=>'form-control')); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('password', 'Password',
                    array(
                        'class' => 'control-label')); ?>

                <?php echo Form::password('password', null,
                    array('required',
                          'class' =>'form-control')); ?>

            </div>

            <div class="form-group">
                <?php echo Form::submit('Log In',
                array('class'=>'btn btn-info btn-block')); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('layouts/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>