jQuery(document).ready( function( $ ) {
    $( '#addTag' ).on( 'submit', function() {
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:     {'tag': $( '#tag' ).val()},
            cache:    false,
            url:      $( this ).prop( 'action' ),
            dataType: 'json',
            error: function (response) {
               // Error...
                var errors = $.parseJSON(response.responseText);

                console.log(errors);

                $.each(errors, function(index, value) {
                        alert(value);
                });
            },
            success: function (response) {
                $( '#tag' ).val('');
                var selector = '#' + response.tag;

                // If status is done and tag is not listed, list tag
                if(response.status == 'done' && ! $(selector).length > 0) {
                    var tag = response.tag.charAt(0).toUpperCase() + response.tag.substring(1);
                    var html = '<div class="chip center-align">' + tag + ' <i class="material-icons" data-button="remove" id="' + response.tag + '">close</i></div>';
                    $('#tags').append(html);
                }

            }
        });
 
        // Prevent the form from actually submitting in browser
        return false;
    } );

    $( 'i[data-button="remove"]' ).click( function() {
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:     {'tag': $( this ).prop( 'id' )},
            cache:    false,
            url:      'tag/remove',
            dataType: 'json',
            error: function (response) {
               // Error...
                var errors = $.parseJSON(response.responseText);

                console.log(errors);

                $.each(errors, function(index, value) {
                        alert(value);
                });
            },
            success: function (response) {
                if(response.status == 'removed') {
                    var selector = '#' + response.tag;
                    $(selector).parent().remove();
                }
            }
        });
    } );
 
} );