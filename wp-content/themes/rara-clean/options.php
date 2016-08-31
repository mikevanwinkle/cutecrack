<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function rara_option_name() {
	// Change this to use your theme slug
	return 'options-rara-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'rara'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsrara_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'rara-clean' ),
		'two' => __( 'Two', 'rara-clean' ),
		'three' => __( 'Three', 'rara-clean' ),
		'four' => __( 'Four', 'rara-clean' ),
		'five' => __( 'Five', 'rara-clean' )
	);


	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
    
    // Pull all the post/pages into an array
    $rara_postlist = array();
    $rara_postlist[] =  __('--choose--', 'rara-clean');
	$rara_arg = array('posts_per_page'   => -1, 'post_type' => array( 'post', 'page' ));
	$rara_posts = get_posts($rara_arg); 
    foreach( $rara_posts as $rara_post ){ 
		$rara_postlist[$rara_post->ID] = $rara_post->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Home Page Options', 'rara-clean' ),
		'type' => 'heading'
	);

	/* $options[] = array(
		'name' => __( 'Upload Favicon', 'rara-clean' ),
		'id' => 'favicon_image',
		'type' => 'upload'
	);
*/

    $options[] = array(
		'name' => __( 'Upload Logo', 'rara-clean' ),
		'id' => 'logo_uploader',
		'type' => 'upload'
	);


    	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 3,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	/*$options[] = array(
		'name' => __( 'Footer Text Editor', 'rara-clean' ),
		'id' => 'foooter_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);*/


	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */


	$options[] = array(
		'name' => __( 'Featured Slider Option', 'rara-clean' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Featured Slider Post/Page #1', 'rara-clean' ),
		'id' => 'banner_img1_text',
		'type' => 'select',
        'options' => $rara_postlist
	);

    $options[] = array(
		'name' => __( 'Featured Slider Post/Page #2', 'rara-clean' ),
		'id' => 'banner_img2_text',
		'type' => 'select',
        'options' => $rara_postlist
	);

	$options[] = array(
		'name' => __( 'Featured Slider Post/Page #3', 'rara-clean' ),
		'id' => 'banner_img3_text',
		'type' => 'select',
        'options' => $rara_postlist
	);

	$options[] = array(
		'name' => __( 'Featured Slider Post/Page #4', 'rara-clean' ),
		'id' => 'banner_img4_text',
		'type' => 'select',
        'options' => $rara_postlist
	);

	$options[] = array(
		'name' => __( 'Featured Slider Post/Page #5', 'rara-clean' ),
		'id' => 'banner_img5_text',
		'type' => 'select',
        'options' => $rara_postlist
	);


	$options[] = array(
		'name' => __( 'The following are the steps on how to use the Featured Slider. ', 'rara-clean' ),
		'desc' => __( "1. Create a post/page and add a featured image to it. <br>  2. Select Post/Page that you want to display in the featured slider.", 'rara-clean' ),
		'type' => 'info'
	);





	
return $options;
}