	<header class="header">
		<div class="header__inner">
			<div class="header__logo navbar-brand">
				<a href="<?php echo home_url() ?>">
					Anest
				</a>
			</div>
			<nav class="navbar navbar-right" id="gloval">
	
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
						<span class="sr-only">メニュー</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
	
				<?php
					wp_nav_menu(
						array(
							'menu' => 'global',
							'container_id' => 'gnavi',
							'container_class' => 'collapse navbar-collapse',
							'items_wrap'      => '<ul class="nav navbar-nav">%3$s</ul>',
							// 'echo' => false
						)
					);
				?>
			
			</nav>
		</div>
</header>