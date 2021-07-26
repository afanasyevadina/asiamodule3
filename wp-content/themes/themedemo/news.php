<?php 
$query = new WP_Query([
	'post_type' => 'post',
]);
?>
<section class="news bg-blue text-white" id="news">
	<div class="container">
		<h2 class="section-title">News</h2>
		<div class="row row-3">
			<?php while($query->have_posts()) {
				$query->the_post(); ?>
				<div class="col">
					<h4 class="news-title"><?= get_the_title() ?></h4>
					<p class="news-description"><?= get_the_excerpt() ?></p>
					<small class="news-date"><?= get_the_date() ?></small>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php wp_reset_postdata(); ?>