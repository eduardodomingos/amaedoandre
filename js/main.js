(function($) {
    $(document).ready(function(){

        var dom = {
			$window: $(window)
        };
        
        /*
         * Sticky Site Navigation
         */
        $("#site-navigation").stick_in_parent();

        /*
         * Sticky Recent Posts Widget
         */

        $('.sidebar').imagesLoaded( function() {
            // images have loaded
            var window_width = dom.$window.width();

            if (window_width < 992) {
                $(".share-tools").trigger("sticky_kit:detach");
            }
            else {
                make_sticky();
            }

            dom.$window.resize(function() {
                window_width = dom.$window.width();
                if (window_width < 992) {
                    $('.widget_amaedoandre_recent_posts').trigger("sticky_kit:detach");
                }else {
                    make_sticky();
                }
            });
          });

        function make_sticky() {
            $('.widget_amaedoandre_recent_posts').stick_in_parent({
                offset_top: 70,
                recalc_every: 10
                
            });
        }

        /*
         * Back to top
         */
        $('#js-to-top-button').click(function(){
            $(this).blur();
            $('html, body').animate({scrollTop : 0}, 1000, function() {});
        });


    });
}(jQuery));