<?php
/**
 * 
 */
class MYS_Public {
    
    /**
	 * El identificador único de éste plugin
	 */
    private $plugin_name;
    
    /**
	 * Versión actual del plugin
	 */
    private $version;

    /**
     * Atributo asociado a la clase CRUD que interactua con la base de datos de SIASOFT
     */
    private $crud_db;
    
    public function __construct( $plugin_name, $version ) {
        
        $this->plugin_name  = $plugin_name;
        $this->version      = $version;
    }
    
    /**
     * Archivo de estilos del formulario publico.
     */
    public function enqueue_styles() {
        
        wp_enqueue_style( $this->plugin_name, DASHBOARD_AVA_PLUGIN_URL . '/public/css/form-contact.css', array(), $this->version, 'all' );
        
    }
    
    /**
     * Script de JS para el formulario publico.
     */
    public function enqueue_scripts() {
        
        wp_enqueue_script( $this->plugin_name, DASHBOARD_AVA_PLUGIN_URL . '/public/js/post-contact.js', array( 'jquery' ), $this->version, true );

        wp_localize_script(
            $this->plugin_name,
            'object_ajax',
            [
                'url' => admin_url('admin-ajax.php'),
                'token' => wp_create_nonce('mys_token')
            ]
        );
        
    }

    /**
     * Formulario publico para los lcientes.
     */
    public function mys_services_contacto_clientes_form()
    {
        
    }

    /**
     * Funcion de conexion con SIASOFT para obtener saldos y precios.
     */
    public function mys_services_get_referencia()
    {

    }

}







