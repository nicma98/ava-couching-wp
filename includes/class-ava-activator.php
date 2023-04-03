<?php

/**
 * Esta clase define todo lo necesario durante la activación del plugin.
 *
 * @package     Dashboard-Ava
 */
class AVA_Activator
{

	/**
	 * Método estático que se ejecuta al activar el plugin
	 *
	 * Creación de la tabla {$wpdb->prefix}dashboard_ava
	 */
	public static function activate() {
		global $wpdb;

		$sql = "CREATE TABLE IF NOT EXISTS " . DASHBOARD_AVA_TABLE . " (
			id int(11) NOT NULL AUTO_INCREMENT,
			key_kpi varchar(50) NOT NULL,
			name_kpi varchar(50) NOT NULL,
			comment_kpi longtext NOT NULL,
		 	PRIMARY KEY (id) 
		);";

		$wpdb->query($sql);
	}

}





