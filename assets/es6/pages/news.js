import Default from './default'
import $ from 'jquery'
import config from 'config'
import {TweenMax} from 'gsap'

export default class News extends Default {

	constructor() {

		super()
	}

	init() {
		var _ = this;

		super.init();


		//------
		//-- INIT NAV GALLERY
		//------
		var $entryGallery = $('.entry-gallery'),
			$entry = $('.entry');
		if( $entryGallery.length > 0 ) {

			config.$window
				.on('resize', function() {
					// Init the gallery size
					var top = $entry.find('.page-header').position().top + $entry.find('.page-header').outerHeight(true);

					if( config.$window.width() >= 1024) {

						if( $entry.outerHeight(true) < $entryGallery.outerHeight(true) + top ) {
							TweenMax.set($entry, { height : $entryGallery.outerHeight(true) + top });
						}
						TweenMax.set($entryGallery, { top : top });
					} else {
						TweenMax.set($entry, { height : 'auto' });
						TweenMax.set($entryGallery, { top : 0 });
					}
				})
				.on('scroll', function() {
					// Detect when fixed element
					var _scrollTop = $(this).scrollTop();

					if( _scrollTop > $entry.offset().top && $entry.outerHeight(true) < $entryGallery.outerHeight(true) + parseFloat($entryGallery.css('top')) ) {
						$entry.addClass('fixed');

						if( _scrollTop + $entry.find('.entry-content').outerHeight(true) >= $entry.offset().top + $entry.outerHeight() ) {
							$entry.addClass('bottom');
						} else {
							$entry.removeClass('bottom');
						}
					} else {
						$entry.removeClass('fixed');
					}
				}).trigger('resize');
		}
	}
}