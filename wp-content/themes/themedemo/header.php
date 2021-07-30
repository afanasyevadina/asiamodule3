<!DOCTYPE html>

<html class="no-js my" <?php language_attributes(); ?> style="margin-top: 0 !important">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open();
	?>

	<div class="header-before"></div>
	<header class="bg-dark text-white d-flex a-center">

		<div class="container d-flex j-between a-center">
			<label for="menu-toggler" class="menu-icon">
				<span class="bg-white"></span>
				<span class="bg-white"></span>
				<span class="bg-white"></span>
			</label>
			<a href="/" class="logo">
				<b class="text-yellow">LO</b><b class="text-blue">GO</b>
			</a>
			<input type="checkbox" id="menu-toggler">
			<nav class="d-flex a-center">
				<?php wp_nav_menu(); ?>
			</nav>
		</div>

	</header>
	
