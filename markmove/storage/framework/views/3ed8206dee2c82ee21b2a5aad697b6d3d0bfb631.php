<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('/css/user/registration.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Registration'); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel-primary panel">
        <div class="panel-body">
            <?php echo Form::open(array('url' => '/user', 'class' => 'form')); ?>


            <div class="form-group">
                <h2>Create account</h2>
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
                <?php echo Form::label('fullName', 'Full Name',
                    array(
                        'class' => 'control-label')); ?>

                <?php echo Form::text('fullName', null,
                    array('required',
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
                <?php echo Form::label('confirmPassword', 'Confirm Password',
                    array(
                        'class' => 'control-label')); ?>

                <?php echo Form::password('confirmPassword', null,
                array('required',
                    'class' => 'form-control')); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('age', 'Age', array('class' => 'control-label')); ?>

                <?php echo Form::number('age', null, array('class' => 'form-control', 'min' => '7')); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label(null, 'Gender', array('class' => 'control-label')); ?>

                <?php echo Form::radio('status', 'male', false); ?> Male
                <?php echo Form::radio('status', 'female', false); ?> Female
            </div>

            <div class="form-group">
                <?php echo Form::submit('Sign Up',
                array('class'=>'btn btn-info btn-block')); ?>

            </div>

            <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and
                our <a href="#">Privacy Policy</a>.</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>