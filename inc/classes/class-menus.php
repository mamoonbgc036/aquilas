<?php 

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Menus{
    use Singleton;
    
    protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action('init', [ $this, 'register_menus']);
	}


	public function register_menus(){
		register_nav_menus(
            [
                'aquila-header-menus' => esc_html__( 'Header menus', 'aquila' ),
                'aquila-footer-menus' => esc_html__( 'Footer menus', 'aquila' )
            ]
        );
	}

	public function get_menu_id( $location ) {
		$locations = get_nav_menu_locations();
		$menu_id = $locations[ $location ];
		return ! empty( $menu_id ) ? $menu_id : "";
	}
}
?>