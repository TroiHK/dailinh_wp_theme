/* ================================
 * App
 * ================================ */

import {} from './vendors/console'
// import {} from './vendors/modernizr'

import config from 'config'
import { pascalCase, addEndEvent } from 'utils'
import Pages from './routes'



/**
 * Global init function
 * @param  {string} page 		segment_1 of the URL
 */
class App {

	constructor(page) {
		console.log('App:constructor');
		const _ = this;

		// Init page
		page = page ? page : 'Default'
		page = page.length ? pascalCase(page) : 'Default'
		console.log(page);
		this.page = Pages.hasOwnProperty(page) ? new Pages[page]() : new Pages.Default()
		this.page.init()

		// Bind resize
		config.$window.on({
			// Debounce the resize event
			resize: addEndEvent,
			resizeEnd: (e) => {
				// Trigger page resize on window resizeEnd
				_.page.resize(window.innerWidth, window.innerHeight)
			}
		})
	}
}

window.App = App;