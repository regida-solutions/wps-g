(function (window) {
	/**
	 * Extend Object helper function.
	 */
	function extend(a, b) {
		for (const key in b) {
			if (b.hasOwnProperty(key)) {
				a[key] = b[key];
			}
		}
		return a;
	}

	/**
	 * Each helper function.
	 */
	function each(collection, callback) {
		for (let i = 0; i < collection.length; i++) {
			const item = collection[i];
			callback(item);
		}
	}

	/**
	 * Menu Constructor.
	 */
	function Menu(options) {
		this.options = extend({}, this.options);
		extend(this.options, options);
		this._init();
	}

	/**
	 * Menu Options.
	 */
	Menu.prototype.options = {
		wrapper: '#page', // The content wrapper
		type: 'slide-left', // The menu type
		menuOpenerClass: '.c-slide-nav-toggler', // The menu opener class names (i.e. the buttons)
		maskId: '#c-slide-nav-mask', // The ID of the mask
	};

	/**
	 * Initialise Menu.
	 */
	Menu.prototype._init = function () {
		this.body = document.body;
		this.wrapper = document.querySelector(this.options.wrapper);
		this.mask = document.querySelector(this.options.maskId);
		this.menu = document.querySelector(
			`#c-slide-nav--${this.options.type}`,
		);
		this.closeBtn = document.querySelector('.c-slide-nav__close');
		this.menuOpeners = document.querySelectorAll(
			this.options.menuOpenerClass,
		);
		this._initEvents();
	};

	/**
	 * Initialise Menu Events.
	 */
	Menu.prototype._initEvents = function () {
		if (this.closeBtn) {
			// Event for clicks on the close button inside the menu.
			this.closeBtn.addEventListener('click', (e) => {
				e.preventDefault();
				this.close();
			});

			// Event for clicks on the mask.
			this.mask.addEventListener('click', (e) => {
				e.preventDefault();
				this.close();
			});
		}
	};

	/**
	 * Open Menu.
	 */
	Menu.prototype.open = function () {
		this.body.classList.add('has-active-menu');
		this.wrapper.classList.add(`has-${this.options.type}`);
		this.menu.classList.add('is-active');
		this.mask.classList.add('is-active');
		this.disableMenuOpeners();
	};

	/**
	 * Close Menu.
	 */
	Menu.prototype.close = function () {
		this.body.classList.remove('has-active-menu');
		this.wrapper.classList.remove(`has-${this.options.type}`);
		this.menu.classList.remove('is-active');
		this.mask.classList.remove('is-active');
		this.enableMenuOpeners();
	};

	/**
	 * Disable Menu Openers.
	 */
	Menu.prototype.disableMenuOpeners = function () {
		each(this.menuOpeners, (item) => {
			item.disabled = true;
		});
	};

	/**
	 * Enable Menu Openers.
	 */
	Menu.prototype.enableMenuOpeners = function () {
		each(this.menuOpeners, (item) => {
			item.disabled = false;
		});
	};

	/**
	 * Add to global namespace.
	 */

	window.Menu = Menu;
})(window);
