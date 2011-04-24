/********************************************************************************
 *	jscounter.js - jQuery.js based plugin. Visit http://jquery.com/
 *	Dependencies: EaselJS library. Visit http://easeljs.com/
 *
 *	@version:	1.0
 *	@requires:	jQuery.js v1.4.2 or later
 *				EaselJS v0.3.2 or later
 *	@author:	Alexandre Anoutchine http://www.protoslider.com
 *
 *	UMons 2011. Alexandre Anoutchine
 ********************************************************************************/

(function ($) {

	//! Debuging
	function debug(msg) {
		if (window.console && window.console.log) {
			window.console.log(msg);
		}
	}

	//! Plugin's default options
	var defaults = {
		//! Plugin description
		name:			'JsCounter',
		version:		'1.0',

		//! Default digit image name
		image_numbers:	'numbers.png',

		//! Digit image dimensions
		digitHeight:	0,
		digitWidth:		0,
		borderRadius:	10,		//! Radius of the digit image corners
		spaceWidth:		5,		//! Space between digits

		//! Initial number
		number:			0,
		step:			1,		//! Increment step
		minLength:		1,		//! Minimal digit representation length

		//! Animation
		fps:			25,		//! Min 1. Max 100
		interval:		1000,	//! Min. step interval 1000 ms
		duration:		300,	//! Animation duration: min, max [100, 1000];

		//! Events
		onChange:		null,	//! On number changed event. param: num
		onFinished:		null	//! On animation finished event
	};

	//! Utilities library
	var lib = {
		//! Set execution context | return: function
		bind: function (handler, context) {
			var args = Array.prototype.slice.call(arguments, 2);
			return function () {
				return handler.apply(context, args);
			};
		},

		supportsCanvas: function () {
			var elem = document.createElement('canvas');
			return !!(elem.getContext && elem.getContext('2d'));
		},

		//! Check if object is Namber | return: boolean
		isNumber: function (object) {
			return Object.prototype.toString.call(object) === '[object Number]';
		},

		//! Check if object is String | return: boolean
		isString: function (object) {
			return Object.prototype.toString.call(object) === '[object String]';
		},

		//! Check if object is 'undefined' | return: boolean
		isUndefined: function (object) {
			return typeof object === "undefined";
		}
	};

	//! Digit class
	// Stage, Bitmap cache, digit image dimensions, didit position on the canvas, inital value
	// dim: {height: h, width: w, radius: r}; pos: {x: x, y: y}
	function Digit (stage, cache, dim, pos, initDigit) {

		//! --- Public methods ---
		//! Check if digit was updated | return: boolean
		this.isUpdated = function () {
			return this._updated;
		};

		//! Render one scene (one frame) | return: undefined
		this.render= function (progress) {
			if (this._updated) {
				return;
			}

			if (progress <= 0.5) {
				this._shape[0].alpha = progress*2;
				this._containers[1].scaleY = 1 - progress*2;
			} else if (this._containers[1].visible) {
				this._containers[1].scaleY = 0;
				this._containers[1].visible = false;
				this._containers[2].scaleY = 0;
				this._containers[2].visible = true;
			}

			if (progress > 0.5 && progress < 1) {
				this._shape[1].alpha = (2 - progress*2)*0.5;
				this._containers[2].scaleY = (progress -0.5)*2;
			} else if (progress >= 1) {
				this._shape[1].alpha = 0;
				this._containers[2].scaleY = 1;
				this._updated = true;
			}
		};

		//! Set digit and prepere for rendering | return: undefined
		this.setDigit = function (digit, _force) {
			if (this._digit === digit && !_force) {
				return;
			}

			this._containers[0].removeAllChildren();
			this._containers[1].removeAllChildren();
			this._containers[2].removeAllChildren();
			this._shape[0].alpha = 0;

			this._containers[0].addChild(this._mask[1] = cache.top[digit].clone());
			this._containers[1].addChild(this._mask[0] = cache.top[this._digit].clone());
			this._containers[1].addChild(this._shape[0]);
			this._containers[1].scaleY = 1;
			this._containers[1].visible = true;
			this._containers[0].addChild(this._containers[1]);

			this._containers[0].addChild(this._mask[2] = cache.bottom[this._digit].clone());
			this._containers[2].addChild(this._mask[3] = cache.bottom[digit].clone());
			this._containers[2].addChild(this._shape[1]);
			this._containers[2].visible = false;
			this._containers[0].addChild(this._containers[2]);

			this._digit = digit;
			this._updated = false;
		};

		//! --- Private properties ---
		//! Containers: main, top, bottom
		this._containers = [new Container(), new Container(), new Container()];
		this._mask = [null, null, null, null];	//! top, under top, bottom, over bottom
		this._digit = 0;
		this._updated = false;

		//! Graphics#drawRoundRectComplex( x, y, w, h, radiusTL, radiusTR, radiusBR, radiusBL )
		this._shape = [
			new Shape((new Graphics()).beginFill(Graphics.getRGB(0, 0, 0, 1)).
				drawRoundRectComplex(
					0, 0,
					dim.width, dim.height/2,
					dim.radius, dim.radius, 0, 0).
				endFill()),

			new Shape((new Graphics()).beginFill(Graphics.getRGB(255, 255, 255, 0.5)).
				drawRoundRectComplex(
					0, dim.height/2,
					dim.width, dim.height/2,
					0, 0, dim.radius, dim.radius).
				endFill())
		];

		//! Set container's dimensions
		this._containers[0].x = pos.x;
		this._containers[0].y = pos.y;

		this._containers[1].y = dim.height/2;
		this._containers[1].regY = dim.height/2;

		this._containers[2].y = dim.height/2;
		this._containers[2].regY = dim.height/2;

		stage.addChild(this._containers[0]);

		//! Set initial number
		if (!lib.isUndefined(initDigit) && lib.isNumber(initDigit)) {
			this._digit = initDigit;
			this.setDigit(initDigit, true);
		} else {
			this.setDigit(0, true);
		}
	}

	//! StaticDigit class
	// Container, ImageUrl, digit image dimensions, didit position, inital value
	// dim: {height: h, width: w, radius: r};pos: {x: x, y: y}
	function StaticDigit (container, imgUrl, dim, pos, initDigit) {
		
		//! --- Public methods ---
		//! Remove digit from container
		this.remove = function remove() {
			this._container.remove();
		};

		//! Set digit | return: undefined
		this.setDigit = function (digit) {
			if (this._digit === digit) {
				return;
			}

			this._container.css({
				backgroundPosition: -digit*dim.width
			});

			this._digit = digit;
		};

		//! --- Private methods ---
		//! Create didit
		this._create = function () {
			var offset = this._offset();
			
			container.append(this._container = $('<span/>').css({
				backgroundImage: 'url('+imgUrl+')',
				height: dim.height,
				left: offset.left + pos.x,
				position: 'absolute',
				top: offset.top + pos.y,
				width: dim.width
			}));
		};

		this._offset = function () {
			return {
				left:	parseInt(container.css("margin-left").replace("px", ""), 10) +
						parseInt(container.css("padding-left").replace("px", ""), 10),
				top:	parseInt(container.css("margin-top").replace("px", ""), 10) +
						parseInt(container.css("padding-top").replace("px", ""), 10)
			};
		};

		//! --- Private properties ---
		this._container = null;
		this._digit = 0;
		
		//! Set container's dimensions
		this._create();

		//! Set initial number
		if (!lib.isUndefined(initDigit) && lib.isNumber(initDigit)) {
			this.setDigit(initDigit);
		} else {
			this.setDigit(0);
		}
	}

	//! AbstractJsCounter : abstract class | logic
	function AbstractJsCounter (container, options) {

		//! --- Public methods ---
		//! Get current number | return: integer | float
		this.getNumber =  function () {
			return this._settings.number;
		};

		//! Start counter | return: undefined
		this.play = function (interval, step) {
			if (interval) {
				this._settings.interval = this._validate('interval', interval);
				this._settings.step = step || this._settings.step;
			}

			//! First, check if the image was loaded successfully
			if (this._loaded && this._settings.interval >= 1000) {
				this._start();
			}
		};

		//! Stop periodic counter | return: undefined
		this.stop = function () {
			if (this._timer) {
				window.clearInterval(this._timer);
				this._timer = null;
			}
		};

		//! --- Protected methods ---
		//! Check main prameters before counter initialization | return: undefined
		this._beforeInit = function () {
			//! Check number
			if ((lib.isString(this._settings.number) && this._settings.number.match(/\D/ig)) ||
				(!lib.isString(this._settings.number) && !lib.isNumber(this._settings.number))) {
				throw "Wrong intial number";
			}

			if (lib.isString(this._settings.number)) {
				this._settings.minLength = this._settings.number.toString().length;
				this._settings.number = parseInt(this._settings.number, 10);
			}

			//! Validation
			this._validate('minLength', this._settings.minLength);
			this._validate('interval', this._settings.interval);
			this._validate('duration', this._settings.duration);

			if (this._settings.fps < 1 || this._settings.fps > 100) {
				this._settings.fps = 25;
			}
		};

		//! Callback method called if the image was failed to load
		this._loadImage = function () {
			this._image.src = this._settings.image_numbers;
		};

		//! onChange event
		this._onChange = function (num) {
			if (this._settings.onChange) {
				this._settings.onChange(num);
			}
		};

		this._onError = function () {
			this._container.text("Image object has not managed to load properly");
		};

		//! Callback method called if the image was loaded successfully
		this._onLoad = function () {
			this._loaded = true;
			this._settings.digitHeight = this._image.height;
			this._settings.digitWidth = Math.round(this._image.width/10);

			//! Set container height
			this._container.css({
				height: this._settings.digitHeight+'px'
			});

			//! Initialize counter
			this._init();	//! Abstract method
		};

		//! Get plugin directory
		this._pluginPath = function () {
			var path = "";
			$(document).find('script').each(function (index, item) {
				if (item.src.match(/jscounter([\.min]{1,5})js/ig)) {
					path = item.src.replace(/jscounter([\.min]{1,5})js/ig, "");
				}
			});
			
			return path;
		};

		//! Start the counter timer
		this._start = function () {
			if (this._timer) {
				this.stop();
			}

			if (this._settings.interval >= 1000) {
				this._timer = window.setInterval(lib.bind(function () {
					//! Call abstract method
					this.setNumber(this._settings.number + this._settings.step);

					//! Send onChange event
					this._onChange(Math.round(this._settings.number));
				}, this), this._settings.interval);
			}
		};

		//! Validate parameters | return: value
		this._validate = function (type, value) {
			switch (type) {
				case 'duration':
					if (value < 100 || value > 1000) {
						throw "Wrong 'duration' parameter: Must be [100, 1000]";
					}
					break;

				case 'interval':
					if (value && value < 1000) {
						throw "Wrong step 'interval' parameter: Must be >= 1000 or 0";
					}
					break;

				case 'minLength':
					if (value < 1) {
						throw "Wrong 'minLength' parameter: Must be >= 1";
					}
					break;
			}

			return value;
		};

		//! --- Private properties ---
		//! Initializing params | private
		this._settings = $.extend({}, defaults, options);
		this._container = container;
		this._digits = [];
		this._loaded = false;
		this._timer = null;

		//! Check main object parameters
		this._beforeInit();

		//! Set absolute path if needed
		if (this._settings.image_numbers.indexOf("/") === -1) {
			this._settings.image_numbers = this._pluginPath() + this._settings.image_numbers;
		}

		//! Load image
		this._image = new Image();
		$(this._image).load(lib.bind(this._onLoad, this));
		$(this._image).error(lib.bind(this._onError, this));
	}

	//! JsCanvasCounter class - HTML5 canvas based counter | plugin logic
	function JsCanvasCounter (container, options) {
		
		//! --- Public methods ---
		//! Set number and run counter animation | return: undefined
		this.setNumber = function (num) {
			//! First, check if the image was loaded successfully
			if (this._loaded && !this._busy) {
				this._busy = true;
				this._queued = false;
				
				//! Complete rendering of previous scene if needed
				this._render(1);
				//! Set new number
				this._setNumber(Math.round(this._settings.number = num));
				//! Start render new scene
				this._startTime = (new Date()).getTime();
				Ticker.setPaused(false);
			} else {
				this._queued = num;
			}
		};

		//! --- Private methods --
		//! Create and initialize canvas
		this._init = function () {
			var canvas, i;

			this._container.append(canvas = $('<canvas />').
				attr('height', this._settings.digitHeight));

			this._stage = new Stage(canvas.get(0));
			this._sprite = new SpriteSheet(this._image,
				this._settings.digitWidth, this._settings.digitHeight/2);

			var bitmap;
			for (i = 0; i < 10; i++) {
				//! Top frames
				bitmap = new BitmapSequence(this._sprite);
				bitmap.x = 0;
				bitmap.y = 0;
				bitmap.gotoAndStop(i);
				this._bitmaps.top.push(bitmap);

				//! Bottom frames
				bitmap = new BitmapSequence(this._sprite);
				bitmap.x = 0;
				bitmap.y = this._settings.digitHeight/2;
				bitmap.gotoAndStop(i +10);
				this._bitmaps.bottom.push(bitmap);
			}

			//! Render first scene
			this._setNumber(this._settings.number);
			this._render(1);
			this._stage.tick();

			//! Set ticker
			Ticker.setInterval(Math.floor(1000/this._settings.fps));
			Ticker.addListener({tick: lib.bind(this._onTick, this)}, true);
			Ticker.setPaused(true);

			//! Start counter
			this._start();
		};

		//! Callback method called when animation is finished
		this._onFinished = function () {
			this._busy = false;

			if (this._settings.onFinished) {
				this._settings.onFinished();
			}

			if (this._queued !== false) {
				this.setNumber(this._queued);
			}
		};

		//! Callback method called on new animation tick
		this._onTick = function () {
			var progress = ((new Date()).getTime() - this._startTime)/this._settings.duration;

			if ((progress = Math.round(progress *= 100)/100) >= 1) {
				this._render(progress = 1);
				Ticker.setPaused(true);

				this._stage.tick();
				this._onFinished();
				return;
			}

			this._render(progress);
			this._stage.tick();
		};

		//! Render one scene
		this._render =  function (progress) {
			var i;
			for (i = 0; i < this._digits.length; i++) {
				this._digits[i].render(progress);
			}
		};

		//! Set inital number length or change the number length
		// num: integer
		this._setNumber = function (num) {
			//! We don't show negative numbers -> We take just an absolute value
			var i, len = (num =  Math.abs(num).toString()).length;

			for (i = 0; i < this._settings.minLength - len; i++) {
				num = '0' + num;
			}

			if (num.length !== this._digits.length) {
				for (i = this._digits.length; i < num.length; i++) {
					this._digits.push(new Digit(this._stage, this._bitmaps,
						{
							height:	this._settings.digitHeight,
							width:	this._settings.digitWidth,
							radius:	this._settings.borderRadius
						},
						{
							x: i*this._settings.digitWidth + i*this._settings.spaceWidth,
							y: 0
						},
						parseInt(num.charAt(i), 10))
					);
				}

				if (num.length < this._digits.length) {
					this._digits.splice(num.length, this._digits.length - num.length);
				}

				var width = this._settings.digitWidth*this._digits.length +
					this._settings.spaceWidth*(this._digits.length -1);

				this._container.css({width: width});
				this._container.find('canvas').each(function (index, canvas) {
					$(canvas).attr('width', width);
				});
			}

			//! Update number
			for (i = 0; i < num.length; i++) {
				this._digits[i].setDigit(parseInt(num.charAt(i), 10));
			}
		};

		//! --- Private properties ---
		//! Initializing params | private
		this._busy = false;
		this._queued = false;
		this._startTime = 0;

		//! Easel objects
		this._stage = null;
		this._sprite = null;
		this._bitmaps = {top: [], bottom: []};

		//! Initialize parent object
		AbstractJsCounter.call(this, container, options);

		//! Load image
		this._loadImage();
	}

	//! Javascript heritage
	JsCanvasCounter.prototype = new AbstractJsCounter();
	JsCanvasCounter.prototype.constructor = JsCanvasCounter;

	
	//! JsStaticCounter class - Simple static counter for IE | plugin logic
	function JsStaticCounter (container, options) {

		//! --- Public methods ---
		//! Set number and run counter animation | return: undefined
		this.setNumber = function (num) {
			//! First, check if the image was loaded successfully
			if (this._loaded) {
				//! Set new number
				this._setNumber(Math.round(this._settings.number = num));
			}
		};

		//! --- Private properties ---
		//! Initializing params | private
		this._init = function () {
			//! Set inital number
			this._setNumber(this._settings.number);

			//! Start counter
			this._start();
		};

		//! Set inital number length or change the number length
		// num: integer
		this._setNumber = function (num) {
			//! We don't show negative numbers -> We take just an absolute value
			var i, len = (num =  Math.abs(num).toString()).length;

			for (i = 0; i < this._settings.minLength - len; i++) {
				num = '0' + num;
			}

			if (num.length !== this._digits.length) {
				for (i = this._digits.length; i < num.length; i++) {
					this._digits.push(new StaticDigit(this._container,
						this._settings.image_numbers,
						{
							height:	this._settings.digitHeight,
							width:	this._settings.digitWidth
						},
						{
							x: i*this._settings.digitWidth + i*this._settings.spaceWidth,
							y: 0
						},
						parseInt(num.charAt(i), 10))
					);
				}

				if (num.length < this._digits.length) {
					for (i = this._digits.length -1; i >= num.length; i--) {
						this._digits[i].remove();
						this._digits.splice(i, 1);
					}
				}

				var width = this._settings.digitWidth*this._digits.length +
					this._settings.spaceWidth*(this._digits.length -1);

				this._container.css({width: width});
			}

			//! Update number
			for (i = 0; i < num.length; i++) {
				this._digits[i].setDigit(parseInt(num.charAt(i), 10));
			}
		};

		//! Initialize parent object
		AbstractJsCounter.call(this, container, options);

		//! Load image
		this._loadImage();
	}

	//! Javascript heritage
	JsStaticCounter.prototype = new AbstractJsCounter();
	JsStaticCounter.prototype.constructor = JsStaticCounter;


	//! Main error string
	var errNoObject = 'jsCounter object doesn\'t exist';
	
	//! Plugin generic public interface
	var methods = {
		//! Create counter object
		create: function (options) {
			return this.each(function () {
				if (!$.data(this, defaults.name)) {
					//! Initialize plugin
					$.data(this, defaults.name,
						(lib.supportsCanvas() ?
							new JsCanvasCounter($(this), options) :
							new JsStaticCounter($(this), options)));
					return;
				}

				$.error('jsCounter object is already initialized');
			});
		},

		//! Destroy counter object
		destroy: function () {
			return this.each(function () {
				if ($.data(this, defaults.name)) {
					//! Destroy plugin
					$.removeData(this, defaults.name);
					return;
				}

				$.error(errNoObject);
			});
		},

		//! Set/Get number | return: number
		number: function (num) {
			var numbers = [];
			
			this.each(function () {
				var counter = $.data(this, defaults.name);
				if (counter) {
					if (lib.isUndefined(num)) {
						numbers.push(counter.getNumber());
					} else {
						numbers.push(num);
						counter.setNumber(num);
					}
					return;
				}

				$.error(errNoObject);
			});

			if (numbers.length === 1) {
				return numbers[0];
			}

			return numbers;
		},

		//! Start automatic counter
		play: function (interval, step) {
			return this.each(function () {
				var counter = $.data(this, defaults.name);
				if (counter) {
					counter.play(interval, step);
					return;
				}

				$.error(errNoObject);
			});
		},

		//! Stop counter
		stop: function () {
			return this.each(function () {
				var counter = $.data(this, defaults.name);
				if (counter) {
					counter.stop();
					return;
				}

				$.error(errNoObject);
			});
		}
	};

	//! --- Main plugin entry point --
	$.fn.jsCounter = function (method) {

		//! Main plugin interface calling logic
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if ($.isPlainObject(method)) {
			return methods.create.apply(this, arguments);
		} else {
			$.error('Method ' +  method + ' does not exist on jQuery.jsCounter');
		}

		return this;
	};

})(jQuery);