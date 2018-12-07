(function($) {
    $(document).ready(function(){

        var dom = {
            $window: $(window),
            $document: $(document),
            $body: $('body'),
            $header: $('#masthead')
        };

        /*
         * Cookie Consent.
         */
        window.cookieconsent.initialise({
            layout: 'amaedoandre-layout',
            layouts: {
                'amaedoandre-layout': '<div class="cc-wrapper">{{messagelink}}{{compliance}}</div>'
            },
            content: {
                message: 'A Mãe do André utiliza cookies para lhe oferecer uma melhor experiência de navegação. Ao continuar a navegar estará a concordar com a sua utilização.',
                dismiss: 'Aceitar',
                link: 'Saiba mais',
            }
        });
        
        /*
         * Collapse Header
         */

        dom.$window.scroll(function() {
            if ($(window).scrollTop() > 200) {
                dom.$header.addClass('collapsed');
            } else {
                dom.$header.removeClass('collapsed');
            }
          });


        /*
         * Sticky Recent Posts Widget.
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
                offset_top: 70
            });
        }

        /*
         * Back to top.
         */
        $('#js-to-top-button').click(function(){
            $(this).blur();
            $('html, body').animate({scrollTop : 0}, 1000, function() {});
        });

        /*
         * Gallery.
         */
        if(dom.$body.hasClass('single-post')) {
            $(".gallery").slick({
                nextArrow: '<button type="button" class="slick-next" aria-label="Next"><svg class="icon"><use href="#icon-chevron-right" xlink:href="#icon-chevron-right"></use></svg></button>',
                prevArrow: '<button type="button" class="slick-prev" aria-label="Previous"><svg class="icon"><use href="#icon-chevron-left" xlink:href="#icon-chevron-left"></use></svg></button>',
            });
        }

        /*
         * Article share buttons.
         */
        if(dom.$body.hasClass('single-post')) {
            var $share = $('.share-this'); // cache share
            if ( $share.length ) {
                // Facebook
                $share.find('.facebook a').on('click', function(e){
                    e.preventDefault();
                    var href = $(this).attr('href');
                    window.open(href, "Facebook", "toolbar=0,status=0,width=548,height=325");
                });

                // Twitter
                $share.find('.twitter a').on('click', function(e){
                    e.preventDefault();
                    var href = $(this).attr('href');
                    window.open(href, "Twitter", "toolbar=0,status=0,width=548,height=325");
                });
            }
        }
    });
}(jQuery));