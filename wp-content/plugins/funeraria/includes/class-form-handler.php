<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
    }

    /**
     * Handle the funeraria new and edit form
     *
     * @return void
     */
    public function handle_form() {
        if ( ! isset( $_POST['submit_funeraria'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'funeraria-new' ) ) {
            die( __( 'Are you cheating?', 'wedeves' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'wedeves' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=funeraria' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;

        $funeraria_name = isset( $_POST['funeraria_name'] ) ? sanitize_text_field( $_POST['funeraria_name'] ) : '';
        $funeraria_last_name = isset( $_POST['funeraria_last_name'] ) ? sanitize_text_field( $_POST['funeraria_last_name'] ) : '';
        $funeraria_birth = isset( $_POST['funeraria_birth'] ) ? sanitize_text_field( $_POST['funeraria_birth'] ) : '';
        $funeraria_death = isset( $_POST['funeraria_death'] ) ? sanitize_text_field( $_POST['funeraria_death'] ) : '';
        $funeraria_biograpik = isset( $_POST['funeraria_biograpik'] ) ? sanitize_text_field( $_POST['funeraria_biograpik'] ) : '';
        $funeraria_photo = isset( $_POST['funeraria_photo'] ) ? sanitize_text_field( $_POST['funeraria_photo'] ) : '';

        // some basic validation
        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = array(
            'funeraria_name' => $funeraria_name,
            'funeraria_last_name' => $funeraria_last_name,
            'funeraria_birth' => $funeraria_birth,
            'funeraria_death' => $funeraria_death,
            'funeraria_biograpik' => $funeraria_biograpik,
            'funeraria_photo' => $funeraria_photo,
        );

        // New or edit?
        if ( ! $field_id ) {

            $insert_id = wd_insert_funeraria( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = wd_insert_funeraria( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
            $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );
        }

        wp_safe_redirect( $redirect_to );
        exit;
    }
}

new Form_Handler();