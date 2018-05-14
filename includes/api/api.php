<?php


function spa_rest_api_init() {

    register_rest_field('post','spa_meta',[
        'get_callback'    => 'spa_get_additional_post_data',
        'update_callback' => null,
        'schema'          => null,
    ]);


    register_rest_route(
        'spa/v1',
        'menus',
        [
            'methods'      =>       'GET',
            'callback'     =>       'spa_menus_get_all_menus'
        ]);


    register_rest_route(
        'spa/v1',
        'menus/(?P<id>[a-zA-Z(-]+)',
        [
            'methods'      =>      'GET',
            'callback'     =>      'spa_menus_get_menu_data'
        ]);
}

function spa_get_additional_post_data($arr,$field_name,$request) {

    $user_id                           =   $arr['author'];
    $array_data                        =   [];
    $array_data['user_nicename']       =   get_the_author_meta('user_nicename',$user_id);
    $array_data['user_permalink']      =   get_author_posts_url($user_id);
    $array_data['thumbnail']           =   get_the_post_thumbnail_url($arr['id'],'full');
    return $array_data;

}

function spa_menus_get_all_menus(){

  $menus    =      [];
  foreach(get_registered_nav_menus() as $slug => $desc) {  //get_registered_nav_menus() return associative  array of all menus
      $obj    = new stdClass();
      $obj->slug  = $slug;
      $obj->description = $desc;
      $menus[]   = $obj;
  }

  return $menus;
}

function spa_menus_get_menu_data($data) {
    $locations             =            get_nav_menu_locations();// return all resisted menus
    $menus                 =            wp_get_nav_menu_object($locations[$data['id']]); // get the menu object form menu id
    $menu_items            =            wp_get_nav_menu_items($menus->term_id);// getting all items in menu

    return $menu_items;
}