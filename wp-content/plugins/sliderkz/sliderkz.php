<?php 
/*
Plugin Name: Slider KZ
Author: KZ
Version: 1.0
*/

add_action('wp_enqueue_scripts', 'enqueue_scripts_slider_kz');
function enqueue_scripts_slider_kz()
{
	wp_enqueue_script('slider-kz-script', plugin_dir_url(__FILE__) . '/js/script.js', [], '1.0', true);
}

add_action('init', 'register_custom_types_slider_kz');
function register_custom_types_slider_kz()
{
	register_post_type('slide', [
		'label' => 'Slider',
		'public' => true,
		'supports' => ['title', 'thumbnail'],
	]);
}

add_shortcode('slider_kz', 'slider_kz');

function slider_kz($attr, $content)
{
	?>
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
					<div class="slide bg-fixed <?=$i ? '' : 'active'?>" style="background-image: url('<?=get_the_post_thumbnail_url()?>');"></div>
					<?php $i++;
				} ?>
			</div>
			<div class="head text-white d-flex a-center j-center">
				<div class="container">
					<h1 class="site-title"><?= get_bloginfo('name') ?></h1>
					<p class="site-subtitle">Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Vel, quisquam placeat consectetur tenetur! Corrupti quaerat dolorem repellendus, atque perferendis cupiditate quae quia veniam incidunt optio. Sunt magni adipisci nisi amet?</p>
					<div class="d-flex j-center header-btn">
						<a class="btn btn-white text-white" href="#solutions">Learn more</a>
					</div>
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
	<?php 
}
?>