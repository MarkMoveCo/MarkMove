<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('/css/landmark/index.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Landmarks'); ?>

<?php $__env->startSection('content'); ?>
    <div class="left-side">
        <div class="category">
            <h3 class="category-name">Most popular</h3>
            <ul >
                <li class="landmark panel">
                    <a href="#" href="@{/landmarks/view/{id}/(id=${landmark.id})}">
                        <img class="landmark-photo" src="http://www.smeshni7.com/wp-content/uploads/2012/09/%D1%8F%D0%BA%D0%B8-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-1.jpg"/>
                        <h4 class="landmark-name">The best place</h4>
                    </a>

                    <p class="landmark-name">Heaven</p>

                    <!--<p class="landmark-info" th:text="${landmark.description}">Do you want to try my reflex?</p>-->

                    <p class="landmark-info">Rating: <span></span></p>
                </li>
            </ul>
        </div>
    </div>

    <div class="right-side">
        <div class="map panel">
            <a class="map-text" href="#"><h3 class="category-name">Virtual Map</h3></a>

            <div id="googleMap"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>