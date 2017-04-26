<?php 
/*
Plugin Name: My Plugin
Version: 1.0
Plugin URI: http://danielpataki.com
Description: The descripion of your plugin.
Author: Daniel Pataki
Author URI: http://danielpataki.com/
*/

add_action( 'widgets_init', 'my_widget_init' );
 
function my_widget_init() {
    register_widget( 'my_widget' );
}
 
class my_widget extends WP_Widget
{
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'my_widget',
            'description' => 'My plugin description'
        );
 
        parent::__construct( 'my_widget', 'My Widget', $widget_details );
 
    }
 
    public function form( $instance ) {
        // Backend Form
    }
 
    public function update( $new_instance, $old_instance ) {  
        return $new_instance;
    }
 
    public function widget( $args, $instance ) {
        // Frontend display HTML
    }
 
}
?>
