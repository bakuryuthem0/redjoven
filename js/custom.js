function menu(btn) {
    btn.removeClass('faded');
	if (btn.hasClass('open')) {
        btn.removeClass('open');
        $('.header').removeClass('active');
        $('.overly').fadeOut('fast');
    }else
    {
        btn.addClass('open');
        $('.header').addClass('active');
        $('.overly').fadeIn('fast');
    }
}
function addSubMenu (btn) {
	btn.children('.hoverable-card').addClass('active');
}
function removeSubMenu (btn) {
	btn.children('.hoverable-card').removeClass('active');
}
function hideMenu () {
    if (!$('.arrow-left').hasClass('open')) {
        $('.arrow-left').addClass('faded');
    }
}
function showMenu () {
    if ($('.arrow-left').hasClass('faded')) {
        $('.arrow-left').removeClass('faded');
    };
    return setTimeout(hideMenu, 3000);
}
function showImg(btn) {
    btn.addClass('active');
}
function hideImg(btn) {
    btn.removeClass('active');
}
jQuery(document).ready(function($) {
    if ($(window).width() > 990) {
        var interval = setTimeout(hideMenu, 3000);
    };
	$('.arrow-left').on('click', function(event) {
		menu($(this));
    });
    $('.overly').on('click', function(event) {
    	menu($('.arrow-left'));
    });
    $('.submenu').on('mouseenter', function(event) {
    	addSubMenu($(this));
    });
    $('.submenu').on('mouseleave', function(event) {
    	removeSubMenu($(this));
    });
    $('.cont-sobre').hover(function() {
        $('.sobre-medio').addClass('active');
        $('.lineas').addClass('active');
        setTimeout(function(){ 
            $('.lineas .btn-success').addClass('active');
            $('#first_textarea').addClass('active');
         }, 1000)

    }, function() {
        $('.sobre-medio').removeClass('active');
        $('.lineas').removeClass('active');
        $('.lineas .btn-success').removeClass('active');

    });
    $('.contact-input').each(function(index, el) {
        if ($(el).prev('p') != 'undefined') {
           $(el).width($(el).parent().width()-$(el).prev('p').width()); 
        };
    });
    /*Programas*/
    $('.program').on('click', function(event) {
        var btn = $(this);
        if (!btn.parent().hasClass('active')) {

            $('.go-back').fadeIn('fast').removeClass('hidden');
            btn.parent().addClass('active');
            btn.children('.img-program').addClass('focused');
            $('.program-container:not(.active)').fadeOut('fast',function() {
                $(this).addClass('hidded');
            });
            $('.program-title').fadeOut('fast');
            $('.image-program').attr('src',$(this).data('image')).fadeIn('fast');
            $('.program-text').fadeOut('fast',function(){
                $('.program-subtitle').html(btn.data('title')).fadeIn('fast');
                $('.program-subtext').html(btn.data('texto')).fadeIn('fast');
            });
        }
    });
    $('.go-back').on('click', function(event) {
        var btn = $(this);
        btn.fadeOut('fast').addClass('hidden');
        $('.image-program').fadeOut('fast');
        $('.program-container').removeClass('active');
        $('.program-container:not(.active)').fadeIn('fast').removeClass('hidded');
        $('.focused').removeClass('focused');
        $('.gallery').fadeout('fast');
        $('.program-subtitle').fadeOut('fast');
        $('.program-subtext').fadeOut('fast',function(){
            $('.program-title').fadeIn('fast');
            $('.program-text').fadeIn('fast');
        });
    });
    $('.img-program').on('mouseenter', function(event) {
        showImg($(this));
    });
    $('.img-program').on('mouseleave', function(event) {
        hideImg($(this));
    });
    /*Mapa*/
    $('.state').on('click', function(event) {
        var btn = $(this);
        $('.map-info').fadeOut('fast');
        $('.map-title').fadeOut('fast');
        $('.map-link').fadeOut('fast');
        $('.map-subtitle').fadeOut('fast');
        $('.map-subsedes').fadeOut('fast');
        $('.map-text').fadeOut('fast',function(){
            $('.map-info').fadeIn('fast');
            $('.map-title').html(btn.data('title')).fadeIn('fast');
            $('.map-subtitle').html(btn.data('subtitle')).fadeIn('fast');
            $('.map-text').html(btn.data('text')).fadeIn('fast');
            if (btn.data('subsedes') != "") {
                $('.map-subsedes').html('<li>Sedes: </li>'+btn.data('subsedes')).fadeIn('fast');
            }else
            {
                $('.map-subsedes').html(btn.data('subsedes')).fadeIn('fast');
            }
            $('.map-link').attr('href',btn.data('url')).fadeIn('fast');
        });
    });
    $(document).on('scroll', function(event) {
        clearInterval(interval);
        interval = showMenu();
    });
    $('.tile-title').hover(function() {
        $(this).addClass('active');
    }, function() {
        $(this).removeClass('active');
    });
});
/* ----------------------------- 
Main navigation
----------------------------- */
$(document).ready(function() {
	'use strict';
	$('.submenus').onePageNav({
		currentClass: 'current',
		scrollSpeed: 1000,
		easing: 'easeInOutQuint'
	});
});				
