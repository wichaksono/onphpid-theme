<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="header-container">
	<div class="container">
		<header class="row header-inner">
			<div class="col-md-3">
				<h1 class="site-title">
					<a href="<?php echo esc_url(home_url('/'));?>"><?php bloginfo('name');?></a>
				</h1>
			</div>
			<div class="col-md-9">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			</div>
		</header>
	</div>
</div>