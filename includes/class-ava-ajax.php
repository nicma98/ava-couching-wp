<?php

/**
 * Clase que responde y maneja las peticiones Ajax.
 * 
 * @package     Dashboard-Ava
 */
class AVA_Ajax
{
    
    /**
     * Atributo asociado a la clase CRUD que interactua con la base de datoss
     */
    private $crud_db;

    /**
     * Constructor del Ajax
     */
    public function __construct()
    {

        $this->crud_db = new AVA_CRUD_DB();
        
    }

    /**
     * Funcion para solicitar un indicador
     */
    public function get_kpi()
    {
        check_ajax_referer('ava_token','token');

        if ( isset( $_POST['action'] ) ){

            $id_kpi = $_POST['id_kpi'];

            $result = $this->crud_db->get_kpi($id_kpi);

            echo json_encode(["data"=>$result]);

            wp_die();
        }
    }

    /**
     * Funcion para editar valor de un indicador
     */
    public function edit_value_kpi()
    {
        check_ajax_referer('ava_token','token');

        if ( isset( $_POST['action'] ) ){

            $id_kpi = $_POST['id_kpi'];
            $value_kpi = $_POST['value_kpi'];

            $result = $this->crud_db->edit_value_kpi($id_kpi, $value_kpi);

            error_log($result);

            wp_die();
        }
    }

    /**
     * Funcion para agregar valor de un indicador
     */
    public function add_value_kpi()
    {
        check_ajax_referer('ava_token','token');

        if ( isset( $_POST['action'] ) ){

            $id_kpi = $_POST['id_kpi'];
            $year_kpi = $_POST['year_kpi'];
            $per_kpi = $_POST['per_kpi'];
            $value_kpi = $_POST['value_kpi'];

            $result = $this->crud_db->add_value_kpi($id_kpi, $year_kpi, $per_kpi, $value_kpi);

            error_log($result);

            wp_die();
        }
    }

    /**
     * Funcion para eliminar valor de un indicador
     */
    public function delete_value_kpi()
    {
        check_ajax_referer('ava_token','token');

        if ( isset( $_POST['action'] ) ){

            $id_kpi = $_POST['id_kpi'];

            $result = $this->crud_db->delete_value_kpi($id_kpi);

            error_log($result);

            wp_die();
        }
    }

    /**
     * Funcion para obtener valores de un indicador
     */
    public function get_kpi_values()
    {
        check_ajax_referer('ava_token','token');

        if ( isset( $_POST['action'] ) ){

            $id_kpi = $_POST['id_kpi'];

            $result = $this->crud_db->get_kpi_values($id_kpi);

            echo json_encode(["data"=>$result]);

            wp_die();
        }
    }

    /**
     * Funcion para agregar un indicador
     */
    public function set_kpi_value()
    {
        check_ajax_referer('ava_token','token');

        if ( isset( $_POST['action'] ) ){

            $id_kpi = $_POST['id_kpi'];
            $year = $_POST['year_value'];
            $month = $_POST['per_value'];
            $value = $_POST['value'];

            $result = $this->crud_db->set_kpi_value($id_kpi, $year, $month, $value);

            echo json_encode(["data"=>$result]);

            wp_die();
        }
    }

    /**
     * Funcion para eliminar un indicador
     */
    public function delete_kpi_value()
    {
        check_ajax_referer('ava_token','token');

        if ( isset( $_POST['action'] ) ){

            $id_kpi = $_POST['id_kpi'];

            $result = $this->crud_db->delete_kpi_value($id_kpi);

            echo json_encode(["data"=>$result]);

            wp_die();
        }
    }
}

?>