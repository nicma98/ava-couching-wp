<?php

/**
 * Clase principal de funciones de administración.
 * 
 * @property string $plugin_name
 * @property string $version
 */
class AVA_Admin {
    
    /**
	 * El identificador único de éste plugin
	 */
    private $plugin_name;
    
    /**
	 * Versión actual del plugin
	 */
    private $version;

    /**
     * Clase para los menus del plugin
     */
    private $menu_admin;

    /**
     * CRUD para la base de datos de Wordpress
     */
    private $crud_db;
    
    /**
     * @param string $plugin_name nombre o identificador único de éste plugin.
     * @param string $version La versión actual del plugin.
     */
    public function __construct( $plugin_name, $version ) {
        
        $this->plugin_name = $plugin_name;
        $this->version = $version;  
        $this->menu_admin = new AVA_Menus();
        $this->crud_db = new AVA_CRUD_DB();
        
    }
    
    /**
	 * Registra los archivos de hojas de estilos del área de administración
	 */
    public function enqueue_styles() {
        
		wp_enqueue_style( $this->plugin_name, DASHBOARD_AVA_PLUGIN_URL . '/admin/css/ava-admin.css', array(), $this->version, 'all' );
        
    }
    
    /**
	 * Registra los archivos Javascript del área de administración
	 */
    public function enqueue_scripts() {
        
        wp_enqueue_editor();
        wp_enqueue_script( $this->plugin_name, DASHBOARD_AVA_PLUGIN_URL . '/admin/js/ava-admin.js', ['jquery'], $this->version, true );
        wp_localize_script(
            $this->plugin_name,
            'object_ajax',
            [
                'url' => admin_url('admin-ajax.php'),
                'token' => wp_create_nonce('ava_token')
            ]
        );
        
    }

    /**
     * Funcion para registrar menu principal
     */
    public function add_menu()
    {
        $this->menu_admin->add_menu_page(
            __("Dashboard KPI's","dashboard-kpis"),
            __("Dashboard KPI's","dashboard-kpis"),
            'manage_options',
            'dashboard-kpis',
            [$this, 'control_display_menu'],
            '',
            15
        );

        $this->menu_admin->run();
    }

    /**
     * Funcion para usar vista de menu principal
     */
    public function control_display_menu()
    {
        require_once DASHBOARD_AVA_DIR . 'admin/partials/ava-admin-display.php';
    }

    /**
     * Funcion para el sub menu de contacto clientes
     */
    public function add_submenu_contacto_clientes()
    {
        $this->menu_admin->add_submenu_page(
            'dashboard-kpis',
            __('Listado de indicadores','list-kpis'),
            __('Listado de indicadores','list-kpis'),
            'manage_options',
            'list-kpis',
            [$this, 'control_display_submenu_listado_kpis'],
        );

        $this->menu_admin->run();
    }

    /**
     * 
     */
    public function control_display_submenu_listado_kpis()
    {
        require_once DASHBOARD_AVA_DIR . 'admin/partials/ava-admin-display-list-kpis.php';
    }

    /**
     * 
     */
    public function get_list_kpis()
    {
        return $this->crud_db->get_list_kpis();
    }
    
}