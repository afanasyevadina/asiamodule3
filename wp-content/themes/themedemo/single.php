<?php 
get_header();
?>
<section class="bg-grey">
	<div class="container">
		<?php while(have_posts()) {
			the_post();
			?>
			<div class="section-title"><?= get_the_title() ?></div>
			<div><?= get_the_content() ?></div>
			<?php
		} ?>
	</div>
</section>
<?php
get_footer();
?>