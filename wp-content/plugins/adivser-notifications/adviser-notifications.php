<?php
/*
Plugin Name:  Adviser Notifications
Description:  Push notifications out to advisees
Author:       Kevin Briggs
License:      GPL2
Text Domain:  wporg
Domain Path:  /languages
*/

function create_notification() {
    register_post_type( 'notifications',
        array(
            'labels' => array(
                'name' => 'Notifications',
                'singular_name' => 'Notification',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Notification',
                'edit' => 'Edit',
                'edit_item' => 'Edit Notification',
                'new_item' => 'New Notification',
                'view' => 'View',
                'view_item' => 'View Notification',
                'search_items' => 'Search Notifications',
                'not_found' => 'No Notifications found',
                'not_found_in_trash' => 'No Notifications found in Trash',
                'parent' => 'Parent Notification'
            ),
 
            'public' => true,
            'menu_position' => 25,
            'supports' => array( 'title', 'editor' ),
            'has_archive' => true,
            'show_in_rest' => true,
        )
    );
}

function notification_rest_api(){
    register_rest_field('notifications', 'student_year', array(
        'get_callback' => function() {return get_post_custom_values('year');}
    ));
    register_rest_field('notifications', 'when_to_notify', array(
        'get_callback' => function() {return get_post_custom_values('when_to_notify');}
    ));

    register_rest_field('post', 'student_year', array(
        'get_callback' => function() {return get_post_custom_values('student_year');}
    ));

    register_rest_field('post', 'content_month', array(
        'get_callback' => function() {return get_post_custom_values('appMonth');}
    ));
}

add_action('init', 'create_notification' );
add_action('rest_api_init', 'notification_rest_api');
?>