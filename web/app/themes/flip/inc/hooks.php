<?php

/**
 * Hooks.
 */

function imageTagForJs($response, $attachment)
{
	foreach ($response['sizes'] as $size => $datas) {
		$response['sizes'][$size]['tag']    = wp_get_attachment_image($attachment->ID, $size);
		$response['sizes'][$size]['srcset'] = wp_get_attachment_image_srcset($attachment->ID, $size);
	}
	return $response;
}
add_filter('wp_prepare_attachment_for_js', 'imageTagForJs', 10, 2);


/**
 * Allow upload json file
 */
add_filter('upload_mimes', function ($mime_types) {
	$mime_types['json'] = 'application/json'; // Adding .json extension
	$mime_types['svg']  = 'image/svg+xml';
	$mime_types['svgz'] = 'image/svg+xml';
	return $mime_types;
}, 1);

/**
 * Header template
 * @return void
 */
add_action('flip_hook_header', 'flip_header_template');
function flip_header_template()
{
	load_template(get_template_directory() . '/template-parts/header.php', false);
}

/**
 * Footer template
 * @return void
 */
add_action('flip_hook_footer', 'flip_footer_template');
function flip_footer_template()
{
	load_template(get_template_directory() . '/template-parts/footer.php', false);
}


/**
 * Footer template
 * @return void
 */
add_action('flip_hook_search_modal', 'flip_search_modal_template');
function flip_search_modal_template()
{
	load_template(get_template_directory() . '/template-parts/search-modal.php', false);
}


/**
 * Post loop item template
 *
 * @param Int $post_id
 *
 * @return void
 */
add_action('flip_hook_post_loop_item', 'flip_post_loop_item_template', 20, 2);
function flip_post_loop_item_template($post_id, $index)
{
	set_query_var('post_id', $post_id);
	$v  = ($index) % 3;
	$vT = ceil($v);

	$anm = 'data-aos="fade-up" data-aos-duration="' . (($v !== 0 ? $vT : 3) * 400) . '"';
?>
	<article <?= $anm; ?> <?php post_class('item post-loop-item col-md-4') ?>>
		<?php flip_post_item() ?>
	</article>
<?php
}

//remove comments
add_action('admin_init', function () {
	// Redirect any user trying to access comments page
	global $pagenow;

	if ($pagenow === 'edit-comments.php' || $pagenow === 'options-discussion.php') {
		wp_redirect(admin_url());
		exit;
	}

	// Remove comments metabox from dashboard
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

	// Disable support for comments and trackbacks in post types
	foreach (get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page and option page in menu 
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
	remove_submenu_page('options-general.php', 'options-discussion.php');
});

// Remove comments links from admin bar
add_action('init', function () {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});



function fnhe_theme_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'logo_light' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_light', array(
        'label'    => __( 'Logo Light', 'fnhe' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_light',
    ) ) );
}
add_action( 'customize_register', 'fnhe_theme_customize_register' );