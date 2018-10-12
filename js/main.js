(function($) {
    $(document).ready(function(){
        /*
         * Sticky Site Navigation
         */
        $("#site-navigation").stick_in_parent();

        /*
         * Back to top
         */
        $('#js-to-top-button').click(function(){
            $(this).blur();
            $('html, body').animate({scrollTop : 0}, 1000, function() {});
        });


    });
}(jQuery));