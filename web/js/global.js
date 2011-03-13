jQuery.noConflict();
jQuery(document).ready(function () {
	//jQuery("#landscape").fadeOut(4000);
	var height = jQuery("#menu li a:first").height();
	var visible = false;

	jQuery("#menu ul").each(function () {
		jQuery(this).height(jQuery(this).find("li").length*height);
	});

	jQuery("#menu > li span").parent().click(function () {
		if (visible) {
			visible.slideUp("normal");
			visible.prev("span").find("span").html("&#x21E9");
			visible = false;
		}
		
		if (jQuery(this).find("ul").is(":hidden")) {
			(visible = jQuery(this).find("ul")).slideDown("normal");
			jQuery(this).find("span > span").html("&#x21E7");
		} else {
			jQuery(this).find("ul").slideUp("normal");
			jQuery(this).find("span > span").html("&#x21E9");
		}
	});
	
	var closed = false;
	jQuery("#login-bar-button").hover(function () {
		if (jQuery("#login").is(":hidden") && !closed) {
			jQuery("#login-bar-button").addClass("login-open");
			jQuery("#login").slideDown("normal");
		} else {
			closed = false;
		}
	});
	
	jQuery("#login-bar-button").click(function () {
		if ((closed = jQuery("#login").is(":visible"))) {
			jQuery("#login-bar-button").removeClass("login-open");
			jQuery("#login").slideUp("normal");
		} else {
			jQuery("#login-bar-button").addClass("login-open");
			jQuery("#login").slideDown("normal");
		}
	});
	
	jQuery("#x-button").click(function () {
		if (jQuery("#login").is(":visible")) {
			closed = false;
			jQuery("#login-bar-button").removeClass("login-open");
			jQuery("#login").slideUp("normal");
		} else {
			jQuery("#login-bar-button").addClass("login-open");
			jQuery("#login").slideDown("normal");
		}
	});
});

Event.observe(window, "load", function (evt) {
	var slider = new ProtoSlider("pSlider", {
		navigation:		false,
		effect:			"corner:o:a:od",
		duration:		1500,
		columns:		10,
		rows:			6,
		seat:			0.15,
		speedup:		1
	});
});