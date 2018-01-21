import Default from './default'
import $ from 'jquery'
import config from 'config'
import {TweenMax} from 'gsap'
import {} from 'slick-carousel'

export default class Team extends Default {

	constructor() {

		super()
	}

	init() {
		var _ = this;

		super.init();



		//------
		//-- INIT REF CAROUSEL
		//------
		var $teamRefs = $('.team__references-slider');
		if( $teamRefs.length > 0 ) {
			$teamRefs
				.slick({
					slide : '.team__references-slide',
					speed : 900,
					nextArrow : config.arrowNext,
					prevArrow : config.arrowPrev,
					infinite : false,
					cssEase : 'cubic-bezier(.91,.01,.3,1)'
				})
		}
	}
}