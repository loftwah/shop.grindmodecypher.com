(function ($) {
  	"use strict";
  	$(document).on('click', '.box > h3, .box > h4, .toggle', function(){
		$(this).toggleClass('active');
		$(this).next( ".hide" ).toggleClass('show');
	});

	$(document).on('click', '#adminmenuback', function(e){
		$('#wp-admin-bar-menu-toggle a').trigger('click');
		$('body').removeClass('folded auto-fold');
	});

	$(document).on('click', '#wp-admin-bar-menu-toggle', function(e){
		$('body').removeClass('folded auto-fold');
	});

	$(document).on('click', '#adminmenu .wp-has-submenu .wp-menu-arrow', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).parent().next('ul').slideToggle('50');
		$(this).parent().toggleClass('wp-has-current-submenu');
	});

	jQuery(document).ready(function($){
	    // menu sortable
		$('.admin-menus').sortable({
			items: '.admin-menu-item',
			cursor: 'move',
			containment: 'parent',
			placeholder: 'box box-placeholder'
		});

		// color
		$('.color-field').wpColorPicker();

		// uploader
		$('.upload-btn').click(function(e) {
	        e.preventDefault();
	        var that = $(this);
	        var image = wp.media({ 
	            title: 'Upload Image',
	            multiple: false
	        }).open()
	        .on('select', function(e){
	            var uploaded_image = image.state().get('selection').first();
	            var image_url = uploaded_image.toJSON().url;
	            that.prev().val(image_url);
	        });
	    });

	    Waves.attach('.button:not(input)');
	    Waves.attach('.page-title-action');
	    Waves.attach('#adminmenu a');
	    Waves.attach('#wp-admin-bar-root-default a.ab-item');
		Waves.init();
	});

})(jQuery);
