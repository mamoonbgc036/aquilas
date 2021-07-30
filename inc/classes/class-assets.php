<?php 

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets{
    use Singleton;
    
    protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action('wp_enqueue_scripts', [ $this, 'register_scripts']);
	}


	public function register_scripts(){
		wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime( get_template_directory(). '/style.css'), 'all');
        wp_register_style('bootstrap-css', AQUILA_DIR_URI . '/assets/css/bootstrap.min.css', [], false, 'all');

        wp_register_script('main-js', AQUILA_DIR_URI . '/assets/main.js', [], '1.0', true);
        wp_register_script('bootstrap-js', AQUILA_DIR_URI . '/assets/js/bootstrap.min.js', [], false, true);
        wp_register_script('jquery-js', AQUILA_DIR_URI . '/assets/js/jquery-3.4.1.js', [], false, true);

        wp_enqueue_style('stylesheet');
        wp_enqueue_style('bootstrap-css');
       
        wp_enqueue_script('jquery-js');
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
	}
}
?>