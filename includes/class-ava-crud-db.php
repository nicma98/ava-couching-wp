<?php

/**
 * Clase para manejar el CRUD de la base de datos.
 * 
 * @package     Dashboard-Ava
 */
class AVA_CRUD_DB
{
    /**
     * Variable para el valor global de base de datos.
     */
    private $db;

    /**
     * Contructor de la clase.
     */
    public function __construct()
    {
        
        global $wpdb;
        $this->db = $wpdb;
        
    }

    /**
     * Funcion para obtener el listado de indicadores que se pueden calcular.
     */
    public function get_list_kpis()
    {

        $sql = "SELECT * FROM " . DASHBOARD_AVA_TABLE . ";";

        return $this->db->get_results($sql);

    }

    /**
     * Funcion para agregar valor a un indicador.
     */
    public function add_value_kpi($id, $year, $per, $value)
    {
        $result = "INSERT INTO " . DASHBOARD_AVA_TABLE_VALUES . " (id_kpi, year_value, per_value, value) VALUES (".$id.",'".$year."','".$per."',".$value.")";

        $response = [
            'result' => $result
        ];
        
        $this->db->flush();

        return json_encode($response);
    }

    /**
     * Funcion para editar valor de un indicador.
     */
    public function edit_value_kpi($id, $value)
    {
        $result = "UPDATE " . DASHBOARD_AVA_TABLE_VALUES . "SET value=".$value." WHERE id=".$id.";";

        $response = [
            'result' => $result
        ];
        
        $this->db->flush();

        return json_encode($response);
    }

    /**
     * Funcion para eliminar valor de un indicador.
     */
    public function delete_value_kpi($id)
    {
        $response = "DELETE FROM " . DASHBOARD_AVA_TABLE_VALUES . " WHERE id=".$id.";";

        $response = [
            'result' => $result
        ];
        
        $this->db->flush();

        return json_encode($response);
    }
}