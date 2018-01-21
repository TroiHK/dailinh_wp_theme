/**
 * Ajax load
 * @param {object} options the instance options
 */
Ajax = function() {
	'use strict';

	if (!(this instanceof Ajax)) return new Ajax();
	if (isIE() === 9) return;

	var _ = this;

	// Init vars
	var $window = $(window);
	var $page = $('#js-page');
	var $title = $('title');
	var tl;

	// Listen URL changes
	History.Adapter.bind($window, 'statechange',
	function(event) {
		var currentHash = History.getState().url; // current url
		var differentUrl = Vars.url.replace(window.location.origin, '') != currentHash.replace(window.location.origin, '');
		if (differentUrl)
			loadPage(currentHash);
	});

	/**
	 * Detect IE browser
	 */
	function isIE() {
		var myNav = navigator.userAgent.toLowerCase();
		return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
	}

	/**
	 * AJAX Loading
	 */
	function loadPage(url) {
		console.log('loadPage');

		// Loading page
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'HTML',
			data: { ajax: true },
			success: function(data, textStatus, jqXHR) {

				// Update vars
				Vars.url = url;
				History.pushState({}, '', url);

				// Delete old data
				onBeforeLoad(data);

			}
		});
	};


	/**
	 * Closing animation
	 */
	function onBeforeLoad(data) {
		console.log('onBeforeLoad');

		// Closing animation
		// OnComplete
		onLoad(data)

		// Update Header link states here
		// if (window.location.pathname == '') {}

	}

	/*
	 * Loading animation
	 */
	function onLoad(data) {
		console.log('onLoad');

		// Loader animation
		// OnComplete
		contentLoaded(data);

	}

	/*
	 * Load ending animation
	 */
	function contentLoaded(data) {
		console.log('contentLoaded');

		// Hide loader animation
		// oncomplete
		onLoadComplete(data)
	}

	/**
	 * Opening animation
	 */
	function onLoadComplete(data) {
		console.log('onLoadComplete');


		// Update Google Analytics
		if ( typeof $window._gaq !== 'undefined' ) {
			$window._gaq.push(['_trackPageview', Vars.url]);
		}

		// Add content to page
		$page.html(data);

		// Redefining vars
		var $pageContainer = $page.find('#js-page__data');

		Vars.oldParent = Vars.parent;
		Vars.oldChild = Vars.child;
		Vars.parent = $pageContainer.data('parent');
		Vars.child = $pageContainer.data('child');
		Vars.ajaxLinks = $html.find('.js-ajax__link');

		// Update page title
		$title.html($pageContainer.data('title'));

		/*
		 * Opening animation
		 */
		TweenLite.to( $body, 1, { opacity: 1, ease: Power2.easeIn });

		// Update js page
		Utils.hasMethod(Vars.oldParent, 'kill', Vars.oldChild, 'kill');
		Utils.hasMethod(Vars.parent, 'init', Vars.child, 'init');

		// Update links
		Vars.ajaxLinks.on('click', onClick).on('click', preventDefault);

	}

	/*
	 * Loading links with ajax
	 */
	function onClick() {
		console.log('onClick');
		Vars.ajaxLinks.off('click', onClick);

		var $this = $(this);

		loadPage($this.attr('href'));

	};


	/*
	 * Prevent default on ajax links
	 */
	function preventDefault(e) {
		console.log('preventDefault');
		e.preventDefault();
	}

	// Disable click on ajax links
	Vars.ajaxLinks.on('click', onClick).on('click', preventDefault);

}
