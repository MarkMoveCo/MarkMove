<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link href="<?php echo e(asset('/css/main/reset.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/main/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/main/default.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/main/header-footer.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('style'); ?>

    <script src="<?php echo e(asset('/js/jquery-3.1.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>
</head>
<body>

<header>
    <nav class="navbar transparent  navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e(Html::image('img/logo.png', 'Brand', array('id' => 'logo'))); ?></a>
            </div>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input id="search-bar" type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-left">
                    <li role="presentation"><a href="<?php echo e(url('/')); ?>">Mark Move</a></li>
                    <li role="presentation"><a href="<?php echo e(url('landmark')); ?>">Landmarks</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tourism<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Paths</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">SPA tourism</a></li>
                            <li><a href="#">Ski tourism</a></li>
                            <li><a href="#">Sea tourism</a></li>
                            <li><a href="#">Camping</a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a href="#">Events</a></li>
                    <li role="presentation"><a href="#">Additional Info</a></li>
                    <?php if(!empty($this->user)):?>
                    <?php if($this->user->getRole()->getRole() =="Admin"):?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Manage Events</a></li>
                            <li><a href="#">Manage publications</a></li>
                            <li><a href="#">Permissions</a></li>
                            <li><a href="#">Manage photos</a></li>
                        </ul>
                    </li>
                    <?php endif;?>
                    <?php endif;?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(empty($this->user)): ?>
                    <li role="presentation"><a href="<?php echo e(url('/login')); ?>">Log in</a></li>
                    <li role="presentation"><a href="<?php echo e(url('/register')); ?>">Sign up</a></li>
                    <?php else: ?>
                    <li role="presentation"><a href="#"><?=$this->user->getNickname();?></a></li>
                    <li role="presentation"><a href="#">Log out</a></li>
                    <?php endif; ?>
                </ul>
            </div><!-- /.navbar-csollapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<main>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<footer>
    <?php echo $__env->yieldContent('footer'); ?>
</footer>

</body>
</html>