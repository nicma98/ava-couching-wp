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
	 * Creación de la tabla de indicadores
	 */
	public static function activate() {
		global $wpdb;

		$sql_1 = "CREATE TABLE IF NOT EXISTS " . DASHBOARD_AVA_TABLE . " (
			id int(11) NOT NULL AUTO_INCREMENT,
			key_kpi varchar(50) NOT NULL,
			name_kpi varchar(50) NOT NULL,
			comment_kpi longtext NOT NULL,
		 	PRIMARY KEY (id) 
		);";

		$wpdb->query($sql_1);

		$sql_2 = "CREATE TABLE IF NOT EXISTS " . DASHBOARD_AVA_TABLE_VALUES . " (
			id int(11) NOT NULL AUTO_INCREMENT,
			id_kpi int(11) NOT NULL,
			year_value char(4) NOT NULL,
			per_value char(2) NOT NULL,
			value float(11,2) NOT NULL,
		 	PRIMARY KEY (id) 
		);";

		$wpdb->query($sql_2);

		$sql_insert = "INSERT INTO " . DASHBOARD_AVA_TABLE . " (key_kpi, name_kpi, comment_kpi) VALUES (";

		$sql_3 = $sql_insert . "'fin_rentabilidad', 'Rentabilidad', 'Prueba del indicador de rentabilidad');";
		$sql_4 = $sql_insert . "'fin_rotacion', 'Rotación', 'Prueba del indicador de rotación.');";

		$wpdb->query($sql_3);
		$wpdb->query($sql_4);

	}

}





