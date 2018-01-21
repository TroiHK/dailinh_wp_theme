import $ from 'jquery'
import gsap from 'gsap'

// What does the accordion plugin do?
$.fn.accordion = function(options) {

	if (!this.length) { return this; }

	var opts = $.extend(true, {}, $.fn.accordion.defaults, options);

	this.each(function() {
		var $this = $(this);
		var $parent = $this.closest('.js-accordion__parent');
		var $container = $parent.find('.js-accordion__container');
		var $content = $parent.find('.js-accordion__content');

		$this.data('open', false).on('click', function(e) {
			e.preventDefault();

			var isOpen = $this.data('open');
			var height = isOpen ? 0 : $content.outerHeight();
			var opacity = isOpen ? 0 : 1;

			// Toggle state
			$this.data('open', !isOpen).toggleClass('is-open');

			// Launch function onStart
			opts.onStart($this, isOpen);

			TweenLite.to($container, 1, {
				height: height,
				opacity: opacity,
				onComplete: () => {
					$container.css('height', isOpen ? 0 : 'auto');
					// Launch onComplete callback
					opts.onComplete($this, isOpen);
				}
			});
		});

	});

	return this;
};

// default options
$.fn.accordion.defaults = {
	onStart: function() {},
	onComplete: function() {}
};
