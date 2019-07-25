(
    function( $ ) {

        $( document ).ready( function() {
            $( '#list' ).live( 'click', function() {
                if ( $( '#form .form-control' ).val() != '' ) {
                    var listName = $( '#form .form-control' ).val();
                    $.ajax( {
                        type: 'POST',
                        url: ajaxurl,
                        data: $( '#form' ).serialize(),
                        success: function( data ) {
                            $( '.container' ).html( data );
                            $( '#response' ).html( function() {
                                return '<div class="text-success">Value: ' + listName + ' saved!</div>';
                            });
                        },
                    });
                } else {
                    $( '#response' ).html( function() {
                        return '<div class="text-danger">Add name list!</div>';
                    });
                }
                return false;
            });

            $( '#item' ).live( 'click', function() {
                if ( $( '#form2 input.form-control' ).val() != '' ) {
                    var itemName = $( '#form2 input.form-control' ).val();
                    $.ajax( {
                        type: 'POST',
                        url: ajaxurl,
                        data: $( '#form2' ).serialize(),
                        success: function( data ) {
                            $( '.container' ).html( data );
                            $( '#response2' ).html( function() {
                                return '<div class="text-success">Value: ' + itemName + ' saved!</div>';
                            });
                        },
                    });
                } else {
                    $( '#response2' ).html( function() {
                        return '<div class="text-danger">Add name item!</div>';
                    });
                }
                return false;
            });
        });
    }
)( jQuery );