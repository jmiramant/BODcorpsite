
jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    $('#misha_loadmore').on('click', function(e){
         e.preventDefault();
        //var current_catid = $(".filter-button-list .current").data('catid');
         
        var button = $(this),
            data = {
            'action': 'loadmore',
            'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
            'page' : misha_loadmore_params.current_page
        };
 
        $.ajax({ // you can also use $.post here
            url : misha_loadmore_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            // beforeSend : function ( xhr ) {
            //     button.text('Loading...'); // change the button text, you can also add a preloader image
            // },
            success : function( data ){
                if( data ) { 
                    $(".filter-item-list.clearfix").append(data);
                    misha_loadmore_params.current_page++;
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });
});
