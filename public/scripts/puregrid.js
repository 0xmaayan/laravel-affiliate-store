/*
* debouncedresize: special jQuery event that happens once after a window resize
*
* latest version and complete README available on Github:
* https://github.com/louisremi/jquery-smartresize/blob/master/jquery.debouncedresize.js
*
* Copyright 2011 @louis_remi
* Licensed under the MIT license.
*/
var $event = $.event,
$special,
resizeTimeout;

$special = $event.special.debouncedresize = {
	setup: function() {
		$( this ).on( "resize", $special.handler );
	},
	teardown: function() {
		$( this ).off( "resize", $special.handler );
	},
	handler: function( event, execAsap ) {
		// Save the context
		var context = this,
		args = arguments,
		dispatch = function() {
				// set correct event type
				event.type = "debouncedresize";
				$event.dispatch.apply( context, args );
			};

			if ( resizeTimeout ) {
				clearTimeout( resizeTimeout );
			}

			execAsap ?
			dispatch() :
			resizeTimeout = setTimeout( dispatch, $special.threshold );
		},
		threshold: 250
	};

// ======================= imagesLoaded Plugin ===============================
// https://github.com/desandro/imagesloaded

// $('#my-container').imagesLoaded(myFunction)
// execute a callback when all images have loaded.
// needed because .load() doesn't work on cached images

// callback function gets image collection as argument
//  this is the container

// original: MIT license. Paul Irish. 2010.
// contributors: Oren Solomianik, David DeSandro, Yiannis Chatzikonstantinou

// blank image data-uri bypasses webkit log warning (thx doug jones)
var BLANK = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

$.fn.imagesLoaded = function( callback ) {
	var $this = this,
	deferred = $.isFunction($.Deferred) ? $.Deferred() : 0,
	hasNotify = $.isFunction(deferred.notify),
	$images = $this.find('img').add( $this.filter('img') ),
	loaded = [],
	proper = [],
	broken = [];

	// Register deferred callbacks
	if ($.isPlainObject(callback)) {
		$.each(callback, function (key, value) {
			if (key === 'callback') {
				callback = value;
			} else if (deferred) {
				deferred[key](value);
			}
		});
	}

	function doneLoading() {
		var $proper = $(proper),
		$broken = $(broken);

		if ( deferred ) {
			if ( broken.length ) {
				deferred.reject( $images, $proper, $broken );
			} else {
				deferred.resolve( $images );
			}
		}

		if ( $.isFunction( callback ) ) {
			callback.call( $this, $images, $proper, $broken );
		}
	}

	function imgLoaded( img, isBroken ) {
		// don't proceed if BLANK image, or image is already loaded
		if ( img.src === BLANK || $.inArray( img, loaded ) !== -1 ) {
			return;
		}

		// store element in loaded images array
		loaded.push( img );

		// keep track of broken and properly loaded images
		if ( isBroken ) {
			broken.push( img );
		} else {
			proper.push( img );
		}

		// cache image and its state for future calls
		$.data( img, 'imagesLoaded', { isBroken: isBroken, src: img.src } );

		// trigger deferred progress method if present
		if ( hasNotify ) {
			deferred.notifyWith( $(img), [ isBroken, $images, $(proper), $(broken) ] );
		}

		// call doneLoading and clean listeners if all images are loaded
		if ( $images.length === loaded.length ){
			setTimeout( doneLoading );
			$images.unbind( '.imagesLoaded' );
		}
	}

	// if no images, trigger immediately
	if ( !$images.length ) {
		doneLoading();
	} else {
		$images.bind( 'load.imagesLoaded error.imagesLoaded', function( event ){
			// trigger imgLoaded
			imgLoaded( event.target, event.type === 'error' );
		}).each( function( i, el ) {
			var src = el.src;

			// find out if this image has been already checked for status
			// if it was, and src has not changed, call imgLoaded on it
			var cached = $.data( el, 'imagesLoaded' );
			if ( cached && cached.src === src ) {
				imgLoaded( el, cached.isBroken );
				return;
			}

			// if complete is true and browser supports natural sizes, try
			// to check for image status manually
			if ( el.complete && el.naturalWidth !== undefined ) {
				imgLoaded( el, el.naturalWidth === 0 || el.naturalHeight === 0 );
				return;
			}

			// cached images don't fire load sometimes, so we reset src, but only when
			// dealing with IE, or image is complete (loaded) and failed manual check
			// webkit hack from http://groups.google.com/group/jquery-dev/browse_thread/thread/eee6ab7b2da50e1f
			if ( el.readyState || el.complete ) {
				el.src = BLANK;
				el.src = src;
			}
		});
	}

	return deferred ? deferred.promise( $this ) : $this;
};


var PureGrid = (function() {

	var $grid = $( '#og-grid' ),
	// the items
	$items = $grid.children( 'li' ),
	current = -1,
	expanderPosition = 0,
	transEndEventNames = {
		'WebkitTransition' : 'webkitTransitionEnd',
		'MozTransition' : 'transitionend',
		'OTransition' : 'oTransitionEnd',
		'msTransition' : 'MSTransitionEnd',
		'transition' : 'transitionend'
	},
	transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
	// support for csstransitions
	support = Modernizr.csstransitions,
	$body = $( 'html, body' ),
	settings = {
		minHeight : 500,
		speed : 350,
		marginBottom : 20,
		easing : 'ease'
	};

	function init( config ) {

		// the settings..
		settings = $.extend( true, {}, settings, config );

		// preload all images
		$grid.imagesLoaded( function() {
			$('.flexslider').flexslider({
				animation: "fade",
				slideshow: false,
				animationLoop: true,
				animationSpeed: "3000",
				slideshowSpeed: "8000",
				controlNav: false,

			});
			saveItemInfo( true );
			initEvents();
		} );

	}

	function initEvents() {

		// when clicking an item, show the preview with the item´s info and large image.
		// close the item if already expanded.
		// also close if clicking on the item´s cross
		initItemsEvents( $items );

		// on window resize get the window´s size again
		// reset some values..
		$( window ).on( 'debouncedresize', function() {
			saveItemInfo( true  );
			scrollExtra = 0;
			previewPos = -1;
			// save item´s offset
			$newheight = $('#og-grid li:first-child .dynamic-portfolio-holder').height();
			$items.each( function() {
				var $item = $( this );

				$item.stop().animate({ 'height': $newheight});

			});
			$expanded = $('#og-grid li.expanded');
			$expanded.removeClass('expanded').find('.og-expander').animate({	 opacity: '0' },500,function(){
				$expanded.find('.og-expander').css({ height: 0 });
				//$expanded.stop().animate({ 'height' :$expanded.data( 'height' ) },200);
			});
			/*var preview = $.data( this, 'preview' );
			if( typeof preview != 'undefined' ) {
				hidePreview();
			}*/

		} );

	}

	// saves the item´s offset top and height (if saveheight is true)
	function saveItemInfo( saveheight ) {
		$items.each( function() {
			var $item = $( this );
			var $expanded = $item.find('.og-expander');
			$item.data( 'offsetTop', $item.offset().top );
			if( saveheight ) {
				$item.data( 'height', $item.height() );
				$expanded.css({ 'height': 'auto' }).data( 'height', $expanded.height() ).css({ 'height': 0 });
			}
		});
	}

	function initItemsEvents( $items ) {

		$items.on( 'click', 'span.og-close', function() {
			hidePreview();
			return false;
		} ).children( 'a.grid-item-image' ).on( 'click', function(e) {
			e.preventDefault();
			var $item = $( this ).parent();
			// check if item already opened
			//current === $item.index() ? hidePreview() : showPreview( $item );
			if($item.hasClass('clickable')){
				if($item.hasClass('expanded')) { } else {
					showPreview( $item )
				}
			}
			return false;
		} );
	}

	function showPreview( $item ) {
		var $expanded = $item.find('.og-expander'),
		$image = $item.find('a.grid-item-image .dynamic-portfolio-holder'),
		$icon = $item.find('.hover-icon');
		offsetTop = $item.offset().top;
		current = $item.index();

		$item.addClass('loading');
		$icon.addClass('loading');

		totalheight = $expanded.data( 'height' ) + $image.height() + settings.marginBottom;

		if(offsetTop!==expanderPosition && expanderPosition !==0) {
			//not the same row
			var $expandedItem = $('#og-grid li.expanded');
			$expandedItem.removeClass('expanded').find('.og-expander').animate({	height: 0, opacity: '0' },500,function(){
				$expandedItem.animate({ 'height' :$expandedItem.data( 'height' ) },200);
			});
			$item.addClass('expanded').animate({ height: totalheight },500, function(){
				$expanded.css({height: $expanded.data( 'height' )}).animate({ opacity: '1' },500, function(){
					expanderPosition = $('#og-grid li.expanded').offset().top;
					$body.animate( { scrollTop : expanderPosition }, settings.speed );
					$item.removeClass('loading').delay( 800 ).find('.hover-icon').removeClass('loading');

				})
			})
		} else {
			// same row
			var $expandedItem = $('#og-grid li.expanded');
				$item.addClass('expanded').animate({ height: totalheight },500, function(){
					$expanded.css({height: $expanded.data( 'height' )}).animate({ opacity: '1' } ,200, function(){
				})
				//
				$expandedItem
				.animate({ 'height' :$expandedItem.data( 'height' ) })
				.removeClass('expanded').find('.og-expander')
				.css({ height: 0 })
				.css({  opacity: '0' })
				expanderPosition = $('#og-grid li.expanded').offset().top;
				$body.animate( { scrollTop : expanderPosition }, settings.speed );
				$item.removeClass('loading').delay( 800 ).find('.hover-icon').removeClass('loading');


			})
		}

	}

	function setTransition($item) {
		$item.find('.og-expander').css( 'transition', 'height ' + settings.speed + 'ms ' + settings.easing );
		$item.css( 'transition', 'height ' + settings.speed + 'ms ' + settings.easing );
	}

	function hidePreview() {

		var $expandedItem = $items.eq( current );
		current = -1;
		$items.removeClass('expanded').find('.og-expander').animate({	 opacity: '0' },500,function(){
			$items.find('.og-expander').css({ height: 0 });
			$items.animate({ 'height' :$items.data( 'height' ) },200);
		});

	}

	return {
		init : init
	};

})();

