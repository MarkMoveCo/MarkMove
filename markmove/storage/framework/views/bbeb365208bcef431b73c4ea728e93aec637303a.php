<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('/css/user/profile.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Permissions
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <table class="table table-striped table-bordered table-list">
            <thead>
            <tr>
                <th>Users</th>
                <th style="text-align: center">ROLE</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>Name of the user</td>
                <td style="text-align: center">
                    <input type="checkbox"/>
                </td>
            </tr>
            </tbody>
        </table>

        <input class="btn btn-default btn-block" type="submit" name="change_roles" value ="Save" onclick="saveChanges()"/>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>