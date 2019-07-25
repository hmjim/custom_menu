<?php
$newtable = $wpdb->get_results( "SELECT * FROM wp_test_lists" );
$newtable2 = $wpdb->get_results( "SELECT * FROM wp_test_lists_items" );

?>
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
<div class="row">
    <div class="col-6">
        <div id="response"></div>
        <form id="form">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">List</span>
                </div>
                <input type="text" class="form-control" aria-label="Default"
                       aria-describedby="inputGroup-sizing-default" name="input_val">
            </div>
            <input type="hidden" name="action" value="myaction"/>
            <button id="list" class="btn btn-secondary">Add</button>
        </form>
    </div>
    <div class="col-6">
        <div id="response2"></div>
        <form id="form2">
            <div class="form-group mb-3">
                <select id="inputState" class="form-control" name="single">
                    <?php
                    foreach ( $newtable as $lists ) {
                        echo '<option value="' . $lists->id . '">' . $lists->value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">item</span>
                </div>
                <input type="text" class="form-control" aria-label="Default"
                       aria-describedby="inputGroup-sizing-default" name="input_val">
            </div>
            <input type="hidden" name="action" value="myaction2"/>
            <button id="item" class="btn btn-secondary">Add</button>
        </form>
    </div>
</div>
