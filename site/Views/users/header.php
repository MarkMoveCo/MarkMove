<?php 
namespace site\Views\users;?>
<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div>
						<a class="navbar-brand" href="<?= $this->url('users','index');?>">
						<img id="logo" alt="Brand" src="../images/logo.png"></a>
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
							<li role="presentation" class="active"><a href="index.html">Mark Move</a></li>
							<?php if(!empty($this->user)): ?>
							<li role="presentation"><a href="#">Home<span class="badge"><?= count($this->user->getNotifications());?></span></a></li>
							<?php endif;?>
							<li role="presentation"><a href="#">Landmarks</a></li>
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
						</ul>
						<ul class="nav navbar-nav navbar-right">
						<?php if(empty($this->user)): ?>
							<li role="presentation"><a href="<?=$this->url("users","login");?>">Log in</a></li>
							<li role="presentation"><a href="<?=$this->url("users","register");?>">Sing up</a></li>
						<?php else: ?>
							<li role="presentation"><a href="<?= $this->url('users','profile');?>"><?=$this->user->getNickname();?></a></li>
							<li role="presentation"><a href="<?=$this->url('users','logout');?>">Log out</a></li>
						<?php endif; ?> 
						</ul>
					</div><!-- /.navbar-csollapse -->
				</div><!-- /.container-fluid -->
</nav>
