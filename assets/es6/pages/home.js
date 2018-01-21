import Default from './default'
import config from 'config'
import {} from 'slick-carousel'
import $ from 'jquery'
import {TweenMax} from 'gsap'
import Flickity from 'flickity'

export default class Home extends Default {

	constructor() {

		super()
	}

	init() {
		var _ = this;

		super.init(); 

		class Swipe {
			
			constructor(callback) {
				this.$doc = $('.section-news, .content__timeline')
				this.$pre = $('pre'),
				this.threshold = 40,
				this.pointer = { 
					x: {
						start: null,
						current: null,
						delta: 0
					}, 
					y: {
						start: null,
						current: null,
						delta: 0
					}
				}
				this.isDown = false
				this.direction = 'not moving'
				this.callback = callback;
			}
			
			init() {
				this.$doc.on('touchstart', this.touchstartHandler.bind(this))
				this.$doc.on('mousedown', this.mousedownHandler.bind(this))
				//this.print(this)
			}

			disabled() {
				this.$doc.off('mousemove', this.mousemoveHandler);
				this.$doc.off('touchmove', this.touchemoveHandler);
			}

			start(x, y) {
				this.pointer.x.start = x
				this.pointer.x.current = x
				this.pointer.y.start = y
				this.pointer.y.current = y
				this.isDown = true
				this.tick()
			}
			
			end() {
				this.isDown = false;
				this.callback();
				this.direction = 'not moving'
			}
			
			tick() {
				if (this.isDown) {
					this.pointer.x.delta = this.pointer.x.current - this.pointer.x.start
					this.pointer.y.delta = this.pointer.y.current - this.pointer.y.start
					//this.print(this)
					
					// DO STUFF HERE
					if (this.pointer.x.delta > 0 && Math.abs(this.pointer.x.delta) > this.threshold ) {
						this.direction = 'right'
					} else if (this.pointer.x.delta < 0 && Math.abs(this.pointer.x.delta) > this.threshold ) {
						this.direction = 'left'
					}
					
					requestAnimationFrame(this.tick.bind(this))
				}	
			}

			mousedownHandler(e) {
				
				// Bind events
				this.$doc.on('mousemove', this.mousemoveHandler.bind(this))
				this.$doc.one('mouseup', (e) => {
					this.$doc.off('mousemove', this.mousemoveHandler)
					this.end();
				})
				
				const x = e.clientX
				const y = e.clientY
				this.start(x, y);
			}

			mousemoveHandler(e) {
				this.pointer.x.current = e.clientX
				this.pointer.y.current = e.clientY
				e.stopPropagation();
			}
			
			touchstartHandler(e) {
				this.$doc.on('touchmove', this.touchmoveHandler.bind(this))
				this.$doc.one('touchend', (e) => {
					this.$doc.off('touchmove', this.touchemoveHandler)
					this.end()
				})
				e.stopPropagation();
				
				const touch = e.touches[0]
				const x = touch.clientX
				const y = touch.clientY
				this.start(x, y)
			}
			
			touchmoveHandler(e) {
				// Get first touch item
				const touch = e.touches[0]
				this.pointer.x.current = touch.clientX
				this.pointer.y.current = touch.clientY
			}
			
			print(obj) {
				const string = JSON.stringify(obj, this.filter, 2).replace(/"/g, '')
				this.$pre.html(string)
			}
			
			filter(key, value) {
				return key !== '$doc' && key !== '$pre' ? value : undefined
			}
		}

		// Init slider cover
		var $sliderImg = $('.slider'),
			$sliderContent = $('.slider-content');

		$sliderContent
			.on('init', function(event, slick) {
				_.navigationSlider($sliderContent, $sliderContent.find('.slide-content').length);

				TweenMax.set($sliderImg.find('.slide').eq(0), { x : '0%' });
			})
			.slick({
				fade : true,
				slide : '.slide-content',
				arrows : false,
				autoplay : true,
				autoplaySpeed : 3000
			})
			.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
				if( currentSlide == nextSlide ) return false;

				$sliderImg.find('.slide').eq(currentSlide).removeClass('active').end()
					.eq(nextSlide).addClass('active');

				TweenMax.fromTo($sliderImg.find('.slide').eq(currentSlide), 1.4, {x : '0%'}, { x : '-100%', ease: Power3.easeInOut });
				TweenMax.fromTo($sliderImg.find('.slide').eq(nextSlide), 1.2, {x : '100%'}, { x : '0%', ease: Power3.easeInOut });
			});


		// Init carousel news
		var $carouselNews = $('.news-carousel'),
			$newsSlide = $carouselNews.find('.news-slide'),
			x = 0,
			current = 0,
			itemMoving = config.$window.outerWidth() < 1024 ? 1 : 2;

		$carouselNews.css({ width : $newsSlide.length * $newsSlide.outerWidth(true) })

		$('.news-arrows').on('click', 'a', function(e) {
			e.preventDefault();

			if( $(this).hasClass('next')) {
				var next = current >= $newsSlide.length - 1 ? 0 : current + itemMoving;

				if( next > $newsSlide.length - 1 ) next =  $newsSlide.length - 1;
			} else {
				var next = current == 0 ? $newsSlide.length - 1 : current - itemMoving;

				if( next <= 0 ) next =  0;
			}

			$carouselNews.find('.news-slide.no-visible').removeClass('no-visible');
			$carouselNews.find('.news-slide:lt('+next+')').addClass('no-visible');

			TweenMax.to($carouselNews, 0.5, { x : (next == 0 ? 0 : -$newsSlide.eq(next).position().left) });
			current = next;
		});

		// init touch 
		const swipe = new Swipe(function() {
			if(this.direction == 'left') {
				$('.news-arrows').find('a').eq(1).trigger('click');
			} else if( this.direction == 'right') {
				$('.news-arrows').find('a').eq(0).trigger('click');
			}
		});
		if( config.$window.outerWidth() < 1024) swipe.init();


		// Init carousel edition
		var $carouselEdition = $('.edition-carousel');

		if( $carouselEdition.length > 0 ) {
			var flkty = new Flickity( $carouselEdition[0], {
				cellAlign: 'left',
				cellSelector: '.edition-item',
				pageDots : false,
				infinite: true,
				prevNextButtons: false
			}); 

			$carouselEdition.find('.edition-arrows').on('click', 'a', function(e) {
				e.preventDefault();

				if( $(this).hasClass('next') ) {
					flkty.next();
				} else {
					flkty.previous();
				}
			})
		}
	}
}