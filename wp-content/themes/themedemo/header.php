<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header class="bg-dark text-white">

			<div class="container d-flex j-between a-center">
				<a href="/" class="logo">
					<b class="text-yellow">LO</b><b class="text-blue">GO</b>
				</a>
				<nav class="d-flex a-center">
					<?php wp_nav_menu(); ?>
					<div class="search d-flex a-center">
						<input type="checkbox" id="search-toggler" <?=get_search_query() ? 'checked' : ''?>>
						<form action="/" method="GET">
							<input type="search" name="s" value="<?=get_search_query()?>" placeholder="Search">
						</form>
						<label for="search-toggler" class="search-icon"></label>
					</div>
				</nav>
			</div>

		</header>
		<div class="banner">
			<?php 
			$query = new WP_Query([
				'post_type' => 'slide',
			]);
			?>
			<div class="slider">
				<?php 
				$i = 0;
				while($query->have_posts()) {
					$query->the_post(); ?>
					<div class="slide <?=$i ? '' : 'active'?>" style="background-image: url('<?=get_the_post_thumbnail_url()?>');"></div>
					<?php $i++;
				} ?>
			</div>
			<div class="slider-dots">
				<?php 
				$i = 0;
				while($query->have_posts()) {
					$query->the_post(); ?>
					<div class="slider-dot <?=$i ? '' : 'active'?>"></div>
					<?php $i++;
				} ?>
			</div>
			<?php wp_reset_postdata(); ?>
			<div class="container">
				<h1 class="site-title"><?= get_bloginfo('name') ?></h1>
				<p class="site-description">Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Vel, quisquam placeat consectetur tenetur! Corrupti quaerat dolorem repellendus, atque perferendis cupiditate quae quia veniam incidunt optio. Sunt magni adipisci nisi amet?</p>
			</div>
		</div>
