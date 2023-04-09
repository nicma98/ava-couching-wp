<?php
require_once 'class-ava-ajax.php';
require_once 'class-ava-cargador.php';
require_once 'class-ava-menus.php';

/**
 * Clase master que incluye otras clases auxiliares
 * 
 * @package     Motos&Servitecas_Web
 */
class AVA_Master
{
    /**
     * Clase cargador para los hooks de Wordpress
     */
    protected $class_cargador;

    /**
     * Clase para el manejo en la administración de Wordpress
     */
    protected $class_admin;

    /**
     * Clase para agregar menus y sub menus en el panel de Wordpress
     */
    public $class_menus;

    /**
     * Clase para manejar las peticiones Ajax Jquery
     */
    public $class_ajax;

    /**
     * Metodo contructor de la clase
     */
    public function __construct()
    {
        $this->cargar_clases();
        $this->cargar_instancias();
        $this->definir_admin_hooks();
        $this->definir_public_hooks();
    }

    /**
     * Método para requerir las clases complementarias
     */
    public function cargar_clases()
    {
        /**
         * Clase de cargador para los hooks de Wordpress
         */
        require_once DASHBOARD_AVA_DIR . 'includes/class-ava-cargador.php';

        /**
         * Clase de menús para agregar items en el panel de Wordpress
         */
        require_once DASHBOARD_AVA_DIR . 'includes/class-ava-menus.php';

        /**
         * Clase de interacción con la base de datos
         */
        require_once DASHBOARD_AVA_DIR . 'includes/class-ava-crud-db.php';

        /**
         * Clase de métodos en el panel de Wordpress
         */
        require_once DASHBOARD_AVA_DIR . 'admin/class-ava-admin.php';

        /**
         * Clase de métodos en el formulario publico
         */
        require_once DASHBOARD_AVA_DIR . 'public/class-ava-public.php';
    }

    /**
     * Método que inicializa las clases asociadas a los atributos de la clase master
     */
    private function cargar_instancias()
    {
        $this->class_cargador =     new AVA_Cargador();
        $this->class_admin =        new AVA_Admin('dashboard-ava', DASHBOARD_AVA_VERSION);
        //$this->class_public =       new AVA_Public('dashboard-ava', DASHBOARD_AVA_VERSION);
        $this->class_ajax =         new AVA_Ajax();
    }

    /**
     * Método que agrega las funciones en los hooks de admin
     */
    private function definir_admin_hooks() {
        
        $this->class_cargador->add_list_action( 'admin_enqueue_scripts', $this->class_admin, 'enqueue_styles' );
        $this->class_cargador->add_list_action( 'admin_enqueue_scripts', $this->class_admin, 'enqueue_scripts' );
        $this->class_cargador->add_list_action( 'admin_menu', $this->class_admin, 'add_menu' );
        $this->class_cargador->add_list_action( 'admin_menu', $this->class_admin, 'add_submenu_contacto_clientes' );
        $this->class_cargador->add_list_action( 'wp_ajax_get_kpi', $this->class_ajax, 'get_kpi');
        $this->class_cargador->add_list_action( 'wp_ajax_get_kpi_values', $this->class_ajax, 'get_kpi_values');
        $this->class_cargador->add_list_action( 'wp_ajax_set_kpi_value', $this->class_ajax, 'set_kpi_value');
        $this->class_cargador->add_list_action( 'wp_ajax_delete_kpi_value', $this->class_ajax, 'delete_kpi_value');
    }

    /**
     * Método que agrega las funciones en los hooks publicos
     */
    private function definir_public_hooks()
    {
        //$this->class_cargador->add_list_action( 'wp_enqueue_scripts', $this->class_public, 'enqueue_scripts' );
        //$this->class_cargador->add_list_action( 'wp_enqueue_scripts', $this->class_public, 'enqueue_styles' );
    }

    /**
     * Método que carga las funciones en los hooks usando la clase cargador
     */
    public function init()
    {
        $this->class_cargador->run();
    }
}