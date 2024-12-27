<?php
function register_menus()
{
	register_nav_menus(
		array(
			'nav-menu' => esc_html__('nav-menu', 'kopo'),
			'footer-menu' => esc_html__('footer-menu', 'kopo')
			
		
			
		)
	);
}
add_action('init', 'register_menus');
?>


<?php
class navWalker extends Walker_Nav_Menu {
    // Modyfikacja tagu <li> dla głównych elementów menu
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        // Dodajemy naszą klasę do elementu <li>
        $classes[] = 'nav__item';  // Zmieniamy 'custom-class' na dowolną klasę

        // Usuwamy puste klasy
        $classes = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $classes = $classes ? ' class="' . esc_attr( $classes ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= '<li' . $id . $classes .'>'; // Start elementu <li>

        // Generowanie tagu <a>
        $atts = array();
        $atts['href'] = ! empty( $item->url ) ? $item->url : '#'; // Link do elementu
        $atts['class'] = 'nav__link'; // Dodaj klasę do tagu <a>

        // Atrybuty mogą być również filtrowane
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        // Generowanie tagu <a>
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>'; 
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // Zapisujemy wygenerowane dane do $output
        $output .= $item_output;
    }

    // Modyfikacja tagu <ul> dla submenu
    function start_lvl( &$output, $depth = 0, $args = null ) {
        // Dodajemy klasę do elementu <ul> w submenu
        $classes = isset( $args->classes ) ? $args->classes : array();
        $classes[] = 'nav__submenu';  // Dodajemy klasę do submenu

        $classes = join( ' ', apply_filters( 'nav_menu_submenu_css_class', array_filter( $classes ), $args, $depth ) );
        $classes = $classes ? ' class="' . esc_attr( $classes ) . '"' : '';

        $output .= '<ul' . $classes . '>'; // Start elementu <ul> z klasą dla submenu
    }
}
?>

<?php
function add_arrow_icon( $items, $args ) {
	if ( $args->theme_location == 'nav-menu' ) {
		$pattern = '/<li[^>]*\bclass="[^"]*\bmenu-item-has-children\b[^"]*"[^>]*>/';

		$arrow_btn = '
        <button type="button" class="nav__arrow">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="arrow-icon"
            xmlns="http://www.w3.org/2000/svg">
          <g id="type=ep:arrow-up">
              <path id="Vector"
                d="M11.4568 15.9299L3.49181 7.57045C3.35884 7.43096 3.28467 7.24565 3.28467 7.05295C3.28467 6.86024 3.35884 6.67493 3.49181 6.53545L3.50081 6.52645C3.56527 6.45859 3.64286 6.40456 3.72886 6.36764C3.81486 6.33072 3.90747 6.31168 4.00106 6.31168C4.09465 6.31168 4.18726 6.33072 4.27326 6.36764C4.35926 6.40456 4.43685 6.45859 4.50131 6.52645L12.0013 14.3984L19.4983 6.52645C19.5628 6.45859 19.6404 6.40456 19.7264 6.36764C19.8124 6.33072 19.905 6.31168 19.9986 6.31168C20.0921 6.31168 20.1848 6.33072 20.2708 6.36764C20.3568 6.40456 20.4343 6.45859 20.4988 6.52645L20.5078 6.53545C20.6408 6.67493 20.715 6.86024 20.715 7.05295C20.715 7.24565 20.6408 7.43096 20.5078 7.57045L12.5428 15.9299C12.4728 16.0035 12.3885 16.062 12.2952 16.102C12.2018 16.142 12.1014 16.1626 11.9998 16.1626C11.8983 16.1626 11.7978 16.142 11.7044 16.102C11.6111 16.062 11.5269 16.0035 11.4568 15.9299Z"
                class="dropdown-icon" fill="white" />
            </g>
          </svg>
        </button>';

		$items = preg_replace( $pattern, '$0' . $arrow_btn, $items );
	}

	return $items;
}

add_filter( 'wp_nav_menu_items', 'add_arrow_icon', 10, 2 );

?>