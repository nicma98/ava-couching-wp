<?php

/**
 * Se activa en la desactivación del plugin
 *
 * @package     Motos&Servitecas_Web
 */
class AVA_Deactivator
{

	/**
	 * Método estático
	 *
	 * Método que se ejecuta al desactivar el plugin
	 */
	public static function deactivate() {
        global $wpdb;

		$sql = "TRUNCATE TABLE " . DASHBOARD_AVA_TABLE . ";";

		$wpdb->query($sql);
	}

}