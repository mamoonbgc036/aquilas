
<?php

use AQUILA_THEME\Inc\Menus;

  $menu_instance = Menus::get_instance();
  $header_menu_id = $menu_instance->get_menu_id( 'aquila-header-menus' );
  $header_menus   = wp_get_nav_menu_items( $header_menu_id );
  // echo "<pre>";
  // print_r( $header_menus );
  // wp_die();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <?php 
    if ( function_exists( 'the_custom_logo' ) ){
        the_custom_logo();
    }
  ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php 
        if( !empty( $header_menus ) && is_array( $header_menus ) ){
          foreach( $header_menus as $header_menu ){
            if ( $header_menu->menu_item_parent ){
              $menu_instance->get_child_menus( $header_menus, $header_menu->menu_item_parent );
            }

          }
        }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php 
