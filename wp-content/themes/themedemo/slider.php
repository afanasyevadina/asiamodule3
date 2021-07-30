<div class="banner">
	<?php 
	$query = new WP_Query([
		'post_type' => 'solution',
	]);
	?>
	<div class="slider">
		<?php 
		$i = 0;
		while($query->have_posts()) {
			$query->the_post(); ?>
			<div class="slide bg-fixed <?=$i ? '' : 'active'?>" style="background-image: url('<?=get_the_post_thumbnail_url()?>');"></div>
			<?php $i++;
		} ?>
	</div>
	<div class="slider-content text-white d-flex a-center j-center">
		<div class="container">
			<h1 class="site-title"><?= get_bloginfo('name') ?></h1>
			<p class="site-subtitle">Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Vel, quisquam placeat consectetur tenetur! Corrupti quaerat dolorem repellendus, atque perferendis cupiditate quae quia veniam incidunt optio. Sunt magni adipisci nisi amet?</p>
			<div class="d-flex j-center header-btn">
				<a class="btn btn-white text-white" href="#solutions">Learn more</a>
			</div>
			<form class="header-btn search" action="/" method="GET" autocomplete="off">
				<input type="search" name="s" value="<?=get_search_query()?>" class="bg-grey" placeholder="Or search anything">
				<button class="btn bg-yellow d-flex a-center j-center">
					<img src="<?=get_stylesheet_directory_uri()?>/images/search.png" alt="" height="20">
				</button>
			</form>
			<div class="slider-dots d-flex j-center">
				<?php 
				$i = 0;
				while($query->have_posts()) {
					$query->the_post(); ?>
					<a href="#" data-slide="<?=$i?>" class="slider-dot bg-white <?=$i ? '' : 'active'?>"></a>
					<?php $i++;
				} ?>
			</div>
		</div>
	</div>
	<?php wp_reset_postdata(); ?>
</div>