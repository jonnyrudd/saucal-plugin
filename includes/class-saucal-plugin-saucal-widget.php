<?php

class Saucal_Widget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Saucal Feed Widget' );
	}

	function widget( $args, $instance ) {
		// Widget output
		$plugin_name = 'saucal-plugin';
		$version = '1.0.0';
		$spp = new Saucal_Plugin_Public( $plugin_name, $version );
		$spp->data_feed_content();
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function saucal_register_widgets() {
	register_widget( 'Saucal_Widget' );
}

add_action( 'widgets_init', 'saucal_register_widgets' );
