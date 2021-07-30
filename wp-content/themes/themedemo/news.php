<section class="news bg-blue text-white">
	<div id="news" class="section-anchor"></div>
	<div class="container">
		<div class="news-head">
			<h2 class="section-title">News</h2>
			<div class="d-flex j-center show-all">
				<a href="/blog" class="btn btn-white text-white">Show all</a>
			</div>
		</div>
		<div class="row row-3">
			<?php while(have_posts()) {
				the_post(); ?>
				<a class="col text-white" href="<?=get_the_permalink()?>">
					<h4 class="news-title"><?= get_the_title() ?></h4>
					<p class="news-description"><?= get_the_excerpt() ?></p>
					<small class="news-date"><?= get_the_date() ?></small>
				</a>
			<?php } ?>
		</div>
	</div>
</section>