<?php 
get_header();
get_template_part('slider');
if(get_option('show_call')) get_template_part('call');
get_template_part('news');
get_template_part('solutions');
get_template_part('demo');
get_template_part('courses');
get_footer();
?>