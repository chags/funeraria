<?php

/**
 * Insert a new funeraria
 *
 * @param array $args
 */
function wd_insert_funeraria( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'funeraria_name' => '',
        'funeraria_last_name' => '',
        'funeraria_birth' => '',
        'funeraria_death' => '',
        'funeraria_biograpik' => '',
        'funeraria_photo' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'funeraria';

    // some basic validation

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
    unset( $args['id'] );

    if ( ! $row_id ) {

        $args['date'] = current_time( 'mysql' );

        // insert a new
        if ( $wpdb->insert( $table_name, $args ) ) {
            return $wpdb->insert_id;
        }

    } else {

        // do update method here
        if ( $wpdb->update( $table_name, $args, array( 'id' => $row_id ) ) ) {
            return $row_id;
        }
    }

    return false;
}