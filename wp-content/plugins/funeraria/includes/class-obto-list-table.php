<?php

if ( ! class_exists ( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List table class
 */
class funeraria_List_Table extends \WP_List_Table {

    function __construct() {
        parent::__construct( array(
            'singular' => 'obto',
            'plural'   => 'obtos',
            'ajax'     => false
        ) );
    }

    function get_table_classes() {
        return array( 'widefat', 'fixed', 'striped', $this->_args['plural'] );
    }

    /**
     * Message to show if no designation found
     *
     * @return void
     */
    function no_items() {
        _e( 'Não existe obtuario Cadastrados!', 'wedeves' );
    }

    /**
     * Default column values if no callback found
     *
     * @param  object  $item
     * @param  string  $column_name
     *
     * @return string
     */
    function column_default( $item, $column_name ) {

        switch ( $column_name ) {
            case 'funeraria_name':
                return $item->funeraria_name;

            case 'funeraria_last_name':
                return $item->funeraria_last_name;

            case 'funeraria_birth':
                return $item->funeraria_birth;

            case 'funeraria_death':
                return $item->funeraria_death;

            case 'funeraria_biograpik':
                return $item->funeraria_biograpik;

            case 'funeraria_photo':
                return $item->funeraria_photo;

            default:
                return isset( $item->$column_name ) ? $item->$column_name : '';
        }
    }

    /**
     * Get the column names
     *
     * @return array
     */
    function get_columns() {
        $columns = array(
            'cb'           => '<input type="checkbox" />',
            'funeraria_name'      => __( 'Nome', 'wedeves' ),
            'funeraria_last_name'      => __( 'Sobrenome', 'wedeves' ),
            'funeraria_birth'      => __( 'Data de Nascimento', 'wedeves' ),
            'funeraria_death'      => __( 'Data do Obito', 'wedeves' ),
            'funeraria_biograpik'      => __( 'Biografia', 'wedeves' ),
            'funeraria_photo'      => __( 'Foto', 'wedeves' ),

        );

        return $columns;
    }

    /**
     * Render the designation name column
     *
     * @param  object  $item
     *
     * @return string
     */
    function column_funeraria_name( $item ) {

        $actions           = array();
        $actions['edit']   = sprintf( '<a href="%s" data-id="%d" title="%s">%s</a>', admin_url( 'admin.php?page=funeraria&action=edit&id=' . $item->id ), $item->id, __( 'Edit this item', 'wedeves' ), __( 'Edit', 'wedeves' ) );
        $actions['delete'] = sprintf( '<a href="%s" class="submitdelete" data-id="%d" title="%s">%s</a>', admin_url( 'admin.php?page=funeraria&action=delete&id=' . $item->id ), $item->id, __( 'Delete this item', 'wedeves' ), __( 'Delete', 'wedeves' ) );

        return sprintf( '<a href="%1$s"><strong>%2$s</strong></a> %3$s', admin_url( 'admin.php?page=funeraria&action=view&id=' . $item->id ), $item->funeraria_name, $this->row_actions( $actions ) );
    }

    /**
     * Get sortable columns
     *
     * @return array
     */
    function get_sortable_columns() {
        $sortable_columns = array(
            'name' => array( 'name', true ),
        );

        return $sortable_columns;
    }

    /**
     * Set the bulk actions
     *
     * @return array
     */
    function get_bulk_actions() {
        $actions = array(
            'trash'  => __( 'Move to Trash', 'wedeves' ),
        );
        return $actions;
    }

    /**
     * Render the checkbox column
     *
     * @param  object  $item
     *
     * @return string
     */
    function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="obto_id[]" value="%d" />', $item->id
        );
    }

    /**
     * Set the views
     *
     * @return array
     */
    public function get_views_() {
        $status_links   = array();
        $base_link      = admin_url( 'admin.php?page=sample-page' );

        foreach ($this->counts as $key => $value) {
            $class = ( $key == $this->page_status ) ? 'current' : 'status-' . $key;
            $status_links[ $key ] = sprintf( '<a href="%s" class="%s">%s <span class="count">(%s)</span></a>', add_query_arg( array( 'status' => $key ), $base_link ), $class, $value['label'], $value['count'] );
        }

        return $status_links;
    }

    /**
     * Prepare the class items
     *
     * @return void
     */
    function prepare_items() {

        $columns               = $this->get_columns();
        $hidden                = array( );
        $sortable              = $this->get_sortable_columns();
        $this->_column_headers = array( $columns, $hidden, $sortable );

        $per_page              = 20;
        $current_page          = $this->get_pagenum();
        $offset                = ( $current_page -1 ) * $per_page;
        $this->page_status     = isset( $_GET['status'] ) ? sanitize_text_field( $_GET['status'] ) : '2';

        // only ncessary because we have sample data
        $args = array(
            'offset' => $offset,
            'number' => $per_page,
        );

        if ( isset( $_REQUEST['orderby'] ) && isset( $_REQUEST['order'] ) ) {
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order']   = $_REQUEST['order'] ;
        }

        $this->items  = wd_get_all_obto( $args );

        $this->set_pagination_args( array(
            'total_items' => wd_get_obto_count(),
            'per_page'    => $per_page
        ) );
    }
}