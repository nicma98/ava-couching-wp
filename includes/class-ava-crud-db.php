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
     * Funcion para obtener un solo indicador
     */
    public function get_kpi($id)
    {

        $sql = "SELECT * FROM " . DASHBOARD_AVA_TABLE . " WHERE id=" . $id . ";";

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
     * Funcion para eliminar valor de un indicador.
     */
    public function delete_kpi_value($id)
    {
        $query = "DELETE FROM " . DASHBOARD_AVA_TABLE_VALUES . " WHERE id=".$id.";";

        $result = $this->db->query($query);

        $response = [
            'result' => $result
        ];

        return json_encode($response);
    }

    /**
     * Funcion para obtener valores de un indicador especifico
     */
    public function get_kpi_values($id)
    {

        $sql = "SELECT * FROM " . DASHBOARD_AVA_TABLE_VALUES . " WHERE id_kpi=" . $id . ";";

        return $this->db->get_results($sql);

    }

    /**
     * Funcion para agregar valor a un indicador
     */
    public function set_kpi_value($id_kpi, $year, $month, $value)
    {
        
        $query =   "INSERT INTO " . DASHBOARD_AVA_TABLE_VALUES;
        $query .=  " (id_kpi,year_value,per_value,value) VALUES (";
        $query .=  $id_kpi;
        $query .=  ",'" . $year . "','";
        $query .=  $month . "',";
        $query .=  $value . ");";

        $result = $this->db->query($query);

        $response = [
            'result' => $result
        ];

        return json_encode($response);
    }
}