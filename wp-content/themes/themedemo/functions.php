<?php 
add_theme_support('post-thumbnails');
add_action('init', 'register_custom_types_kz');
function register_custom_types_kz()
{
	register_post_type('solution', [
		'label' => 'Solutions',
		'public' => true,
		'supports' => ['thumbnail', 'editor', 'title'],
	]);

	register_post_type('course', [
		'label' => 'Courses',
		'public' => true,
		'supports' => ['editor', 'title'],
	]);

	register_post_type('slide', [
		'label' => 'Slider',
		'public' => true,
		'supports' => ['title', 'thumbnail'],
	]);
}

add_action('wp_enqueue_scripts', 'enqueue_scripts_kz');
function enqueue_scripts_kz()
{
	wp_dequeue_script('comment-reply');
	wp_dequeue_script('twentytwenty-js');
	wp_dequeue_style('twentytwenty-style');
	wp_dequeue_style('twentytwenty-print-style');
	wp_enqueue_script('kz-script', get_stylesheet_directory_uri() . '/js/script.js', [], '1.0', true);
}

add_action('add_meta_boxes', 'add_metaboxes_kz');
function add_metaboxes_kz()
{
	add_meta_box('course-dates', 'Course dates', 'course_dates_meta_box', 'course', 'normal', 'high');
}
function course_dates_meta_box($post)
{
	?>
	<p>
		<label>Start date: </label>
		<input type="date" name="extra[start_date]" value="<?=get_post_meta($post->ID, 'start_date', true) ?>">
	</p>
	<p>
		<label>End date: </label>
		<input type="date" name="extra[end_date]" value="<?=get_post_meta($post->ID, 'end_date', true) ?>">
	</p>
	<input type="hidden" name="extra_nonce" value="<?= wp_create_nonce(__FILE__) ?>">
	<?php
}

add_action('save_post', 'save_post_kz', 0);
function save_post_kz($postId)
{
	if(
		empty($_POST['extra'])
		|| !wp_verify_nonce($_POST['extra_nonce'], __FILE__)
		|| wp_is_post_revision($postId)
		|| wp_is_post_autosave($postId)
	) {
		return false;
	}
	foreach ($_POST['extra'] as $key => $value) {
		if(!$value) {
			delete_post_meta($postId, $key);
			continue;
		}
		update_post_meta($postId, $key, $value);
	}
	return $postId;
}
?>