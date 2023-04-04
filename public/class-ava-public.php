<?php
/**
 * Clase para el lado publico del plugin.
 * 
 * @package     Dashboard-Ava
 */
class AVA_Public {
    
    /**
	 * El identificador único de éste plugin.
	 */
    private $plugin_name;
    
    /**
	 * Versión actual del plugin.
	 */
    private $version;
    
    public function __construct( $plugin_name, $version ) {
        
        $this->plugin_name  = $plugin_name;
        $this->version      = $version;
    }

}







