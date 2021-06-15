
<?php
/**
 * Plugin Name: Funeraria
 * Description: plugin de funeraria Dark Mira Brasil
 * Plugin URI: https://#
 * Author: Cristiano Chags
 * Author URI: https://#
 * Version: 1.0.0
 * Licence: GPL2
 * Text Domain: Text Domain
 * Domain Path: Domain Path
 */
add_action('init', function(){

	include dirname(__FILE__). '\includes\class-funeraria-admin-menu.php';
	include dirname(__FILE__). '\includes\class-obto-list-table.php';
	include dirname(__FILE__). '\includes\class-form-handler.php';	
	include dirname(__FILE__). '\includes\obto-functions.php';	
	include dirname(__FILE__). '\includes\functions-funeraria.php';	
	new Funeraria_Admin_menu();


});

