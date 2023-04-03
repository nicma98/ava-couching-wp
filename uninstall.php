<?php

/**
 * Se activa cuando el plugin va a ser desinstalado.
 *
 * @package     Dashboard-Ava
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

function uninstall_plugin(){

	global $wpdb;

	$sql = "DROP TABLE " . DASHBOARD_AVA_TABLE . ";";

	$wpdb->query($sql);

}

uninstall_plugin();


