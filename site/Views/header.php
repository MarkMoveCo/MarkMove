<?php 
namespace site\Views;?>
<nav class="navbar transparent  navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div>
						<a class="navbar-brand" href="<?= $this->url();?>">
						<img id="logo" alt="Brand" src="http://localhost/site/images/logo.png"></a>
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
							<li role="presentation"><a href="<?= $this->url();?>">Mark Move</a></li>
							<?php if(!empty($this->user)): ?>
								<li class="presentation">
								<a href="<?= $this->url();?>">Home</a>		
							</li>

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
							<?php if(!empty($this->user)):?>
							<?php if($this->user->getRole()->getRole() =="Admin"):?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Manage Events</a></li>
									<li><a href="<?=$this->url('publications','manage');?>">Manage publications</a></li>
									<li><a href="<?= $this->url('users','permissions');?>">Permissions</a></li>
									<li><a href="#">Manage photos</a></li>
								</ul>
							</li>
						<?php endif;?>
						<?php endif;?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
						<?php if(empty($this->user)): ?>
							<li role="presentation"><a href="<?=$this->url(null,"login");?>">Log in</a></li>
							<li role="presentation"><a href="<?=$this->url(null,"register");?>">Sign up</a></li>
						<?php else: ?>
							<li role="presentation"><a href="<?= $this->url('users','profile');?>"><?=$this->user->getNickname();?></a></li>
							<li role="presentation"><a href="<?=$this->url(null,'logout');?>">Log out</a></li>
						<?php endif; ?> 
						</ul>
					</div><!-- /.navbar-csollapse -->
				</div><!-- /.container-fluid -->
</nav>
