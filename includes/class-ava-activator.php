<?php

/**
 * Esta clase define todo lo necesario durante la activación del plugin.
 *
 * @package     Dashboard-Ava
 */
class MYS_Activator
{

	/**
	 * Método estático que se ejecuta al activar el plugin
	 *
	 * Creación de la tabla {$wpdb->prefix}servicios_mys_clientes
	 */
	public static function activate() {
		global $wpdb;

		$sql = "CREATE TABLE IF NOT EXISTS " . DASHBOARD_AVA_TABLE . " (
			id int(11) NOT NULL AUTO_INCREMENT,
			date_stmp TIMESTAMP,
			nombre_cliente varchar(50) NOT NULL,
			telefono_cliente varchar(50) NOT NULL,
			correo_cliente varchar(50) NOT NULL,
			sku_product varchar(50) NOT NULL,
		 	PRIMARY KEY (id) 
		);";

		$wpdb->query($sql);
	}

}





