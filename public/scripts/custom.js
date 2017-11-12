/*global SelectBox, PureGrid */
/* ----------------- Start Document ----------------- */
(function($){
	"use strict";

	$(document).ready(function(){

		// Top Bar Dropdown
		//----------------------------------------//

		$('.top-bar-dropdown').click(function(event) {
			$('.top-bar-dropdown').not(this).removeClass('active');
			if ($(event.target).parent().parent().attr('class') == 'options' ) {
				hideDD();
			} else {
				if($(this).hasClass('active') &&  $(event.target).is( "span" )) {
					hideDD();
				} else {
					$(this).toggleClass('active');
				}
			}
			event.stopPropagation();
		});

		$(document).click(function() { hideDD(); });

		$('ul.options li').click(function() {
			var opt = $(this);
			var text = opt.text();
			$('.top-bar-dropdown.active span').text(text);
			hideDD();
		});

		function hideDD(){
			$('.top-bar-dropdown').removeClass('active');
		}



		// Cart
		//----------------------------------------//

		$("#cart").hoverIntent({
			sensitivity: 3,
			interval: 60,
			over: function () {
				$('.cart-list', this).fadeIn(200);
				$('.cart-btn a.button', this).addClass('hovered');
			},
			timeout: 220,
			out: function () {
				$('.cart-list', this).fadeOut(100);
				$('.cart-btn a.button', this).removeClass('hovered');
			}
		});



		// Initialise Superfish
		//----------------------------------------//

		$('ul.menu').superfish({
				delay:       400,                    // delay on mouseout
				speed:       200,                    // faster animation speed
				speedOut:    100,                    // speed of the closing animation
				autoArrows:  true                    // disable generation of arrow mark-up
			});



		// Mobile Navigation
		//----------------------------------------//

		var jPanelMenu = $.jPanelMenu({
			menu: '#responsive',
			animated: false,
			keyboardShortcuts: true
		});
		jPanelMenu.on();

		$(document).on('click',jPanelMenu.menu + ' li a',function(e){
			if ( jPanelMenu.isOpen() && $(e.target).attr('href').substring(0,1) === '#' ) { jPanelMenu.close(); }
		});

		$(document).on('touchend','.menu-trigger',function(e){
			jPanelMenu.triggerMenu();
			e.preventDefault();
			return false;
		});

			// Removes SuperFish Styles
			$('#jPanelMenu-menu').removeClass('menu');
			$('ul#jPanelMenu-menu li').removeClass('dropdown');
			$('ul#jPanelMenu-menu li ul').removeAttr('style');
			$('ul#jPanelMenu-menu li div').removeClass('mega');
			$('ul#jPanelMenu-menu li div').removeAttr('style');
			$('ul#jPanelMenu-menu li div div').removeClass('mega-container');


			$(window).resize(function (){
				var winWidth = $(window).width();
				if(winWidth>767) {
					jPanelMenu.close();
				}
			});



		// Revolution Slider
		//----------------------------------------//

		$('.tp-banner').revolution({
			delay:9000,
			startwidth:1290,
			startheight:480,
			hideThumbs:10,
			hideTimerBar:"on",
			onHoverStop: "on",
			navigationType: "none",
			soloArrowLeftHOffset:0,
			soloArrowLeftVOffset:0,
			soloArrowRightHOffset:0,
			soloArrowRightVOffset:0
		});


		// ShowBiz Carousel
		//----------------------------------------//
		$('#new-arrivals').showbizpro({
			dragAndScroll:"off",
			visibleElementsArray:[4,4,3,1],
			carousel:"off",
			entrySizeOffset:0,
			allEntryAtOnce:"off",
			rewindFromEnd:"off",
			autoPlay:"off",
			delay:2000,
			speed:400,
			easing:'Back.easeOut'
		});

		$('#happy-clients').showbizpro({
			dragAndScroll:"off",
			visibleElementsArray:[1,1,1,1],
			carousel:"off",
			entrySizeOffset:0,
			allEntryAtOnce:"off"
		});

		$('#our-clients').showbizpro({
			dragAndScroll:"off",
			visibleElementsArray:[5,4,3,1],
			carousel:"off",
			entrySizeOffset:0,
			allEntryAtOnce:"off"
		});



		// Parallax Banner
		//----------------------------------------//
		$(".parallax-banner").pureparallax({
			overlayBackgroundColor: '#000',
			overlayOpacity : '0.45',
			timeout: 200
		});

		$(".parallax-titlebar").pureparallax({
			timeout: 100
		});


		// Categories

		function addLevelClass($parent, level) {
		    $parent.addClass('parent-'+level);
		    var $children = $parent.children('li');
		    $children.addClass('child-'+level).data('level',level);
		    $children.each(function() {
		        var $sublist = $(this).children('ul');
		        if ($sublist.length > 0) {
		            $(this).addClass('has-sublist');
		            addLevelClass($sublist, level+1);
		        }
		    });
		}

		addLevelClass($('#categories'), 1);

		//----------------------------------------//
		$('#categories > li a').click(function(e){
			if($(this).parent().hasClass('has-sublist')) {
				e.preventDefault();
			}
			if ($(this).attr('class') != 'active'){
				$(this).parent().siblings().find('ul').slideUp();
				$(this).next().slideToggle();
				if($(this).parent().hasClass("has-sublist")){

					$(this).parent().siblings().find('a').removeClass('active');
					$(this).addClass('active');
				} else {
					var curlvl = $(this).parent().data('level');
					if(curlvl){
						$('#categories li.child-'+curlvl+' a').removeClass('active');
					}
				}

			} else {
				console.log('tu jestem');
				$(this).next().slideToggle();
				$(this).parent().find('ul').slideUp();
				var curlvl = $(this).parent().data('level');
				console.log(curlvl);
				if(curlvl){
					$('#categories li.child-'+curlvl+' a').removeClass('active');
				}
			}
		});



		// Filter by Price
		//----------------------------------------//

		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 500 ],
			slide: function( event, ui ) {
        event = event;
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );


		$( "#slider-range-alt" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 0, 500 ],
			slide: function( event, ui ) {
        event = event;
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );




		// Product Slider
		//----------------------------------------//

		$('#product-slider').royalSlider({

			autoScaleSlider: true,
			autoScaleSliderWidth: 560,
			autoHeight: true,

			loop: false,
			slidesSpacing: 0,

			imageScaleMode: 'none',
			imageAlignCenter:false,

			navigateByClick: false,
			numImagesToPreload:2,

			/* Arrow Navigation */
			arrowsNav:true,
			arrowsNavAutoHide: false,
			arrowsNavHideOnTouch: true,
			keyboardNavEnabled: true,
			fadeinLoadedSlide: true,

			/* Thumbnail Navigation */
			controlNavigation: 'thumbnails',
			thumbs: {
				orientation: 'horizontal',
				firstMargin: false,
				appendSpan: true,
				autoCenter: false,
				spacing: 10,
				paddingTop: 10,
			}

		});


		$('#product-slider-vertical').royalSlider({

			autoScaleSlider: true,
			autoScaleSliderWidth: 560,
			autoHeight: true,

			loop: false,
			slidesSpacing: 0,

			imageScaleMode: 'none',
			imageAlignCenter:false,

			navigateByClick: false,
			numImagesToPreload:2,

			/* Arrow Navigation */
			arrowsNav:true,
			arrowsNavAutoHide: false,
			arrowsNavHideOnTouch: true,
			keyboardNavEnabled: true,
			fadeinLoadedSlide: true,

			/* Thumbnail Navigation */
			controlNavigation: 'thumbnails',
			thumbs: {
				orientation: 'vertical',
				firstMargin: false,
				appendSpan: true,
				autoCenter: false,
				spacing: 10,
				paddingTop: 10,
			}

		});


		$('#basic-slider').royalSlider({

			autoScaleSlider: true,
			autoScaleSliderHeight: "auto",
			autoHeight: true,

			loop: false,
			slidesSpacing: 0,

			imageScaleMode: 'none',
			imageAlignCenter:false,

			navigateByClick: false,
			numImagesToPreload:2,

			/* Arrow Navigation */
			arrowsNav:true,
			arrowsNavAutoHide: false,
			arrowsNavHideOnTouch: true,
			keyboardNavEnabled: true,
			fadeinLoadedSlide: true,

		});



		// Product Quantity
		//----------------------------------------//
		var thisrowfield;
		$('.qtyplus').click(function(e){
			e.preventDefault();
			thisrowfield = $(this).parent().parent().parent().find('.qty');

			var currentVal = parseInt(thisrowfield.val());
			if (!isNaN(currentVal)) {
				thisrowfield.val(currentVal + 1);
			} else {
				thisrowfield.val(0);
			}
		});

		$(".qtyminus").click(function(e) {
			e.preventDefault();
			thisrowfield = $(this).parent().parent().parent().find('.qty');
			var currentVal = parseInt(thisrowfield.val());
			if (!isNaN(currentVal) && currentVal > 0) {
				thisrowfield.val(currentVal - 1);
			} else {
				thisrowfield.val(0);
			}
		});



		// Tabs
		//----------------------------------------//
		var $tabsNav    = $('.tabs-nav'),
		$tabsNavLis = $tabsNav.children('li');
		// $tabContent = $('.tab-content');

		$tabsNav.each(function() {
			var $this = $(this);

			$this.next().children('.tab-content').stop(true,true).hide()
			.first().show();

			$this.children('li').first().addClass('active').stop(true,true).show();
		});

		$tabsNavLis.on('click', function(e) {
			var $this = $(this);

			$this.siblings().removeClass('active').end()
			.addClass('active');

			$this.parent().next().children('.tab-content').stop(true,true).hide()
			.siblings( $this.find('a').attr('href') ).fadeIn();

			e.preventDefault();
		});



		// Accordion
		//----------------------------------------//

		var $accor = $('.accordion');

		$accor.each(function() {
			$(this).addClass('ui-accordion ui-widget ui-helper-reset');
			$(this).find('h3').addClass('ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all');
			$(this).find('div').addClass('ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom');
			$(this).find("div").hide().first().show();
			$(this).find("h3").first().removeClass('ui-accordion-header-active ui-state-active ui-corner-top').addClass('ui-accordion-header-active ui-state-active ui-corner-top');
			$(this).find("span").first().addClass('ui-accordion-icon-active');
		});

		var $trigger = $accor.find('h3');

		$trigger.on('click', function(e) {
			var location = $(this).parent();

			if( $(this).next().is(':hidden') ) {
				var $triggerloc = $('h3',location);
				$triggerloc.removeClass('ui-accordion-header-active ui-state-active ui-corner-top').next().slideUp(300);
				$triggerloc.find('span').removeClass('ui-accordion-icon-active');
				$(this).find('span').addClass('ui-accordion-icon-active');
				$(this).addClass('ui-accordion-header-active ui-state-active ui-corner-top').next().slideDown(300);
			}
			e.preventDefault();
		});


		// Toggles
		//----------------------------------------//
		$(".toggle-container").hide();
		$(".trigger").toggle(function(){
			$(this).addClass("active");
		}, function () {
			$(this).removeClass("active");
		});
		$(".trigger").click(function(){
			$(this).next(".toggle-container").slideToggle();
		});

		$(".trigger.opened").toggle(function(){
			$(this).removeClass("active");
		}, function () {
			$(this).addClass("active");
		});

		$(".trigger.opened").addClass("active").next(".toggle-container").show();


		// Notification Boxes
		//----------------------------------------//

		$('.counter').counterUp({
			delay: 10,
			time: 2000
		});



		// Notification Boxes
		//----------------------------------------//

		$("a.close").removeAttr("href").click(function(){
			$(this).parent().fadeOut(200);
		});



		// Tooltips
		//----------------------------------------//

		$(".tooltip.top").tipTip({
			defaultPosition: "top"
		});

		$(".tooltip.bottom").tipTip({
			defaultPosition: "bottom"
		});

		$(".tooltip.left").tipTip({
			defaultPosition: "left"
		});

		$(".tooltip.right").tipTip({
			defaultPosition: "right"
		});



		// Magnific Popup
		//----------------------------------------//

		$(document).ready(function(){

			$('body').magnificPopup({
				type: 'image',
				delegate: 'a.mfp-gallery',

				fixedContentPos: true,
				fixedBgPos: true,

				overflowY: 'auto',

				closeBtnInside: true,
				preloader: true,

				removalDelay: 0,
				mainClass: 'mfp-fade',

				gallery:{enabled:true},

				callbacks: {
					buildControls: function() {
						console.log('inside'); this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
					}

				}
			});


			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',

				fixedContentPos: false,
				fixedBgPos: true,

				overflowY: 'auto',

				closeBtnInside: true,
				preloader: false,

				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});


			$('.mfp-image').magnificPopup({
				type: 'image',
				closeOnContentClick: true,
				mainClass: 'mfp-fade',
				image: {
					verticalFit: true
				}
			});


			$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,

				fixedContentPos: false
			});

		});


		// Skill Bars Animation
		//----------------------------------------//

		if($('#skillzz').length !==0){
			var skillbar_active = false;
			$('.skill-bar-value').hide();

			if($(window).scrollTop() === 0 && isScrolledIntoView($('#skillzz')) === true){
				skillbarActive();
				skillbar_active = true;
			}
			else if(isScrolledIntoView($('#skillzz')) === true){
				skillbarActive();
				skillbar_active = true;
			}
			$(window).bind('scroll', function(){
				if(skillbar_active === false && isScrolledIntoView($('#skillzz')) === true ){
					skillbarActive();
					skillbar_active = true;
				}
			});
		}

		function isScrolledIntoView(elem) {
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();

			var elemTop = $(elem).offset().top;
			var elemBottom = elemTop + $(elem).height();

			return ((elemBottom <= (docViewBottom + $(elem).height())) && (elemTop >= (docViewTop - $(elem).height())));
		}

		function skillbarActive(){
			setTimeout(function(){

				$('.skill-bar-value').each(function() {
					$(this)
					.data("origWidth", $(this)[0].style.width)
					.css('width','1%').show();
					$(this)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
				});

				$('.skill-bar-value .dot').each(function() {
					var me = $(this);
					var perc = me.attr("data-percentage");

					var current_perc = 0;

					var progress = setInterval(function() {
						if (current_perc>=perc) {
							clearInterval(progress);
						} else {
							current_perc +=1;
							me.text((current_perc)+'%');
						}
					}, 10);
				});
			}, 10);}



		// Custom Select Boxes
		//----------------------------------------//

		$('.orderby').selectric();


		var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ? true : false;

		$(".variables select").each(function() {
			if(!isMobile) {
				var sb = new SelectBox({
					selectbox: $(this)
				});
				void(sb);

			}
		});

		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			$(".variables select").css({'display':'block'});
		}


		// Dynamic Grid Filters
		//----------------------------------------//

		$('.option-set li').click(function(event) {
			event.preventDefault();
			var item = $(".og-grid li"),
			image = item.find('a.grid-item-image img');
			item.removeClass('clickable unclickable');
			image.stop().animate({opacity: 1});
			var filter = $(this).children('a').data('filter');
			item.filter(filter).addClass('clickable');
			item.filter(':not('+filter+')').addClass('unclickable');
			item.filter(':not('+filter+')').find('a.grid-item-image im').stop().animate({opacity: 0.2});
		});

		PureGrid.init();



		// Retina Images
		//----------------------------------------//

		var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;

		$(window).on("load", function() {
			if (pixelRatio > 1) {
				$('#logo img').each(function() {
					$(this).attr('src', $(this).attr('src').replace(".","@2x."));
				});
			}
		});



		// Portfolio Isotope
		//----------------------------------------//

		$(window).load(function(){
			var $container = $('#portfolio-wrapper, #masonry-wrapper');
			$container.isotope({ itemSelector: '.portfolio-item, .masonry-item', layoutMode: 'masonry' });
		});

		$('#filters a').click(function(e){
			e.preventDefault();

			var selector = $(this).attr('data-filter');
			$('#portfolio-wrapper').isotope({ filter: selector });

			$(this).parents('ul').find('a').removeClass('selected');
			$(this).addClass('selected');
		});



		// Share Buttons
		//----------------------------------------//

		var $Filter = $('.share-buttons');
		var FilterTimeOut;
		$Filter.find('ul li:first').addClass('active');
		$Filter.find('ul li:not(.active)').hide();
		$Filter.hover(function(){
			clearTimeout(FilterTimeOut);
			if( $(window).width() < 959 )
			{
				return;
			}
			FilterTimeOut=setTimeout(function(){
				$Filter.find('ul li:not(.active)').stop(true, true).animate({width: 'show' }, 250, 'swing');
				$Filter.find('ul li:first-child a').addClass('share-hovered');
			}, 100);

		},function(){
			if( $(window).width() < 960 )
			{
				return;
			}
			clearTimeout(FilterTimeOut);
			FilterTimeOut=setTimeout(function(){
				$Filter.find('ul li:not(.active)').stop(true, true).animate({width: 'hide'}, 250, 'swing');
				$Filter.find('ul li:first-child a').removeClass('share-hovered');

			}, 250);
		});
		$(window).resize(function() {
			if( $(window).width() < 960 )
			{
				$Filter.find('ul li:not(.active)').show();
			}
			else
			{
				$Filter.find('ul li:not(.active)').hide();
			}
		});
		$(window).resize();



		// Responsive Tables
		//----------------------------------------//
		$('.responsive-table').stacktable();



		//	Back To Top Button
		//----------------------------------------//

		var pxShow = 600; // height on which the button will show
		var fadeInTime = 400; // how slow / fast you want the button to show
		var fadeOutTime = 400; // how slow / fast you want the button to hide
		var scrollSpeed = 400; // how slow / fast you want the button to scroll to top.

		jQuery(window).scroll(function(){
			if(jQuery(window).scrollTop() >= pxShow){
				jQuery("#backtotop").fadeIn(fadeInTime);
			} else {
				jQuery("#backtotop").fadeOut(fadeOutTime);
			}
		});
			 
		jQuery('#backtotop a').click(function(){
			jQuery('html, body').animate({scrollTop:0}, scrollSpeed); 
			return false; 
		}); 



		// Advanced Search Button
		//----------------------------------------//
		$('a.advanced-search-btn').click(function(e){
			e.preventDefault();
			$('.woo-search-elements').toggleClass('active');
		}); 



		// Contact Form
		//----------------------------------------//

		$("#contactform .submit").click(function(e) {

		e.preventDefault();
		var user_name       = $('input[name=name]').val();
		var user_email      = $('input[name=email]').val();
		var user_comment    = $('textarea[name=comment]').val();

		//simple validation at client's end
		//we simply change border color to red if empty field using .css()
		var proceed = true;
		if(user_name===""){
				$('input[name=name]').addClass('error');
					proceed = false;
				}
				if(user_email===""){
					$('input[name=email]').addClass('error');
					proceed = false;
				}
				if(user_comment==="") {
					$('textarea[name=comment]').addClass('error');
					proceed = false;
				}

				//everything looks good! proceed...
				if(proceed) {
					$('.hide').fadeIn();
					$("#contactform .submit").fadeOut();
						//data to be sent to server
						var post_data = {'userName':user_name, 'userEmail':user_email, 'userComment':user_comment};

						//Ajax post data to server
						$.post('contact.php', post_data, function(response){
							var output;
							//load json data from server and output comment
							if(response.type == 'error')
								{
									output = '<div class="error">'+response.text+'</div>';
									$('.hide').fadeOut();
									$("#contactform .submit").fadeIn();
								} else {

									output = '<div class="success">'+response.text+'</div>';
									//reset values in all input fields
									$('#contact div input').val('');
									$('#contact textarea').val('');
									$('.hide').fadeOut();
									$("#contactform .submit").fadeIn().attr("disabled", "disabled").css({'backgroundColor':'#c0c0c0', 'cursor': 'default' });
								}

								$("#result").hide().html(output).slideDown();
							}, 'json');
					}
		});

		//reset previously set border colors and hide all comment on .keyup()
		$("#contactform input, #contactform textarea").keyup(function() {
			$("#contactform input, #contactform textarea").removeClass('error');
			$("#result").slideUp();
		});



   // ------------------ End Document ------------------ //
});

})(this.jQuery);