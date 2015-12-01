
jQuery(document).ready(function($) {
    
    // smooth scrolling

    $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {

        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top 
            }, 1000);
            return false;
        }
    }
    });


// sticky menu


var $window = $(window),
        $mainHeader = $('.site-header'), // header wrapper element
        stickyHeadTop = $mainHeader.offset().top;

    // A helper function to check whether header should be fixed
    var stickyHead = function () {
        var scrollTop = $window.scrollTop();
        
        if ( scrollTop > stickyHeadTop ) {
            if ( $('body').hasClass('logged-in') ) {
                $mainHeader.addClass('under-admin-bar fixed-header');
            } else {
                $mainHeader.addClass('fixed-header');
            }
        } else {
            if ( $('body').hasClass('logged-in') ) {
                $mainHeader.removeClass('under-admin-bar fixed-header');
            } else {
                $mainHeader.removeClass('fixed-header');
            }
        }
    };

    // Initialize nav classes...
    stickyHead();

    // Then re-run on scroll
    $window.scroll(function () {
        stickyHead();
    });

});


