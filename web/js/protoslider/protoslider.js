/********************************************************************************
 *	ProtoSlider.js - prototype.js based plugin
 *	@version: 1.0 alhpa 5
 *	@requires: prototype.js v1.6.1 or later
 *	@author: Alexandre Anoutchine
 *
 *	Examples and documentation at: http://www.protoslider.com
 *	Prototype.js at : http://www.prototypejs.org/download
 *
 *	Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
 ********************************************************************************/
//"use strict";
//var alert, Class, $A, $, Ajax, Hash, Element, document, window, setInterval, clearInterval, setTimeout, clearTimeout, Event;

/*	settings:		default	possible		description
 *		navigation:	[false]	(false, true)	Left, right navigation buttons
 *		navOpacity:	[0.7]	(0 - 1)			Nav. button's opacity
 *		navId:		[]						Extended navigation container id
 *
 *		fps:		[25]	(1 - 30)		Frames per second
 *		duration:	[2000]	(100 - 10000)	Animation time
 *		interval:	[5000]	(1 - 1000000)	Interval between slides
 *		hoverPause: [true]	(true, false)	Pause on mouse hover
 *
 *		effect		[]		(straight, corner, random)	Effect
 *		columns:	[]		(1 - 100)		Number of columns	( columns*rows must be between 1 - 300 )
 *		rows:		[]		(1 - 100)		Number of rows		( columns*rows must be between 1 - 300 )
 *		seat:		[0.25]	(0.0 - 1.0)		Single element animation time in % of total "duration"
 *		speedup:	[2]		(1 - 10)		Speedup the animation
 *
 *		onChange(n):						On change event
 *		onFinished(n):						On animation finished
 */

var ProtoSlider = Class.create({
	// Public methods 
	initialize: function(id, settings) {
		settings = settings || {};

		if (!id || !$(id)) {
			throw "No protoSlider container found!";
		}

		// Internal data
		this._ns_slider = {
			container:	$(id),
			nav:	{
				ext:[],			// Extended navigation
				lr:	[]			// Simple (left, right) navigation
			},
			dim:		this._dimensions($(id)),
			path:		this._path(),
			ptimer:		null,	// Periodical timer
			resize:		false,	// New size flag
			slide:		0,		// Current slide number
			slides:		[],		// Data
			timer:		null,	// Animation timer
			task:		{slide: -1, type: 1, effect: null, speedup: false},
			work:		[],		// Animation queue
			working:	false
		};

		// ProtoSlider Settings
		Object.extend(this._ns_slider, {
			settings: {
				// General
				navigation:	settings.navigation || false,
				navId:		settings.navId		|| null,
				navOpacity:	settings.navOpacity || 0.7,
				onChange:	settings.onChange	|| null,
				onFinished:	settings.onFinished	|| null,

				// Animation
				fps:		this._check(settings.fps, 1, 30, 25),
				duration:	this._check(settings.duration, 100, 10000, 2000),
				interval:	this._check(settings.interval, 100, 1000000, 5000),
				hoverPause:	settings.hoverPause	|| true,
				
				// Main slide animation
				effect:		settings.effect		|| null,
				columns:	this._check(settings.columns, 1, 100, 0),
				rows:		this._check(settings.rows, 1, 100, 0),
				seat:		this._check(settings.seat, 0, 1, 0.25),
				speedup:	this._check(settings.speedup, 1, 10, 2)
				// Title animation
			}
		});

		// Validate params
		this._validate();
		
		// Initialization
		this._ns_slider.container.setStyle({
			height: this._ns_slider.dim.height+'px',
			width:	this._ns_slider.dim.width+'px'
		});
		
		this._ns_slider.container.observe('mouseover', this._onMouseOver.bindAsEventListener(this));
		this._ns_slider.container.observe('mouseout', this._onMouseOut.bindAsEventListener(this));
		
		this._init();
		this._create();
		this._createNavigation();	// Create navigation
		this.play();
	},

	cancel: function() {
		var ropt;
		for (var i=0; i<this._ns_slider.work.length; i++) {
			if (this._ns_slider.work[i].type == 1 && (ropt = this._ns_slider.work[i])) {
				this._ns_slider.work.splice(i, 1);
				this._ns_slider.slides[this._ns_slider.slide].meta.remove();
				this._ns_slider.slides[this._ns_slider.slide].meta.reset();
				
				this._onChange(ropt.prev, this._ns_slider.slide);
				this._ns_slider.slide = ropt.prev;
			}
		}
	},

	count: function() {
		return this._ns_slider.slides.length;
	},

	current: function() {
		return this._ns_slider.slide;
	},

	next: function(evt) {
		if (evt) {Event.stop(evt);}
		this.show(this.current()+1);
	},

	pause: function(cancel) {
		if (this._ns_slider.ptimer) {
			clearTimeout(this._ns_slider.ptimer);
			this._ns_slider.ptimer = (cancel? true : null);
		}
	},

	play: function(interval) {
		if (interval) {
			this._ns_slider.settings.interval = interval;
		}

		if (this._ns_slider.settings.interval) {
			if (this._ns_slider.ptimer) {
				this.pause();
			}
			
			this._ns_slider.ptimer = setTimeout(this.next.bind(this),
				this._ns_slider.settings.interval);
		}
	},

	prev: function(evt) {
		if (evt) {Event.stop(evt);}
		this.show(this.current() ? this.current()-1: this.count()-1);
	},

	resize: function(columns, rows) {
		this._free();
		// New size
		this._ns_slider.settings.columns = this._check(columns, 1, 100, 0);
		this._ns_slider.settings.rows = this._check(rows, 1, 100, 0);

		// Validate params and resize
		this._validate();
		this._ns_slider.resize = true;
	},

	show: function(n, effect) {
		n = Math.abs(n? n : 0) % this._ns_slider.slides.length;
		if (!this._ns_slider.slides.length || this._ns_slider.slide == n) {
			return false;
		}

		if (this._ns_slider.settings.interval && this._ns_slider.ptimer) {
			this.pause(true);
		}

		if (!(effect && this._match(effect, this._effects))) {
			if (this._ns_slider.settings.effect) {
				effect = this._ns_slider.settings.effect;
			} else {effect = this._random();}
		}

		if (!this._ns_slider.working) {
			this._ns_slider.working = true;
			this._addWork({type: 1, slide: n, effect: effect, speedup: false});
		} else {
			this.cancel();
			this._addWork({type: 1, slide: n, effect: effect, speedup: true});
		}
		return true;
	},

	// Speed up current animation
	speedup: function(factor) {
		var ropt, progress;
		factor = (factor>=1 ? factor : 1);
		
		for (var i=0; i<this._ns_slider.work.length; i++) {
			if (this._ns_slider.work[i].type == 1 &&
				(ropt = this._ns_slider.work[i]) && !ropt.speedup) {
				ropt.speedup = true;
				progress = ((new Date()).getTime()-ropt.timestamp)/ropt.duration;
				ropt.duration = Math.round(ropt.duration/factor);
				this._initEngineOpt(ropt, progress);
				break;
			}
		}
	},

	// Private methods: Theses methods must not be called directly
	_effects:	['straight', 'corner', 'random', 'swirl', 'grid', 'strokes1', 'strokes2'],
	_eff_engine:['alpha'],
	_eff_inv:	':inv',
	_eff_od:	':od',
	_eff_sense:	[':a', ':b'],
	_eff_trans:	[':o', ':ow', ':oh', ':owh'],

	/*	work = {
	 *		type:	 1,	// animation object: 1 - slide content, 2 -title
	 *		slide:	 n,
	 *		effect:	 effect,
	 *		speedup: false
	 *	}
	 */
	_addWork: function(work) {
		var ropt = {
			coeff_a:	[0, 0],		// Engine parameter
			coeff_b:	[0, 0],		// Engine parameter
			coeff_f:	[0, 0],		// Engine parameter
			duration:	0,			// Animation time
			fpa:		0,			// Frames per animation
			fpse:		0,			// Frames per single element
			opacity:	[1, 0, 0],	// First: Element max opacity. 2 - 3 Internal
			pattern:	null,		// Animation pattern
			prev:		0,			// Previous slide
			render:		null,		// Render engin
			transition:	null,		// Singla element transition
			timestamp:	0,			// Start time
			delta:		0,			// Time passed from the start
			speedup:	0,			// Speedup flag
			type:		work.type	// object animation type: slide, title, etc ...
		};

		if (work.speedup) {
			if (this._ns_slider.settings.speedup) {
				work.speedup = this._ns_slider.settings.speedup;
				ropt.speedup = true;
			}
		} else {work.speedup = 1;}

		if (this._ns_slider.resize) {
			this._create();
		}
		
		switch (work.type) {
			case 1:	// 1 - slide content (Main slider content)
				ropt.pattern = this._pattern(work.slide, work.effect);
				ropt.duration = this._ns_slider.settings.duration/work.speedup;
				ropt.prev = this._ns_slider.slide;
				ropt.render = this['_rend_engine_'+this._eff_engine[0]];
				
				if (work.effect.include(this._eff_od)) {
					ropt.opacity[1] = ropt.opacity[0]/2;
					ropt.opacity[2] = ropt.opacity[0]/2;
				} else {
					ropt.opacity[1] = ropt.opacity[0];
				}
				
				this._ns_slider.slides[work.slide].meta.style({opacity: 0, visibility: 'hidden'});	// for IE
				this._ns_slider.slides[work.slide].meta.insert(this._ns_slider.container);
				this._ns_slider.slides[work.slide].meta.style({visibility: 'visible'});				// for IE
				break;
			case 2:break;
			case 3:break;
		}

		switch (this._match(work.effect, this._eff_trans)) {
			case 'ow':ropt.transition = this._rend_trans_ow;break;
			case 'oh':ropt.transition = this._rend_trans_oh;break;
			case 'owh':ropt.transition = this._rend_trans_owh;break;
			default: case 'o':ropt.transition = this._rend_trans_o;break;
		}

		// Start animation
		this._ns_slider.slide = work.slide;
		this._initEngineOpt(ropt, 0, 1);
		this._ns_slider.work.push(ropt);
		this._onChange(work.slide, ropt.prev);
		this._start();
	},

	_check: function(value, min, max, def_value) {
		return (value !== undefined && value >= min && value <= max? value : def_value);
	},

	_create: function() {
		var elm_h = Math.round(this._ns_slider.dim.height/this._ns_slider.settings.rows);
		var elm_w = Math.round(this._ns_slider.dim.width/this._ns_slider.settings.columns);
		var last_h = this._ns_slider.dim.height-(this._ns_slider.settings.rows-1)*elm_h;
		var last_w = this._ns_slider.dim.width-(this._ns_slider.settings.columns-1)*elm_w;
		this._ns_slider.resize = false;

		for (var k=0; k<this._ns_slider.slides.length; k++) {
			var slide = this._ns_slider.slides[k];

			for (var i=0; i<this._ns_slider.settings.rows; i++) {
				for (var j=0; j<this._ns_slider.settings.columns; j++) {
					var elm = new Element(slide.meta.type == 1 ? 'a' : 'div', {'class': 'element'});

					elm.dim = {		// position and dimensions
						alpha:	0,
						height:	(i === 0 ? last_h : elm_h),
						width:	((this._ns_slider.settings.columns-1) === j ? last_w : elm_w),
						x:		j*elm_w,
						y:		(this._ns_slider.dim.height-last_h)-(i*elm_h),
						x1:		0,
						y1:		0
					};

					if (slide.meta.type == 1) {
						// Image particularities
						if (slide.meta.link.length && slide.meta.link.indexOf('#') === -1) {
							elm.setAttribute('href', slide.meta.link);
							elm.setAttribute('target', '_parent');
						}

						elm.setStyle({
							backgroundImage: 'url('+slide.meta.url+')',
							backgroundPosition: (-elm.dim.x)+'px '+(-elm.dim.y)+'px'
						});
					} else {
						// DIV particularities
						(new Element('div', {
							'class': slide.meta.source.classNames().toString()
						})).wrap(elm);

						elm.down('div').setStyle({
							left:(-elm.dim.x)+'px',
							top: (-elm.dim.y)+'px'
						});

						elm.down('div').innerHTML = slide.meta.source.innerHTML;
					}
					// Common properties
					elm.setStyle({
						opacity:	0,
						left:		elm.dim.x+'px',
						top:		elm.dim.y+'px',
						height:		elm.dim.height+'px',
						width:		elm.dim.width+'px'
					});

					slide.push(elm);
				}
			}
		}
	},

	_createNavigation: function() {
		var dim, i;
		
		if (this._ns_slider.settings.navigation) {
			for (i=0; i<2; i++) {
				this._ns_slider.nav.lr[i] = new Element('a', {'class': 'nav-lr'});

				this._ns_slider.nav.lr[i].setAttribute('href', '#');
				this._ns_slider.nav.lr[i].update(i === 0 ? 'prev' : 'next');
				this._ns_slider.container.insert(this._ns_slider.nav.lr[i]);

				dim = this._ns_slider.nav.lr[i].getDimensions();
				this._ns_slider.nav.lr[i].setStyle({
					borderLeft:	(i === 0 ? 'none' : ''),
					borderRight:(i === 1 ? 'none' : ''),
					opacity:	this._ns_slider.settings.navOpacity,
					left:		(i === 0 ? 0 : this._ns_slider.dim.width-dim.width+'px'),
					top:		Math.round((this._ns_slider.dim.height-dim.height)/2)+'px',
					visibility:	'visible'
				});

				this._ns_slider.nav.lr[i].observe('click',
					(i === 0 ? this.prev.bindAsEventListener(this) :
					this.next.bindAsEventListener(this)));
			}
		}

		if (this._ns_slider.settings.navId) {
			$(this._ns_slider.settings.navId).addClassName('protoSliderNav');

			for (i=0; i<this._ns_slider.slides.length; i++) {
				this._ns_slider.nav.ext[i] = new Element('span');
				this._ns_slider.nav.ext[i].writeAttribute('ind', i);
				$(this._ns_slider.settings.navId).insert(this._ns_slider.nav.ext[i]);

				this._ns_slider.nav.ext[i].observe('click', this._onClick.bind(this));
			}

			this._ns_slider.nav.ext[this._ns_slider.slide].addClassName('current');
		}
	},
	
	_init: function() {
		var img, slide;

		$(this._ns_slider.container).childElements().each((function(item, index) {
			if (!['a', 'div'].include(item.nodeName.toLowerCase())) {return;}
			else {
				slide = [];
				slide.meta = {
					source:		item,
					insert:		this._s_insert.bind(slide),
					remove:		this._s_remove.bind(slide),
					reset:		this._s_reset.bind(slide),
					style:		this._s_style.bind(slide),
					visibility:	this._s_visibility.bind(slide)
				};
			}

			if (item.nodeName.toLowerCase().match(/(a)|(div)/ig)[0] === 'a') {
				item.setStyle({
					height: this._ns_slider.dim.height+'px',
					width:	this._ns_slider.dim.width+'px'
				});
				
				if (!(img = item.down('img'))) {return;}
				// Image
				slide.meta.type = 1;		// Image
				slide.meta.link = item.href;
				slide.meta.text = img.next('span')? img.next('span').innerHTML : null;
				slide.meta.url = img.src;
				
				if (slide.meta.link.length && slide.meta.link.indexOf('#') !== -1) {
					item.setStyle({cursor: 'default'});
				}
			} else {
				// DIV content
				slide.meta.type = 2;		// DIV
				slide.meta.link = null;
				slide.meta.text = null;
				slide.meta.url = null;
			}

			this._ns_slider.slides.push(slide);
		}).bind(this));
	},

	_dimensions: function(container) {
		var slide;
		if ((slide=container.childElements()[0])) {
			return slide.getDimensions();
		}
		return {height: 0, width: 0};
	},

	_free: function() {
		for (var i=0; i<this._ns_slider.slides.length; i++) {
			for (var j=0; j<this._ns_slider.slides[i].length; j++) {
				delete this._ns_slider.slides[i][j];
			}

			this._ns_slider.slides[i].length = 0;
		}

		this._ns_slider.settings.columns = 0;
		this._ns_slider.settings.rows = 0;
	},

	_initEngineOpt: function(ropt, progress) {
		ropt.fpa = Math.round(ropt.duration*this._ns_slider.settings.fps/1000);
		ropt.fpse = Math.round(ropt.duration*this._ns_slider.settings.seat*
			this._ns_slider.settings.fps/1000);
		ropt.fpse = (!ropt.fpse ? 0.01 : ropt.fpse);

		for (var i=0; i<2; i++) {
			ropt.coeff_a[i] = ropt.opacity[i+1]/ropt.fpse;
			ropt.coeff_b[i] = ropt.coeff_a[i]*(ropt.fpa-ropt.fpse)/ropt.pattern.length;
		}

		ropt.delta = Math.round(progress*ropt.duration);
		ropt.timestamp = (new Date()).getTime()-ropt.delta;
		
		ropt.coeff_f[0] = this._ns_slider.settings.fps/1000;
		ropt.coeff_f[1] = ropt.coeff_f[0]*ropt.timestamp;
	},

	_match: function(str, set) {
		var pattern = '('+(set instanceof Array? set.join(':|'): set)+':){1}';
		var re = (new RegExp(pattern)).exec(str+':');

		if (re) {return re[0].replace(/:/ig, '');}
		return false;
	},

	_onChange: function(n, prev) {
		if (this._ns_slider.settings.navId && n !== prev) {
			this._ns_slider.nav.ext[n].addClassName('current');
			this._ns_slider.nav.ext[prev].removeClassName('current');
		}
		
		if (this._ns_slider.settings.onChange) {
			this._ns_slider.settings.onChange(n);
		}
	},

	_onClick: function(evt) {
		Event.stop(evt);
		this.show(evt.element().readAttribute('ind'));
	},
	
	_onFinished: function(n) {
		if (this._ns_slider.settings.onFinished) {
			this._ns_slider.settings.onFinished(n);
		}

		if (this._ns_slider.settings.interval && this._ns_slider.ptimer) {
			this.play();
		}
	},

	_onMouseOver: function(evt) {
		if (this._ns_slider.settings.interval &&
			this._ns_slider.settings.hoverPause) {
			this.pause();
		}
	},

	_onMouseOut: function(evt) {
		if (this._ns_slider.settings.interval &&
			this._ns_slider.settings.hoverPause) {
			this.play();
		}
	},
	
	_path: function() {
		var path;
		Element.select(document, "script").each(function(val) {
			if (val.src.match(/(protoslider\.js)/ig)) {
				path = val.src.replace(/(protoslider\.js)/ig, "");
			}
		});
		return path;
	},

	_pattern: function(slide, effect) {
		var sense = (this._match(effect, this._eff_sense) === 'b' ? 1 : 0);
		var source = this._ns_slider.slides[slide];
		var pattern1 = [], pattern2 = [];
		var index1 = 0, index2 = 0;
		var x = 0, y = 0, i, j;
		var len = source.length;
		var columns = this._ns_slider.settings.columns;
		var rows = this._ns_slider.settings.rows;

		var add1 = function(i) {pattern1[index1++] = source[i];};
		var addxy1 = function(x, y) {pattern1[index1++] = source[x+y*columns];};
		var addxy2 = function(x, y) {pattern2[index2++] = source[x+y*columns];};
		
		switch (effect.indexOf(':')>0 ? effect.substr(0, effect.indexOf(':')) : effect) {
			case 'straight':
				for (i=0; i<columns && !sense; i++) {
					for (j=0; j<rows; j++) {addxy1(i, j);}
				}

				for (j=rows-1; j>=0 && sense; j--) {
					for (i=0; i<columns; i++) {addxy1(i, j);}
				}
				break;

			case 'corner':
				y = (rows-1)*(1-sense);
				while (columns && !(x == columns && y == (rows-1)*sense)) {
					for (i=x, j=y ; i<columns && sense*j>=0 && (1-sense)*j<rows;
						i++, (sense? j-- : j++)) {addxy1(i, j);}

					if (sense*y<rows-1 && (1-sense)*y>(0-sense)) {
						if (sense) {y++;} else {y--;}
					} else {if (x<columns) {x++;}}
				}
				break;

			case 'random':
				var temp;
				for (i=0; i<len; i++) {
					add1(i);
					x = Math.round(Math.random()*i);
					temp = pattern1[x];
					pattern1[x] = pattern1[i];
					pattern1[i] = temp;
				}
				break;

			case 'swirl':
				var x1 = 0, y1 = 0;
				var x2 = columns-1, y2 = rows -1;
				while (x1 <= x2 && y1 <= y2) {
					for (i=x1; i<=x2; i++) {addxy1(i, y1);}y1++;
					for (i=y1; i<=y2; i++) {addxy1(x2, i);}x2--;
					if (y1<=y2) {for (i=x2; i>=x1; i--) {addxy1(i, y2);}}y2--;
					if (x1<=x2) {for (i=y2; i>=y1; i--) {addxy1(x1, i);}}x1++;
				}
				break;

			case 'grid':
					for (i=0; i<columns; i++) {
						for (j=rows-1; j>=0; j--) {
							if ((i+j)%2) {addxy1(i ,j);}
							else {addxy2(i ,j);}
						}
					}
					pattern1 = pattern1.concat(pattern2);
				break;

			case 'strokes1':
				for (i=0; i<columns && !sense; i++) {
					for (j=0; j<rows; j++) {
						addxy1(j%2 ? columns-i-1 : i ,j%2 ? rows-j-rows%2 : j);
					}
				}
				
				for (j=0; j<rows && sense; j++) {
					for (i=0; i<columns; i++) {
						addxy1(i%2 ? columns-i-columns%2 : i ,i%2 ? rows-j-1 : j);
					}
				}
				break;

			case 'strokes2':
				for (i=0; i<columns && !sense; i++) {
					for (j=rows-1; j>=0; j--) {
						addxy1(i%2 ? columns-i-columns%2 : i ,i%2 ? rows-j-1 : j);
					}
				}

				for (j=0; j<rows && sense; j++) {
					for (i=columns-1; i>=0; i--) {
						addxy1(j%2 ? columns-i-1 : i ,j%2 ? rows-j-rows%2 : j);
					}
				}
				break;

			case '':alert("oups !!!");
				break;
		}
		
		return (effect.include(this._eff_inv) ? pattern1.reverse() : pattern1);
	},

	_random: function() {
		return this._effects[Math.round(Math.random()*(this._effects.length-1))]+
			this._eff_trans[Math.round(Math.random()*(this._eff_trans.length-1))]+
			this._eff_sense[Math.round(Math.random()*(this._eff_sense.length-1))]+
			(Math.round(Math.random())? this._eff_inv : '')+
			(Math.round(Math.random())? this._eff_od : '');
	},

	_render: function() {
		for (var i=0; i<this._ns_slider.work.length; i++) {
			var ropt = this._ns_slider.work[i];
			var frame = Math.round((new Date()).getTime()*ropt.coeff_f[0]-ropt.coeff_f[1]);

			if (frame >= ropt.fpa) {
				ropt.render(frame = ropt.fpa);
				
				this._ns_slider.slides[ropt.prev].meta.visibility(false);
				this._ns_slider.slides[this._ns_slider.slide].meta.visibility(true);
				this._ns_slider.slides[this._ns_slider.slide].meta.remove();
				
				this._ns_slider.work.splice(i--, 1);
				this._onFinished(this._ns_slider.slide);
			} else {ropt.render(frame);}
		}

		if (!this._ns_slider.work.length) {
			if (this._ns_slider.task.slide != -1) {
				this._addWork(this._ns_slider.task);
				this._ns_slider.task.slide = -1;
			} else {
				this._ns_slider.working = false;
				this._stop();
			}
		}
/*
		var time;	/////////////////////////////////////////////////////// temp
		if (ropt) {
			time = (new Date()).getTime()-ropt.timestamp;
			frame = (frame < 10? "00"+frame : frame < 100? "0"+frame : frame);
			$('info').update("frame: "+frame);
		}
		/////////////////////////////////////////////////////////////////// temp
		*/
	},
	
	_rend_engine_alpha: function(frame) {
		var alpha1, alpha2;
		for (var i=0; i<this.pattern.length; i++) {
			alpha1 = this.coeff_a[0]*frame-this.coeff_b[0]*(i+1);
			alpha2 = this.coeff_a[1]*frame-this.coeff_b[1]*(this.pattern.length-i);
			alpha1 = (alpha1 < 0 ? 0 : (alpha1 > this.opacity[1] ? this.opacity[1] : alpha1))+
				(alpha2 < 0 ? 0 : (alpha2 > this.opacity[2] ? this.opacity[2] : alpha2));

			if (this.pattern[i].dim.alpha !== alpha1) {
				this.pattern[i].dim.alpha = alpha1;
				this.transition(this.pattern[i], alpha1);
			}
		}
	},

	_rend_trans_o: function(elm, alpha) {
		elm.setStyle({opacity: alpha});
	},

	_rend_trans_h: function(elm, alpha) {
		elm.setStyle({
			opacity: 1,
			height: Math.round((alpha)*elm.dim.height)+'px'
		});
	},

	_rend_trans_w: function(elm, alpha) {
		elm.setStyle({
			opacity: 1,
			width: Math.round((alpha)*elm.dim.width)+'px'
		});
	},
	
	_rend_trans_oh: function(elm, alpha) {
		elm.setStyle({
			opacity: alpha,
			height: Math.round((alpha)*elm.dim.height)+'px'
		});
	},

	_rend_trans_ow: function(elm, alpha) {
		elm.setStyle({
			opacity: alpha,
			width: Math.round((alpha)*elm.dim.width)+'px'
		});
	},

	_rend_trans_owh: function(elm, alpha) {
		elm.setStyle({
			opacity: alpha,
			height: Math.round((alpha)*elm.dim.height)+'px',
			width: Math.round((alpha)*elm.dim.width)+'px'
		});
	},
	
	_s_insert: function(container) {
		for (var i=0; i<this.length; i++) {
			container.insert(this[i]);
		}
	},

	_s_remove: function() {
		for (var i=0; i<this.length; i++) {
			this[i].remove();
		}
	},

	_s_reset: function() {
		for (var i=0; i<this.length; i++) {
			this[i].setStyle({
				opacity:0,
				left:	this[i].dim.x+'px',
				top:	this[i].dim.y+'px',
				height:	this[i].dim.height+'px',
				width:	this[i].dim.width+'px'
			});
		}
	},

	_s_style: function(style) {
		for (var i=0; i<this.length; i++) {
			this[i].setStyle(style);
		}
	},

	_s_visibility: function(visible) {
		this.meta.source.setStyle({visibility: visible? 'visible' : 'hidden'});
	},

	_start: function() {
		if (!this._ns_slider.timer) {
			for (var i=0; i<this._ns_slider.work.length; i++) {
				if (!this._ns_slider.work[i].delta) {
					this._ns_slider.work[i].timestamp = (new Date()).getTime();
				} else {
					this._ns_slider.work[i].timestamp =
						(new Date()).getTime() - this._ns_slider.work[i].delta;
				}
				
				this._ns_slider.work[i].coeff_f[1] =
					this._ns_slider.work[i].coeff_f[0]*this._ns_slider.work[i].timestamp;
			}

			if (this._ns_slider.work.length) {
				this._ns_slider.timer = setInterval(this._render.bind(this),
					Math.round(1000/this._ns_slider.settings.fps));
			}
		}
	},

	_stop: function() {
		if (this._ns_slider.timer) {
			var timestamp = (new Date()).getTime();

			clearInterval(this._ns_slider.timer);
			this._ns_slider.timer = null;

			for (var i=0; i<this._ns_slider.work.length; i++) {
				this._ns_slider.work[i].delta = timestamp-this._ns_slider.work[i].timestamp-
					1000/this._ns_slider.settings.fps;
			}
		}
	},

	_validate: function() {
		if (!this._ns_slider.settings.columns || !this._ns_slider.settings.rows) {
			throw "protoSlider: Wrong value for \"columns or rows\"";
		}

		if (this._ns_slider.settings.columns*this._ns_slider.settings.rows > 300) {
			throw "protoSlider: \"columns * rows\" must be less than 300";
		}

		if (this._ns_slider.settings.effect &&
			!this._match(this._ns_slider.settings.effect, this._effects)) {
			throw "protoSlider: Unknown effect name";
		}
	}
});

// ProtoSlider version
ProtoSlider.version = "1.0a5";
