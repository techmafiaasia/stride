(function ($) {

    var common = {
        init: function() {
            this.cacheDOM();
            this.eventListner();
        },
        cacheDOM: function() {
            this.$window    = $(window);
            this.$variable  = $('something');
        },
        eventListner: function() {
            this.$variable.on( 'event' , this.eventCallFunction.bind(this) );
        },
        eventCallFunction: function() {
        //do something
        },
    };

    /**
     * Function to Check if element is in viewport 
     */
    $.fn.inView = function (offset) {
        //Window Object
        var win = jQuery(window);
        // var win = jQuery('.video-main-wrap');
        //Object to Check
        var $obj = jQuery(this);
        //the top Scroll Position in the page
        var scrollPosition = win.scrollTop();
        //the end of the visible area in the page, starting from the scroll position
        var visibleArea = win.scrollTop() + win.height();
        //the end of the object to check
        var objEndPos = ($obj.offset().top + offset);
        // check if obj is already at the top of visible area.
        if ($obj.offset().top < scrollPosition) return true;
        return (visibleArea >= objEndPos && scrollPosition <= objEndPos ? true : false);
    };

    var supportSVG = {
        init: function () {
            $('img.svg').each(function () {
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');
                var imgwidth = $img.attr('width');
                var imgheight = $img.attr('height');
                $.get(imgURL, function (data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = $(data).find('svg');
                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                        $svg = $svg.attr({
                            width: imgwidth,
                            height: imgheight
                        });
                    } 
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
                    // Replace image with new SVG
                    $img.replaceWith($svg);
                }, 'xml');
            });
        },    
    };

    var mainNavigation = {
        init: function () {
            this.$mainNavContainer = $('#site-navigation');
            this.$menuToggler = this.$mainNavContainer.find('.menu-toggle');
            this.$mainMenuContainer = this.$mainNavContainer.find('.menu-primary-container');
            this.$mainMenu = this.$mainNavContainer.find('#primary-menu');
            this.$menuToggler.on('click',this.toggleMenu.bind(this));
        },
        toggleMenu: function (e) {
            e.preventDefault();
            this.$mainMenuContainer.toggleClass('shown');
        }
    };

    var secondaryNav = {
        init: function() {
            this.cacheDOM();
            this.eventListner();
        },
        cacheDOM: function() {
            this.$window    = $(window);
            this.$stickyHeader  = $('.sticky-head'); // secondary header
            this.$banner = $('.home-banner'); // home page banner
            this.$body = $( 'body' );
            this.prev = 0; // to detect scroll up/down
        },
        eventListner: function() {
            this.$window.on( 'load scroll' , this.changeStickyHeaderStates.bind(this) );
        },
        changeStickyHeaderStates: function() {
            var bannerHeight = this.$banner.offset().top + this.$banner.outerHeight(true);
            var windowScrolled = this.$window.scrollTop();
           
            // if scrolled bellow the banner
            if( windowScrolled > bannerHeight ) {
                if( ! this.$stickyHeader.hasClass('show') ) {
                    // show sticky
                    this.$stickyHeader.addClass('show');
                } 

            } 
            else {

                if( this.$stickyHeader.hasClass('show') ) {
                    this.$stickyHeader.removeClass('show');
                }
            }

            // if footer in view.
            if( $('.site-footer').find('.site-info').inView(100) ) {
                this.$stickyHeader.addClass('sticky-slide-up'); // slide nav up
            } else {
                this.$stickyHeader.removeClass('sticky-slide-up'); // remove nav slide up
            } 
            
        },
    };

    var loadMoreProduct = {
        init : function() {
            this.cacheDOM();
            this.eventListner();
        },
        cacheDOM: function() {
            this.$button = $('.btn-stride');
        },
        eventListner: function() {
            this.$button.on('click', this.loadmore.bind(this));
        },
        loadmore: function(e) {
            e.preventDefault();
            var next_page = this.$button.attr('next-page');
            var postData = {
                action: 'strideotc_load_more_products',
                page: next_page,
            };
            // console.log( SOTC.ajaxurl )
            $.ajax({
                url: SOTC.ajaxUrl,
                type: 'POST',
                data: postData,
                beforeSend: function(){
                    
                },
                success: function( response ) {
                    $('ul.products').append(response.content);
                    $('.btn-stride').attr( 'next-page', response.next_page );
                    if( !( response.next_page ) ){
                        $( '.btn-wrap' ).hide();
                    }
                }
            });
        }

    };

    //rename PROJECTNAME
    var PROJECTNAME = {
        // All pages
        common: {
            init: function() {
                // JavaScript to be fired on all pages
                common.init();
                supportSVG.init();
                mainNavigation.init();
                new WOW().init();
            },

            // finalize: function() {
            //      JavaScript to be fired on all pages, after page specific JS is fired
            // }
        },
        // Home page
        'home': {
            init: function() {
                // JavaScript to be fired on the home page
                secondaryNav.init();
            }
            // finalize: function() {
            //     // JavaScript to be fired on the home page, after the init JS
            // }
        },
        // shop
        'post-type-archive-product': {
            init: function() {
                loadMoreProduct.init();
            }
        },

    };

    //common UTIL this doesn't change
    var WEN_JS_UTIL = {

        fire: function(func, funcname, args) {
            var namespace = PROJECTNAME; // indicate your obj literal namespace here for standard lets make it abbreviation of current project

            funcname = (funcname === undefined) ? 'init' : funcname;
            if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
                namespace[func][funcname](args);
            }

        },

        loadEvents: function() {

            var bodyId = document.body.id;

            // hit up common first.
            WEN_JS_UTIL.fire('common');

            // do all the classes too.
            $.each(document.body.className.split(/\s+/), function(i, classnm) {
                WEN_JS_UTIL.fire(classnm);
                WEN_JS_UTIL.fire(classnm, bodyId);
            });

            WEN_JS_UTIL.fire('common', 'finalize');

        }
    };

    $(function() {
        WEN_JS_UTIL.loadEvents();
    });

    

})(jQuery);