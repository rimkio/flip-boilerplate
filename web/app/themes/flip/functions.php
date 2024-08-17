<?php

if (!defined('FLIP_WP_TOOLKIT_VER')) {
	define('FLIP_WP_TOOLKIT_VER', '1.0');
}

require get_template_directory() . '/inc/reset.php';
require get_template_directory() . '/inc/initialize.php';
require get_template_directory() . '/inc/assets.php';
require get_template_directory() . '/inc/acf-options.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/meta.php';
require get_template_directory() . '/inc/images.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-func.php';
require get_template_directory() . '/inc/hooks.php';
require get_template_directory() . '/inc/menus.php';  
