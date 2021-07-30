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
}

add_action('wp_enqueue_scripts', 'enqueue_scripts_kz');
function enqueue_scripts_kz()
{
	wp_dequeue_script('comment-reply');
	wp_dequeue_script('twentytwenty-js');
	wp_dequeue_style('twentytwenty-style');
	wp_deregister_style('twentytwenty-style');
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

add_action('customize_register', function($wp_customize) {

	$wp_customize->add_section('blocks-edit',array(
	    'title'=>'Enable/disable blocks',
	    'priority' => 11,
	));


	$wp_customize->add_setting('show_call',array(
	    'default'=> true,
	    'type' => 'option',
	    'transport' => 'refresh',
	));


	$wp_customize->add_control('show_call',array(
	    'label'=>'Show call section',
	    'type'=>'checkbox',
	    'section'=>'blocks-edit',
	));


	$wp_customize->add_setting('show_news',array(
	    'default'=> true,
	    'type' => 'option',
	    'transport' => 'refresh',
	));


	$wp_customize->add_control('show_news',array(
	    'label'=>'Show news section',
	    'type'=>'checkbox',
	    'section'=>'blocks-edit',
	));


	$wp_customize->add_setting('show_courses',array(
	    'default'=> true,
	    'type' => 'option',
	    'transport' => 'refresh',
	));


	$wp_customize->add_control('show_courses',array(
	    'label'=>'Show courses section',
	    'type'=>'checkbox',
	    'section'=>'blocks-edit',
	));


	$wp_customize->add_setting('show_solutions',array(
	    'default'=> true,
	    'type' => 'option',
	    'transport' => 'refresh',
	));


	$wp_customize->add_control('show_solutions',array(
	    'label'=>'Show solutions section',
	    'type'=>'checkbox',
	    'section'=>'blocks-edit',
	));


	$wp_customize->add_setting('show_demo',array(
	    'default'=> true,
	    'type' => 'option',
	    'transport' => 'refresh',
	));


	$wp_customize->add_control('show_demo',array(
	    'label'=>'Show demo section',
	    'type'=>'checkbox',
	    'section'=>'blocks-edit',
	));
});

add_filter( 'wpcf7_validate', 'my_form_validate', 10, 2 );

function my_form_validate( $result, $tags ) {
	$form = WPCF7_Submission::get_instance();

	$callback = $form->get_posted_data( 'callback' );
	$phone = $form->get_posted_data( 'your-phone' );

	$error_msg = 'The field is required';

	if ( empty( $phone ) && $callback ) {
		$result->invalidate( 'your-phone', $error_msg );
	}

	return $result;
}
?>