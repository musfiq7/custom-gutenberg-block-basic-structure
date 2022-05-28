<?php
/*

  Plugin Name: Custom Block
  plugin description : custom gutenberg block

*/

function my_custom_block_register_block() {

	// Register JavasScript File build/index.js
	wp_register_script(
		'custom-block',
		plugins_url( 'build/index.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element', 'wp-editor' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' )
	);

	

	// Register editor style src/editor.css
	wp_register_style(
		'custom-block-editor-style',
		plugins_url( 'src/editor.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'src/editor.css' )
	);

	// Register front end block style src/style.css
	wp_register_style(
		'custom-block-frontend-style',
		plugins_url( 'src/style.css', __FILE__ ),
		array( ),
		filemtime( plugin_dir_path( __FILE__ ) . 'src/style.css' )
	);

	// Register your block
	register_block_type( 'custom-block/first-block', array(
		'editor_script' => 'custom-block',
		'editor_style' => 'custom-block-editor-style',
		'style' => 'custom-block-frontend-style',
	) );

}

add_action( 'init', 'my_custom_block_register_block' );


// custom category for custom block

function create_category($cat){
   return array_merge($cat,array(
	   array( 
		'slug' => 'Mycategory',
		'title' => 'My Custom Category'
		
	   )
    ));
}


add_filter('block_categories', 'create_category');
