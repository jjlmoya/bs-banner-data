<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package BS
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}
$block = 'block-bs-banner-data';

register_block_type('bonseo/' . $block,
	array(
		'attributes' => array(
			'name1' => array(
				'type' => 'string',
			),
			'name2' => array(
				'type' => 'string',
			),
			'name3' => array(
				'type' => 'string',
			),
			'counter1' => array(
				'type' => 'string',
			),
			'counter2' => array(
				'type' => 'string',
			),
			'counter3' => array(
				'type' => 'string',
			),
			'className' => array(
				'type' => 'string',
			)

		),
		'render_callback' => 'render_bs_banner_data',
	)
);

function bs_banner_data_assets()
{
	wp_enqueue_style(
		'bs_banner_data-style-css',
		plugins_url('dist/blocks.style.build.css', dirname(__FILE__)),
		array('wp-editor')
	);
}

add_action('enqueue_block_assets', 'bs_banner_data_assets');

function bs_banner_data_editor_assets()
{ // phpcs:ignore
	// Scripts.
	wp_enqueue_script(
		'bs_banner_data-block-js', // Handle.
		plugins_url('/dist/blocks.build.js', dirname(__FILE__)), // Block.build.js: We register the block here. Built with Webpack.
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), // Dependencies, defined above.
		// filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: File modification time.
		true // Enqueue the script in the footer.
	);
}


function render_bs_banner_data_entry($array)
{
	$html = '';
	foreach ($array as $entry) {
		$html .= '
		<div class="ml-data-quantity l-flex l-flex--justify__center">
			<p class="a-text a-text--bold a-text--secondary a-text--l a-pad--x ">
				' . $entry['counter'] . '
			</p>
			<p class="a-text a-text--secondary a-text--l a-pad--x a-slash a-slash--left a-text--mono-1">
				' . $entry['name'] . '
			</p>
		</div>';
	}
	return $html;
}

function render_bs_banner_data($attributes)
{
	$counterArray = array(
		array(
			'name' => isset($attributes['name1']) ? $attributes['name1'] : '',
			'counter' => isset($attributes['counter1']) ? $attributes['counter1'] : ''
		),
		array(
			'name' => isset($attributes['name2']) ? $attributes['name2'] : '',
			'counter' => isset($attributes['counter2']) ? $attributes['counter2'] : ''
		),
		array(
			'name' => isset($attributes['name3']) ? $attributes['name3'] : '',
			'counter' => isset($attributes['counter3']) ? $attributes['counter3'] : ''
		),
	);
	$class = isset($attributes['className']) ? ' ' . $attributes['className'] : '';


	return '
		<section class="og-banner-data 
						l-flex l-flex--justify-space-around l-grid-column--full
						a-bg--gradient--light a-bg--animated a-pad-40 l-flex--wrap
						a-mi a-mi--left bs_viewport ' . $class . '">
		' . render_bs_banner_data_entry($counterArray) . '
		</section>';
}

add_action('enqueue_block_editor_assets', 'bs_banner_data_editor_assets');
