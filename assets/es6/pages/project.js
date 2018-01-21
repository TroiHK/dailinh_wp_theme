import Default from './default'
import $ from 'jquery'
import config from 'config'
import {TweenMax} from 'gsap'
import {} from 'slick-carousel'

export default class Project extends Default {

	constructor() {

		super()
	}

	init() {
		var _ = this;

		super.init();


		//------
		//-- INIT PROGRESSION PROJECT
		//------
		var $progression = $('.project__progression'),
			$progressionImg = $progression.find('.project__progression-img'),
			$progressionLabel = $progression.find('.project__progression-label');

		$progressionLabel.on('mouseenter', 'li.active', function(e) {
			e.preventDefault();

			$progression.find('.project__progression-img.active').removeClass('active');
			$progressionImg.eq($(this).index()).addClass('active');
		})

		$progression.on('mouseleave', function(e) {


			$progression.find('.project__progression-img.active').removeClass('active');
			$progressionImg.eq($progressionImg.length - 1).addClass('active');
		});



		//------
		//-- INIT NEWS CAROUSEL
		//------
		var $sliderNews = $('.news__teaser-slider');
		if( $sliderNews.length > 0 ) {
			$sliderNews
				.slick({
					slide : '.news__teaser-slide',
					fade : true,
					speed : 700,
					nextArrow : config.arrowNext,
					prevArrow : config.arrowPrev
				})
		}



		//------
		//-- INIT TEAM CAROUSEL
		//------
		var $projectTeam = $('.project__team-slider');
		if( $projectTeam.length > 0 ) {
			$projectTeam
				.slick({
					slide : '.project__team-item',
					speed : 900,
					nextArrow : config.arrowNext,
					prevArrow : config.arrowPrev,
					infinite : false,
					cssEase : 'cubic-bezier(.91,.01,.3,1)',
					slidesToShow : 4,
					slidesToScroll : 4,
					responsive: [
						{
							breakpoint: 650,
							settings: {
									cssEase : 'ease',
									slidesToShow: 1,
									slidesToScroll: 1
								}
						}
					]
				})
		}
	}
}