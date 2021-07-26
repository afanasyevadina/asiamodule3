<?php 
$query = new WP_Query([
	'post_type' => 'course',
	'order' => 'DESC',
]);
?>
<section class="courses">
	<div class="container">
		<h2 class="section-title">Courses</h2>
		<div class="row">
			<?php while($query->have_posts()) {
				$query->the_post(); ?>
				<div class="col">
					<div>
						<h4 class="courses-title"><?= get_the_title() ?></h4>
						<p class="courses-description"><?= get_the_excerpt() ?></p>
					</div>
					<div class="courses-date d-flex a-center j-end">
						<div class="date-large"><?= date('d', strtotime(get_post_meta(get_the_ID(), 'start_date', true))) ?></div>
						<div class="date-small"><?= date('M Y', strtotime(get_post_meta(get_the_ID(), 'start_date', true))) ?></div>
						<small class="date-divider">-</small>
						<div class="date-large"><?= date('d', strtotime(get_post_meta(get_the_ID(), 'end_date', true))) ?></div>
						<div class="date-small"><?= date('M Y', strtotime(get_post_meta(get_the_ID(), 'end_date', true))) ?></div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php wp_reset_postdata(); ?>