import { addEndEvent, smoothScroll, splitLineBreak, injector } from 'utils'
import cookies from 'js-cookie'
import config from 'config'
import Lazy from '../utils/lazy'
import $ from 'jquery'
import ScrollMagic from 'scrollmagic'
import {TweenMax} from 'gsap'

export default class Default {

	/**
	 * Constructor function
	 * @return {object} The current instance
	 */
	constructor() {
		console.log(`${this.constructor.name}:constructor`)

		var _ = this;

		///// A SUPPRIMER POUR WORDPRESS
		$('form').on('submit', function(e) {
			e.preventDefault();
			$(this).addClass('sendform');
		});
		///// END A SUPPRIMER POUR WORDPRESS

		_.idSlide = 0;
		_.alreadyOnBeforeChange = [];

		// ask for cookies
		this.cookies();

		// Prevent scrollTop on click on a[href="#"] links
		config.$document.on('click', 'a[href="#"]', function(e) { e.preventDefault(); });

		// Smooth scroll for anchors link
		config.$document.on('click', 'a[href*="#"]:not([href="#"])', smoothScroll); 

		// Create throttled events
		config.$window.on({
			resize: addEndEvent,
			scroll: addEndEvent
		});

		// Show loader
		config.$document.on('click', 'a:not([href^="#"]):not([target="_blank"]):not(.trigger-gallery)', function(e) {

			e.preventDefault();
			config.$htmlBody.removeClass('page-is-loaded'); 
 
			var href = $(this).attr('href');

			setTimeout(function() {
				window.location.href = href;

				if( config.$window.width() <= 480 ) {
					setTimeout(function() {
						config.$htmlBody.addClass('page-is-loaded');
					}, 400)	
				}
			}, 900);

			return false;
		});

		// Word breaker
		$('.word-breaker').each(function() {
			injector($(this), ' ', 'word-', ' ');
		})

		// Split line break in span
		splitLineBreak($('.line-breaker'));

		// Init the sliders
		this.initSlider();

		// Toggle menu
		config.$document.on('click', '.toggle-menu', function(e) {
			e.preventDefault();
			config.$html.toggleClass('open-menu');
			TweenMax.to(config.$htmlBody, 0.3, { scrollTop : 0 });
		});

		// Open search
		config.$document.on('click', '.trigger-search', function(e) {
			e.preventDefault();
			config.$html.toggleClass('open-search');

			if( config.$html.hasClass('open-search')) {
				setTimeout(function() {
					document.getElementById('search-key').focus();
				}, 500);
			}

			$(document).off('click.search').on('click.search', function(e) {
				if( $(e.target).hasClass('block-search') || $(e.target).parents('.block-search').length > 0) return true;

				config.$html.removeClass('open-search');
			})
		});

		// Init focus on form
		$('.form-text,.form-textarea, .form-select select').on('focus', function() {
			$(this).parents('.form-item').addClass('onfocus');
		}).on('blur change', function() {
			if( $(this).val() != '' ) $(this).parents('.form-item').addClass('onfill');
			else $(this).parents('.form-item').removeClass('onfill');
			
			$(this).parents('.form-item').removeClass('onfocus');
		}).trigger('blur change');



		// resize textarea when line break
		$('textarea').on('input', function(e) {
			$(this).css('height', this.scrollHeight);
		});


		// Custom video player
		_.customVideoPlayer();

		// Init lazy load
		var lazy = new Lazy({
			onSuccess : function(elt) {
				$(elt).parent().addClass('img-is-loaded');
			}
		});
		lazy.init();

		// Check if mac for better font aliasing
		if (config.isMac) config.$html.addClass('is-mac');


		// Tabs
		var $tabs = $('.tab');
		if( $tabs.length > 0 ) {
			$tabs.each(function() {
				var $tab = $(this);

				$tab.find('ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
		
				$tab.find('ul.tabs li a').click(function (g) { 
					var tab = $(this).closest('.tab'), 
						index = $(this).closest('li').index();
					
					tab.find('ul.tabs > li').removeClass('current');
					$(this).closest('li').addClass('current');

					var $current = tab.find('.tab-content').find('div.tab-item').not('div.tab-item:eq(' + index + ')'),
						$next = tab.find('.tab-content').find('div.tab-item:eq(' + index + ')');

					TweenMax.to($current, 0.6, { height : 0, y : -20 });
					setTimeout(function() {

						TweenMax.to($next, 0.7, { height : $next.children().outerHeight(true), y : 0, onComplete : function() {
							TweenMax.set($next, { height : 'auto'});
						} });
					}, 500);
					
					g.preventDefault();
				});

				$tab.find('ul.tabs > li:eq(0) a' ).trigger('click');
			});
		}



		// Init the gallery
		$('.trigger-gallery').each(function() {

			$(this).on('click', function(e) {
				e.preventDefault();

				if( $('.gallery__popin-slider').hasClass('slick-initialized')) $('.gallery__popin-slider').slick('unslick');

				_.initGallery($(this));

				setTimeout(function() {
					config.$html.addClass('open-gallery');
				}, 40);
			})
		});
		$('.gallery__close').on('click', function(e) {
			e.preventDefault();
			config.$html.removeClass('open-gallery');
			
			_.pauseAllVideos();
		});


		_.controller = new ScrollMagic.Controller();

		// hide loader page
		setTimeout(function() {
			config.$htmlBody.addClass('page-is-loaded');

			setTimeout(function() {
				_.initReveal();
			}, 750);
		}, 300);

		return this
	}

	/**
	 * Init the page
	 * @return {object} The current instance
	 */
	init() {
		console.log(`${this.constructor.name} is init`)

		return this;
	}


	/**
	 * Kill the page
	 * @return {object} The current instance
	 */
	kill() {
		console.log(`${this.constructor.name} has been killed`)

		return this;
	}


	/**
	 * Stuff to do on window resize
	 * @param  {integer} width  The current view size
	 * @param  {integer} height The current view height
	 * @return {undefined}
	 */
	resize(width, height) {
		console.log(`${this.constructor.name} has been resized`)
	}


	/**
	 * Handle cookies message
	 * @return {undefined}
	 */
	cookies() {
		const $cookies = $('#js-cookies')

		if (cookies.get('terms') === 'accepted') {
			$cookies.remove()
			return
		}

		$cookies.addClass('is-visible');

		$('#js-cookies__btn').on('click', function() {
			$cookies.remove()
			// Set a cookie that expires in 1 year
			cookies.set('terms', 'accepted', { expires : 365 })
			return false
		});
	}

	/** 
	 * Init scroll magic
	 **/
	initReveal() {
		var _ = this,
			_scenes = [];

		$('.js-reveal:not(.is-visible)').each(function() {
			var triggerHook = $(this).data('trigger-hook') != undefined ? $(this).data('trigger-hook') : 0.9;

			var _scene = new ScrollMagic.Scene({triggerElement: $(this)[0]})
						.setClassToggle($(this)[0], "is-visible") // add class toggle
						.triggerHook(triggerHook)
						.addTo(_.controller); 
						
			_scenes.push(_scene);
		});

		return _scenes;
	}

	/**
	 * Create slider
	 */
	initSlider() {
		var _ = this;

		$('[data-slider]').each(function() {
			var $slider = $(this),
				$content = $slider.data('content') != undefined ? $('.'+$slider.data('content')).find('.slide-content') : null,
				$legends = $slider.find('.slider-legends figcaption'); 
 

			$slider
				.on('init', function(event, slick) {
					_.navigationSlider($slider, slick.slideCount);

					$('.slick-arrow').on('click', function() {
						if( $(this).hasClass('slick-prev') ) { 
							$slider.addClass('inverse');
						} else {
							$slider.removeClass('inverse');
						}
					})

					if( $legends.length > 0 ) $legends.eq(0).addClass('active');
					if( $content != null && $content.length > 0 ) {
						$content.eq(0).addClass('active');
						TweenMax.set($content.parent(), { height : $content.eq(0).outerHeight(true) });
					}
				})
				.slick({
					slide : '.slide', 
					speed : 700,
					prevArrow : '<button type="button" class="slick-prev"><span class="icon-arrow-right"></span></button>',
					nextArrow : '<button type="button" class="slick-next"><span class="icon-arrow-right"></span></button>'
				})
				.on('beforeChange', function(event, slick, currentSlide, nextSlide ){
					if( currentSlide == nextSlide ) return;
					slick.$slides.eq(currentSlide).addClass('slide-old');

					if( $legends.length > 0 ) {
						$legends.eq(currentSlide).addClass('old').removeClass('active');
						$legends.eq(nextSlide).addClass('active');
					}

					if( $content != null && $content.length > 0 ) {
						$content.eq(currentSlide).addClass('old').removeClass('active');
						$content.eq(nextSlide).addClass('active');

						TweenMax.set($content.parent(), { height : $content.eq(nextSlide).outerHeight(true) });
					}
				})
				.on('afterChange', function(event, slick, currentSlide) {
					var index = currentSlide == 0 ? slick.$slides.length - 1 : currentSlide - 1;
					slick.$slides.eq(index).removeClass('slide-old');
					if( $legends.length > 0 ) $legends.eq(index).removeClass('old');
					if( $content != null && $content.length > 0 ) $content.eq(index).removeClass('old');
				});
		});
	}

	/**
	 * Create navigation from slider
	 */
	navigationSlider($elt, nbSlides) {
		var $nav = $('<nav class="nav-slider" />').appendTo($elt),
			$counter = $('<div class="counter" />').appendTo($nav),
			$lines = $('<div class="lines" />').appendTo($nav),
			_ = this;

		_.idSlide = _.idSlide + 1;

		$counter.text('1 / '+nbSlides );

		for(var i = 0; i < nbSlides; i++ ) {
			var $line = $('<span class="line" />').appendTo($lines);

			$line.on('click', function(e) {
				e.preventDefault();
				$elt.slick('slickGoTo', $(this).index())
			})

			if( i == 0 ) $line.addClass('current');
		}

		if( _.alreadyOnBeforeChange[_.idSlide] == undefined ) {

			$elt.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
				if( currentSlide == nextSlide  ) return false;

				var $nav = $(slick.$list[0]).parent().find('.nav-slider'),
					$counter = $nav.find('.counter'),
					$lines = $nav.find('.lines');

				$counter.text((nextSlide + 1) +' / '+slick.$slides.length );
				$lines	.find('.current').removeClass('current').end()
						.find('.line').eq(nextSlide).addClass('current');

				if( $elt.data('dir') != undefined && $elt.data('dir') == 'vertical' ) {
					TweenMax.to($lines, 0.4, { y : -$lines.find('.line').eq(nextSlide).position().top ,ease : Power4.easeInOut });
				} else {
					TweenMax.to($lines, 0.4, { x : -$lines.find('.line').eq(nextSlide).position().left ,ease : Power4.easeInOut });
				}
			});

			_.alreadyOnBeforeChange[_.idSlide] = true;
		}
	}



	/**
	 * Create gallery
	 **/
	initGallery($elt) {
		if( $elt.data('gallery') == undefined ) return false;

		var _ = this; 

		// Init the lazy
		var lazy = new Lazy({
			onSuccess : function(elt) {
				$(elt).parent().addClass('img-is-loaded');
				$(elt).parent().parent().addClass('img-is-loaded');
			}
		});
		lazy.init();

		var elts = eval($elt.data('gallery')),
			types = [],
			$popin = $('.gallery__popin'),
			$container = $popin.find('.gallery__popin-container'),
			$slider = $popin.find('.gallery__popin-slider'),
			$legends = $popin.find('.gallery__popin-legends');

		$popin.off('click.close').on('click.close', function(e) {
			if( $(e.target).hasClass('gallery__popin') ) {
				e.preventDefault();
				config.$html.removeClass('open-gallery');
			}
		})

		// Init slider
		$slider
			.slick({
				speed : 700,
				prevArrow : '<button type="button" class="slick-prev"><span class="icon-arrow-right"></span></button>',
				nextArrow : '<button type="button" class="slick-next"><span class="icon-arrow-right"></span></button>'
			})
			.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
				var img = $(slick.$slides[nextSlide]).find('img:not(.is-loaded)');

				_.pauseAllVideos();

				if( img.length > 0 ) lazy.load(img[0], true);

				if( currentSlide == 0 ) {
					$slider.find('.slick-cloned img:not(.is-loaded)').each(function() {
						lazy.load($(this)[0], true);
					});

					$slider.find('.slick-cloned').eq(1).find('img:not(.is-loaded)').attr('src', $(slick.$slides[0]).find('img').attr('src')).addClass('is-loaded');
				}

				if( currentSlide != nextSlide ) {
					// active new legend
					$legends.find('figcaption').eq(currentSlide).removeClass('active');
					$legends.find('figcaption').eq(nextSlide).addClass('active');
				}
			});

		
		var $tabs = $('<ul />').addClass('gallery__tabs').appendTo($container);
		$tabs.append($('<li />').addClass('active').html('<a href="#">Tout</a>'));

		for(var i = 0; i < elts.length; i ++) {
			if( $.inArray(elts[i].type, types) < 0 ) {
				types.push(elts[i].type);

				// Construct the tab
				$tabs.append($('<li />').html('<a href="#" data-type="'+elts[i].type+'" >'+elts[i].type+'</a>'))
			}

		}

		// Init the slider
		constructSlider();

		// Init arrow
		// 37 => left
		// 39 => right
		config.$document.on('keydown', function(e) {
			var keycode = e.which ? e.which : e.keyCode;

			if( keycode == 37 ) {
				e.preventDefault();
				$slider.slick('slickPrev');
			} else if (keycode == 39) {
				e.preventDefault();
				$slider.slick('slickNext');
			}
		});


		//Init tab listener
		$tabs.on('click', 'a', function(e) {
			e.preventDefault();

			if( $(this).parent().hasClass('active') ) return false;
			_.pauseAllVideos();

			// Active the tab
			$tabs.find('.active').removeClass('active');
			$(this).parent().addClass('active');
		
			constructSlider();

		})



		function constructSlider() {

			// Delete all content
			$slider.find('.slick-slide').remove();
			$legends.children().remove();
			$slider.find('.nav-slider').remove();

			var type = $tabs.find('.active a').data('type');

			var compteur = 0;

			for(var i = 0; i < elts.length; i ++) {
				if( elts[i].type == type || type == undefined ) {
					var url = elts[i].url,
						$slide = $('<article data-type="' +elts[i].type+ '" />').addClass('gallery__popin-slide');

					$slide.append($('<div class="slide-content" />').append($('<div class="inner" />')));

					// Video
					if( url.indexOf('mp4') >= 0 )  {

						$slide.find('.inner').append('<video controls autoload><source src="' + url + '" /></video>').addClass('img-is-loaded').parent().addClass('img-is-loaded');
					}
					// Image
					else {
						$slide.find('.inner').append('<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8Xw8AAoMBgDTD2qgAAAAASUVORK5CYII=" data-src="'+url+'" />')

						if( compteur < 4) {
							lazy.load($slide.find('img')[0], true);
						}
					}
					$slider.slick('slickAdd', $slide);

					// Construct legend if exist
					var $legend = $('<figcaption />').appendTo($legends);
					if( compteur == 0 ) $legend.addClass('active');

					if( elts[i].title != '' || elts[i].legend != '' ) {
						$legend.html(elts[i].title);

						if( elts[i].legend != '' ) {
							$legend.append('<span>'+elts[i].legend+'</span>');
						}
					}

					compteur++;
				}
			}

			// Init nav
			_.navigationSlider($slider, compteur);

			// Custom video player
			_.customVideoPlayer();
		}
	}

	pauseAllVideos() {	
		$('video').each(function() {
			$(this)[0].pause();
			$(this)[0].currentTime = 0;
			$('.video__player').removeClass('playing');
		})
	}


	customVideoPlayer() {
		$('video:not(.init-player)').each(function() {
			var $video = $(this).addClass('init-player'),
				video = $video[0],
				$wrap = $('<div class="video__player" />').appendTo($video.parent());

			$video.appendTo($wrap);

			var $progress = $('<div class="video__player-progressbar" />').html('<span class="bar"></span>').appendTo($wrap),
				$btn = $('<a href="#" class="video__player-btn" />').html('<i><span></span></i>').appendTo($wrap);

			$btn.on('click', function(e) {
				e.preventDefault();

				if(video.paused) {
					video.play();
					$wrap.addClass('playing')
				} else {
					video.pause();
					$wrap.removeClass('playing')
				}

			});

			video.controls = false;
			video.addEventListener('timeupdate', function() {
				var percentage = Math.floor((100 / video.duration) * video.currentTime);

				TweenMax.set($progress.find('.bar'), { width : percentage + '%' });

				if( percentage >= 100) {
					video.currentTime = 0;
				}
			});
		});

	}
}