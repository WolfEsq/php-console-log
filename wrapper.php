<?php



function console_log( $info, $type = 'info' ) {
    
    $output_type = $type;
    
    if ( $type == 'info' ){ $output_type = Console::INFO; }
        
    elseif ( $type == 'debug' ){ $output_type = Console::DEBUG; }
    
    elseif ( $type == 'warning' ){ $output_type = Console::WARNING; }
    
    elseif ( $type == 'error' ){ $output_type = Console::ERROR;}
    
    else { $output_type = Console::INFO; }
    
    Console::show( $info, $output_type );

}



// console_log( get_user_meta( 1 ), 'debug' );



// /**
//  * Add log button
//  */
// function add_toolbar_items($admin_bar){
    
//     $admin_bar->add_menu( array(
//         'id'    => 'console-log',
//         'title' => 'Log',
//         'href'  => '#',
//         'meta'  => array(
//             'title' => __('Log'),
//             // 'target' => '_blank',
//             'class' => 'ab-top-secondary',
//             'tabindex' - 1
//         ),
//     ));
// }
// add_action('admin_bar_menu', 'add_toolbar_items', 100);
