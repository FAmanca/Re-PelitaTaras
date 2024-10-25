jQuery(document).ready(function($) {

    'use strict';

    // Slider
    $(".Modern-Slider").slick({
        autoplay: true,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        dots: true,
        fade: true,
        pauseOnDotsHover: true,
        cssEase: 'linear',
        draggable: false,
        prevArrow: '<button class="PrevArrow"></button>',
        nextArrow: '<button class="NextArrow"></button>',
    });

    // Toggle Navigation
    $('#nav-toggle').on('click', function(event) {
        event.preventDefault();
        $('#main-nav').toggleClass("open");
    });

    // Tab Functionality
    $('.tabgroup > div').hide();
    $('.tabgroup > div:first-of-type').show();
    $('.tabs a').click(function(e) {
        e.preventDefault();
        var $this = $(this),
            tabgroup = '#' + $this.parents('.tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();
    });

    // Video Play
    $(".box-video").click(function() {
        $('iframe', this)[0].src += "&amp;autoplay=1";
        $(this).addClass('open');
    });

    // Owl Carousel
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false
            }
        }
    });

    // Smooth Scroll and Navigation Highlight
    var contentSection = $('.content-section, .main-banner');
    var navigation = $('nav');

    // Smooth Scroll to Section
    navigation.on('click', 'a', function(event) {
        var target = $(this.hash);
        if (target.length) {
            event.preventDefault();
            smoothScroll(target);
        }
    });

    // Update Navigation on Scroll
    $(window).on('scroll', function() {
        updateNavigation();
    });

    // Initial Navigation Update
    updateNavigation();

    // Functions
    function updateNavigation() {
        contentSection.each(function() {
            var sectionName = $(this).attr('id');
            var navigationMatch = $('nav a[href="#' + sectionName + '"]');
            if (($(this).offset().top - $(window).height() / 2 < $(window).scrollTop()) &&
                ($(this).offset().top + $(this).height() - $(window).height() / 2 > $(window).scrollTop())) {
                navigationMatch.addClass('active-section');
            } else {
                navigationMatch.removeClass('active-section');
            }
        });
    }

    function smoothScroll(target) {
        $('body,html').animate({
            scrollTop: target.offset().top
        }, 800);
    }

    // Smooth Scroll for Button Links
    $('.button a[href*=#]').on('click', function(e) {
        var target = $($(this).attr('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: target.offset().top }, 500, 'linear');
        }
    });

});
