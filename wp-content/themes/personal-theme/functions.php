<?php


// Activate Wordpress components
add_theme_support( 'post-thumbnails' );


//Register main menu
register_nav_menu( 'main', 'navigation principale' );
register_nav_menu( 'footer', 'navigation fin de page' );

//Get menu structure as array

function dw_getMenu(){
    $menu = [];
    $locations = get_nav_menu_locations();

    foreach (wp_get_nav_menu_items($locations['main']) as $post) {
        $item = new stdClass();
        $item->url = $post->url;
        $item->label = $post->title;
        $item->children = [];

        if (!$post->menu_item_parent) {
            $menu[$post->ID] = $item;
        } else {
            $menu[$post->menu_item_parent]->children[$post->id] = $item;
        }
    };

    return $menu;
}

//Register Custom Post Type

function dw_register_post_types() {
    register_post_type('about', [
        'label' => 'About parts',
        'labels' => [
            'singular_name' => 'About parts',
            'add_new_item' => 'Add a part in the about page',
        ],
        'public' => true,
        'description' => 'The differents parts of the about page',
        'menu_icon' => 'dashicons-info',
        'menu_position' => 6
    ]);
    register_post_type('partners', [
        'label' => 'Our partners',
        'labels' => [
            'singular_name' => 'Our partners',
            'add_new_item' => 'Add a partner',
        ],
        'public' => true,
        'description' => 'All ou different partners',
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 7
    ]);
    register_post_type('Home page introduction', [
        'label' => 'Home page introduction',
        'labels' => [
            'singular_name' => 'Home page introduction',
            'add_new_item' => 'Add a new introduction',
        ],
        'public' => true,
        'description' => 'Home page introduction',
        'menu_icon' => 'dashicons-format-aside',
        'menu_position' => 5
    ]);
    register_post_type('Eligible equipment', [
        'label' => 'The list of the eligible equipment',
        'labels' => [
            'singular_name' => 'Eligible equipment',
            'add_new_item' => 'Add an eligible equipment',
        ],
        'public' => true,
        'description' => 'Eligible equipment',
        'menu_icon' => 'dashicons-archive',
        'menu_position' => 8
    ]);
}

add_action('init', 'dw_register_post_types');
