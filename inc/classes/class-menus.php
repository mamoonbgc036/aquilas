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

	public function get_child_menus( $menu_array , $parent_id ){
		// echo "<pre>";
		// print_r($menu_array);
		// wp_die();
		$child_menus = [];
		if ( !empty($menu_array) && is_array( $menu_array ) ){
			foreach ( $menu_array as $menu ){
				if( intval($menu->menu_item_parent) === $parent_id ){
					array_push( $child_menus, $menu );
				}
			}
		}
		echo "<pre>";
		print_r( $child_menus );
		wp_die();
	}
}
?>