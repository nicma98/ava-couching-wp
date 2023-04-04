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
	public static function deactivate_kpis() {
        global $wpdb;

		$sql = "TRUNCATE TABLE " . DASHBOARD_AVA_TABLE . ";";

		$wpdb->query($sql);
	}

	public static function deactivate_values() {
        global $wpdb;

		$sql = "TRUNCATE TABLE " . DASHBOARD_AVA_TABLE_VALUES . ";";

		$wpdb->query($sql);
	}

}