<?php 
get_header();
if(get_option('show_call')) get_template_part('call');
if(get_option('show_news')) get_template_part('news');
if(get_option('show_solutions')) get_template_part('solutions');
if(get_option('show_demo')) get_template_part('demo');
if(get_option('show_courses')) get_template_part('courses');
get_footer();
?>