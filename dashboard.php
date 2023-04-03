<?php
/**
 * Plugin Name:     Dashboard AVA COUCHING SAS BIC
 * Plugin URI:
 * Description:     Plugin complementario para dashboard de AVA COUCHING SAS BIC
 * Version:         1.0.0
 * Author:          Nicolas Muñoz UNIR
 * Author URI:
 * Text Domain:     dashboard-ava
 *
 * @package     Dashboard-Ava
 */
 
defined( 'ABSPATH' ) || die();

global $wpdb;
 
define( 'DASHBOARD_AVA_DIR', plugin_dir_path( __FILE__ ) );
define( 'DASHBOARD_AVA_PLUGIN_FILE', __FILE__ );
define( 'DASHBOARD_AVA_PLUGIN_URL', plugins_url() . '/dashboard' );
define( 'DASHBOARD_AVA_VERSION', '1.0.0' );
define( 'DASHBOARD_AVA_TABLE', "{$wpdb->prefix}dashboard_ava_kpis" );
define( 'DASHBOARD_AVA_TEXT_DOMAIN', 'dashboard-ava' );

/**
 * Código que se ejecuta en la activación del plugin
 */
function dashboard_ava_activate() {
    require_once DASHBOARD_AVA_DIR . 'includes/class-ava-activator.php';
	AVA_Activator::activate();
}
register_activation_hook( __FILE__, 'dashboard_ava_activate' );


/**
 * Código que se ejecuta en la desactivación del plugin
 */
function servicios_mys_deactivate() {
    require_once DASHBOARD_AVA_DIR . 'includes/class-ava-deactivator.php';
	MYS_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'dashboard_ava_deactivate' );
 
/**
 * Requiriendo la clase master
 */
require_once DASHBOARD_AVA_DIR . 'includes/class-ava-master.php';

/**
 * Funcion para iniciar la clase master
 */
function ava_run_master_class_plugin(){
    $master = new MYS_Master();
    $master->init();
}

ava_run_master_class_plugin();