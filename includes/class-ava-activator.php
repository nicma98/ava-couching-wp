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

		$sql_3 = $sql_insert . "'fin_liquidez', 'Razón Corriente (Liquidez)', 'Razón corriente = Activo corriente / Pasivo corriente. Periodicidad Mensual');";
		$sql_4 = $sql_insert . "'fin_endeudamiento', 'Nivel de Endeudamento', 'Porcentaje total de la deuda que tiene un negocio con relación a sus recursos propios. Periodicidad Mensual');";
		$sql_5 = $sql_insert . "'fin_utilidad', 'Utilidad Neta', 'Utilidad bruta – impuestos – intereses – depreciación – gastos generales. Periodicidad Mensual');";

		$sql_6 = $sql_insert . "'cli_satisfaccion', 'Nivel de satisfacción de clientes', 'Promedio de resultados de encuesta de satisfacción. Periodicidad Anual');";
		$sql_7 = $sql_insert . "'cli_facturacion', 'Incremento de la facturación anual', '(Facturación periodo año actual/Facturación periodo año anterior) - 1 * 100. Periodicidad Anual');";

		$sql_8 = $sql_insert . "'proc_impl_gestion', 'Implementación Sis. de Gestión', '% de Cumplimiento Plan de  Implementación Sistema de Gestión. No de Actividades ejecutadas/Número de actividades programadas *100. Periodicidad Anual');";
		$sql_9 = $sql_insert . "'proc_impl_software', 'Implementación de Software', '% de Cumplimiento Plan de  Implementación Software. No de Actividades ejecutadas/Número de actividades programadas *100. Periodicidad Anual');";

		$wpdb->query($sql_3);
		$wpdb->query($sql_4);
		$wpdb->query($sql_5);

		$wpdb->query($sql_6);
		$wpdb->query($sql_7);

		$wpdb->query($sql_8);
		$wpdb->query($sql_9);

	}

}





