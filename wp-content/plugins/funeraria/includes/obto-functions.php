<?php

/**
 * Get all obto
 *
 * @param $args array
 *
 * @return array
 */
function wd_get_all_obto( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'obto-all';
    $items     = wp_cache_get( $cache_key, 'wedeves' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'funeraria ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'wedeves' );
    }

    return $items;
}

/**
 * Fetch all obto from database
 *
 * @return array
 */
function wd_get_obto_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'funeraria' );
}

/**
 * Fetch a single obto from database
 *
 * @param int   $id
 *
 * @return array
 */
function wd_get_obto( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'funeraria WHERE id = %d', $id ) );
}