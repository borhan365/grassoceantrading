<?php
class Tailwind_Nav_Walker extends Walker_Nav_Menu {
    // Starts the list before the elements are added.
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu hidden absolute left-0 z-50 mt-1 w-48 rounded-md bg-white py-2 shadow-lg ring-1 ring-black ring-opacity-5\">\n";
    }

    // Ends the list of after the elements are added.
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Starts the element output.
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
        // Add has-children class if the item has children
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'group relative';
        }
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= $indent . '<li' . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        // Add dropdown toggle for items with children
        $item_output = isset($args->before) ? $args->before : '';
        
        // Different classes for top-level and dropdown items
        $link_classes = $depth === 0 
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-700 hover:text-green-700' 
            : 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-green-700';
            
        $item_output .= '<a class="' . $link_classes . '"' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters( 'the_title', $item->title, $item->ID ) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add dropdown arrow for items with children
        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= '<svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    // Ends the element output, if needed.
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "</li>\n";
    }
}
?>
