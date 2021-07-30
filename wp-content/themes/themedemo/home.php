<?php 
get_header();
?>
<section class="news news-page bg-grey">
	<div class="container">
		<h2 class="section-title">News</h2>
		<div class="row">
			<?php while(have_posts()) {
				the_post(); ?>
				<div class="col" href="<?=get_the_permalink()?>">
					<h4 class="news-title"><?= get_the_title() ?></h4>
					<small><?= get_the_date() ?></small>
					<p class="news-description"><?= get_the_content() ?></p>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>