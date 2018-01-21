'use strict'
/* ================================
* Utils
* ================================ */
import config from 'config'
import $ from 'jquery'


/**
 * Convert a kebab-case string into a camelCase one
 * @param  {string} string The string to convert
 * @return {string}        The camelCased string
 */
export const camelCase = function(string) {
	return string.toLowerCase().replace(/-(.)/g, (match, group) => {
		return group.toUpperCase()
	})
}



/**
 * Convert a kebab-case string into a PascalCase one
 * @param  {string} string The string to convert
 * @return {string}        The transformed string
 */
export const pascalCase = function(string) {
	// Remove dashes and transform
	// following letter to uppercase
	string = string.toLowerCase()
		.replace(/-(.)/g, (match, group) => {
			return group.toUpperCase()
		})

	// Return string with first letter
	// transformed to uppercase
	return string.charAt(0).toUpperCase() + string.slice(1)
}



/**
 * Returns a function, that, as long as it continues to be invoked, will not
 * be triggered. The function will be called after it stops being called for
 * N milliseconds. If `immediate` is passed, trigger the function on the
 * leading edge, instead of the trailing.
 * @param  {number}    wait       Timer
 * @param  {boolean}   immediate  Launch the function immediately
 * @param  {function}  func       The function that needs debounce
 * @return {function}             A function to bind to the event debounced
 */
export const debounce = function(wait, immediate, func) {
	let timeout;

	return function() {
		const context = this;
		const args = arguments;
		const later = () => {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		let callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
}



/**
 * Animate scroll for anchor links
 * @return {void}
 */
export const smoothScroll = function(event) {
	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
		const $target = $(this.hash)
		if ($target.length) {
			TweenLite.to(window, 0.8, {
				scrollTo: {
					y: $target.offset().top
				},
				ease: Expo.easeInOut
			})
			return false
		}
	}
}



/**
 * Create an ending event for the event triggered
 * @param  {object} e The triggered event's object
 * @return {undefined}
 */
export const addEndEvent = debounce(200, false, function(e) {
	console.log(`${e.type}End`)
	$(this).trigger(`${e.type}End`)
})



/**
 * Convert degrees to rad
 * @param  {integer} degrees The angle to convert
 * @return {integer}         The converted angle in rad
 */
export const degToRad = (degrees) => {
	return degrees * Math.PI / 180
}



/**
 * Get a random integer in the given interval
 * @param  {integer} min The interval's minimum
 * @param  {integer} max The interval's maximum
 * @return {integer}     A random integer in the given interval
 */
export const getRandomInt = (min, max) => {
	return Math.floor(Math.random() * (max - min)) + min
}



export const injector = function(t, splitter, klass, after) {
	var text = t.text()
	, a = text.split(splitter)
	, inject = '';
	if (a.length) {
		$(a).each(function(i, item) {
			inject += '<span class="'+klass+(i+1)+'" aria-hidden="true"><span>'+(item == ' ' ? '&nbsp;' : item )+'</span></span>'+after;
		});
		t.attr('aria-label',text)
		.empty()
		.append(inject)

	}
}

export const splitLineBreak = function(elt) {
	var para = elt;

	config.$window.on({
		resize : function() {
			para.each(function(){
			    var current = $(this);
			    var text = current.text();
			    var newText = '<span><span>';
			    var _length = text.length;
			    var cursor = 0;
			    
			    var words = text.split(' ');
			    current.text(words[0]);
			    var height = current.height();
			    var infoWords = [{
			    	length : words[0].length,
			    	pos : 0
			    }]; 

			    for(var j = 1; j < words.length; j++) {
			    	infoWords.push({
			    		length : words[j].length,
			    		pos : infoWords[j-1].pos + infoWords[j-1].length + 1
			    	});
			    }
			    for(var i = 1; i < words.length; i++){
					var chars = '';
			        current.text(current.text() + ' ' + words[i]);
			        
			        if(current.height() > height){
			            height = current.height();
			            var index = text.indexOf(words[i-1]) + words[i-1].length;
			            newText += text.substring(infoWords[cursor].pos, infoWords[i-1].pos+infoWords[i-1].length) + '</span></span> <span><span>';
			            cursor = i;
			            // for( var j = 0; j < words[i-1].length; j++ ) chars += 'j';
			            // text = text.replace(new RegExp(words[i-1]), chars);
			            //console.log(words[i-1]);
			        }
			    }
			    newText += text.substring(infoWords[cursor].pos, _length) + '</span></span>';
			    current.html('').html(newText);
			});

		}
	}).trigger('resize');
}


export const parallax = function() {

    var _duration = "200%";
    var _triggerHook = "onEnter";

    // init controller
    var controller = new ScrollMagic.Controller(),
    	scenes = createScenes();

	controller.addScene(scenes);

	var controllerIsEnabled = true;
	config.$window.on('resize', function() {

		if( config.$window.width() < 1024 ) {
			controller.destroy(true);
			controllerIsEnabled = false;
		} else if( controllerIsEnabled == false ) {
			controller = new ScrollMagic.Controller();
			controllerIsEnabled = true;
			controller.addScene(createScenes());
		}
	}).trigger('resize');



    function createScenes() {
		var scenes = [];

	    // search elements
	    $('[data-trigger]').each(function() {

	        // duration
	        var d = $(this).data('duration') !== undefined ? $(this).data('duration') : _duration;

	        // trigger hook
	        var tH = $(this).data('trigger-hook') !== undefined ? $(this).data('trigger-hook') : _triggerHook;

	        var properties = $(this).data('properties');

	        // build scenes
	        var scene = new ScrollMagic.Scene({triggerElement: ($(this).data('trigger') == 'this' ? $(this)[0] : $(this).data('trigger')) })
	                        .setTween($(this), properties)
	                        //.addIndicators()
	                        .duration(d)
	                        .triggerHook(tH)
	                        .addTo(controller);

	        scenes.push(scene);
	    });

	    return scenes;
	}
} 