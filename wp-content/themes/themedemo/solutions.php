<?php 
$query = new WP_Query([
	'post_type' => 'solution',
	'order' => 'ASC',
]);
?>
<section class="solutions bg-grey">
	<h2 class="section-title">Solutions</h2>
	<p class="section-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
	<?php while($query->have_posts()) {
		$query->the_post(); ?>
		<div class="row row-2">
			<div class="col bg-block bg-fixed" style="background-image: url('<?=get_the_post_thumbnail_url()?>');"></div>
			<div class="col col-text d-flex a-center bg-white">
				<div>
					<h4 class="solutions-title"><?= get_the_title() ?></h4>
					<p class="solutions-description"><?= get_the_excerpt() ?></p>
				</div>
			</div>
		</div>
	<?php } ?>
</section>
<?php wp_reset_postdata(); ?>