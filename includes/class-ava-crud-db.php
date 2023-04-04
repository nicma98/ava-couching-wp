<?php

/**
 * Clase para manejar el CRUD de la base de datos.
 * 
 * @package     Dashboard-Ava
 */
class AVA_CRUD_DB
{
    /**
     * 
     */
    private $db;

    /**
     * 
     */
    public function __construct()
    {
        
        global $wpdb;
        $this->db = $wpdb;
        
    }

    /**
     * 
     */
    public function add_cliente($nombre, $telefono, $correo, $id_product){
        
        $columns =  [
            'nombre_cliente' => $nombre,
            'telefono_cliente' => $telefono,
            'correo_cliente' => $correo,
            'sku_product' => $id_product,
        ];

        $result = $this->db->insert(DASHBOARD_AVA_TABLE, $columns);

        $responde = [
            'result' => $result,
        ];

        $this->db->flush();

        return json_encode($responde);
    }

    /**
     * 
     */
    public function get_list_kpis()
    {

        $sql = "SELECT * FROM " . DASHBOARD_AVA_TABLE . ";";

        return $this->db->get_results($sql);

    }

    /**
     * 
     */
    public function delete_cliente($id)
    {
        
        $result = $this->db->delete(DASHBOARD_AVA_TABLE, array('id'=>$id));

        $response = [
            'result' => $result
        ];
        
        $this->db->flush();

        return json_encode($response);

    }

    /**
     * Funcion para agregar valor a un indocador.
     */
    public function add_value_kpi($id, $year, $per, $value)
    {
        $result = "INSERT INTO " . DASHBOARD_AVA_TABLE . " () VALUES (".$id.",".$year.",".$per.",".$value.")";

        $response = [
            'result' => $result
        ];
        
        $this->db->flush();

        return json_encode($response);
    }

    /**
     * Funcion para editar valor de un indicador.
     */
    public function edit_value_kpi($id, $year, $per, $value)
    {
        $result = "UPDATE " . DASHBOARD_AVA_TABLE . "SET WHERE;";

        $response = [
            'result' => $result
        ];
        
        $this->db->flush();

        return json_encode($response);
    }

    /**
     * Funcion para eliminar valor de un indicador.
     */
    public function delete_value_kpi($id, $year, $per)
    {
        $response = "DELETE FROM " . DASHBOARD_AVA_TABLE . " WHERE;";

        $response = [
            'result' => $result
        ];
        
        $this->db->flush();

        return json_encode($response);
    }
}