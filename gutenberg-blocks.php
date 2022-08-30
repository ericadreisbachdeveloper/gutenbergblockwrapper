<?php

/*
Plugin Name: Gutenberg Blocks
Version: 1.1
Plugin URI: https://florianbrinkmann.com/en/5339/gutenberg-wrap-core-block-in-element/
Description: Wrap elements from Wordpress 5+ (Gutenberg) in wrapper divs
Author URI: https://ericadreisbach.com/
*/


if ( ! defined( 'ABSPATH' ) ) {  exit; }


function dbllc_gutenberg_wrapper( $block_content, $block ) {


	// non-empty blocks get the wrapper
	if( $block['blockName'] != '' && ($block['blockName'] !== "core/column") &&  ($block['blockName'] !== "core/cover") && $block['blockName'] !== "core/button") {

		$block_content = '<div class="gutenberg-section ' . sanitize_title($block['blockName']) . '"><div class="gutenberg-container">' . $block_content . '</div></div>';

		return $block_content;
	}


	// cover / hero
	elseif ($block['blockName'] == "core/cover") {
		$block_content = '<div class="gutenberg-section ' . sanitize_title($block['blockName']) . '"><div class="gutenberg-container">' . $block_content . '</div></div>';

		return $block_content;

	}

	else { return $block_content; }

}
add_filter( 'render_block', 'dbllc_gutenberg_wrapper', 10, 2 );
