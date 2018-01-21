import $ from 'jquery'

const config = {

	PATH: '',

	prevRoute: '/',
	routes: {
		default: '/',
		home: '/'
	},

	$document: $(document),
	$window: $(window),
	$html: $('html'),
	$body: $('body'),
	$htmlBody: $('html, body'),

	width: window.innerWidth,
	height: window.innerHeight,

	isMobile: window.innerWidth <= 768,
	isMac: navigator.platform === 'MacIntel' || navigator.platform === 'MacPPC',

	arrowNext : '<button class="slider-arrow arrow-next"><i class="arrow-right"></i></button>',
	arrowPrev : '<button class="slider-arrow arrow-prev"><i class="arrow-left"></i></button>'
};

export default config;