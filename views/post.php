<?php
wp_register_script( 'prefix_jquery', '//code.jquery.com/jquery-3.3.1.js' );
wp_enqueue_script( 'prefix_jquery' );

wp_register_script( 'prefix_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' );
wp_enqueue_script( 'prefix_popper' );

wp_register_script( 'prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' );
wp_enqueue_script( 'prefix_bootstrap' );

wp_register_style( 'prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
wp_enqueue_style( 'prefix_bootstrap' );

global $wpdb;
$newtable  = $wpdb->get_results( "SELECT * FROM wp_test_lists" );
$newtable2 = $wpdb->get_results( "SELECT * FROM wp_test_lists_items" );
?>
<div class="container">
    <div class="row justify-content-center mt-2 mb-4">
        <?php
        echo '<div class="dropdown">';
        foreach ( $newtable as $lists ) {
            echo '<div class="btn-group mr-1 ml-1 mt-1 mb-1">';
            echo '<button class="btn btn-secondary dropdown-toggle" type="button" aria-label="' . $lists->value . '" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">' . $lists->value . '</button>';
            echo '<div class="dropdown-menu" aria-labelledby="' . $lists->value . '">';
            foreach ( $newtable2 as $items ) {
                if ( $items->parent_id == $lists->id ) {
                    echo '<a id="' . $items->id . '" class="dropdown-item" href="#">' . $items->description . '</a>';
                }
            }
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        ?>
    </div>
</div>
