import Default from './default'
import $ from 'jquery'
import config from 'config'
import {TweenMax} from 'gsap'
import SimpleBar from 'simplebar'
import ScrollMagic from 'scrollmagic'

export default class Projects extends Default {

	constructor() {

		super()
	}

	init() {
		var _ = this;

		super.init();

		$('.trigger-filter').on('click', function(e) {
			e.preventDefault();

			config.$html.toggleClass('open-filter');

			if( config.$html.hasClass('open-filter'))
				TweenMax.set($('.filter'), { maxHeight : $('.filter__table').outerHeight(true) });
			else 
				TweenMax.set($('.filter'), { maxHeight : 0 });
				
		});

		$('.filter__col-inner').each(function() {
			new SimpleBar($(this)[0]);
		})
	}
}