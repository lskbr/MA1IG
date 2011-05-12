/********************************************************************************
 *	Graine de Vie | www.grainedevie.org
 *
 *	UMons 2011.
 ********************************************************************************/
jQuery.noConflict();
var content = null, gcontent = null, search, slider;

function new_page(url,id,largeur,hauteur) {
	var popup = window.open(url,id,'toolbar=0,location=0,directories=0,status=yes,menubar=0,scrollbars=yes,resizable=yes,width='+largeur+',height='+hauteur+',left=50,top=50');
	return false;
}

jQuery(document).ready(function () {
        //!
        //! Selecteur de langue
        //!
        jQuery("#lang_submit").empty();
        
        jQuery("#language").change(function() {
            jQuery("#lang_selector").submit();
        });

	//!
	//! Menu
	//!
/*
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
*/
    
    jQuery("#menu ul").not(jQuery("#menu ul.selected")).hide();
    jQuery("#menu a.accueil, #menu div.backcolor").css('paddingLeft','26px');
    jQuery("#menu a.backcolor").css('paddingLeft','26px');
    jQuery("#menu div.categorie").css({backgroundImage:"url(/images/left.png)"});
	jQuery("#menu div.cat_selected").css({backgroundImage:"url(/images/down.png)"});
	
    jQuery("#menu div.categorie").click(function()
    {
        jQuery(this).css({backgroundImage:"url(/images/down.png)"});
        jQuery("#menu div.categorie").not(jQuery(this)).css({backgroundImage:"url(/images/left.png)"});
        jQuery("#menu ul").not(jQuery(this).next("ul")).slideUp();
        jQuery(this).next("ul").slideDown(500);
    });

    //!
    //! Login
    //!
    var closed = false;

    //jQuery("#login-bar-button").attr("href", "#");
	
    jQuery("#login-bar-button").click(function () {
            if ((closed = jQuery("#login").is(":visible"))) {
                    jQuery("#login-bar-button").removeClass("login-open");
                    if (jQuery("#login").slideUp("normal")) {
						return false;
					}
            }
            else {
                    jQuery("#login-bar-button").addClass("login-open");
                    if (jQuery("#login").slideDown("normal")) {
						return false;
					}
            }
    });

    jQuery("#x-button").click(function () {
            if (jQuery("#login").is(":visible")) {
                    closed = false;
                    jQuery("#login-bar-button").removeClass("login-open");
                    jQuery("#login").slideUp("normal");
            }
            else {
                    jQuery("#login-bar-button").addClass("login-open");
                    jQuery("#login").slideDown("normal");
            }
			return false;
    });

	//! Search
	jQuery("#search").click(function () {
		if (content) {
			gcontent = jQuery("#content").replaceWith(content);
			content = null;

                        // changement de couleur
                        jQuery("#search_text").removeAttr("style");
		} else {
			if (gcontent) {
				content = jQuery("#content").replaceWith(gcontent);
			} else {
				content = jQuery("#content").replaceWith("<div id='content' />");
				search.draw('content');
			}

                        // changement de couleur
                        jQuery("#search_text").attr("style", "color: #ffed23;");
		}
                
                return false;
	});

	//!
	//! Counter initialization
	//!
	var delay = jQuery("#counter-delay").get(0).value - (new Date()).getTime(),
		interval = jQuery("#counter-interval").get(0).value,
		delayMouseOver = 300, mask = 0, step = 1;

	if (interval < 1000) {
		step = 1000/interval;
		interval = 1000;
	}

	jQuery("#counter").jsCounter({
		number:		jQuery("#counter-trees").get(0).value,
		delay:		delay > 100 ? delay : 0,
		interval:	interval,
		step:		step,
		spaceWidth:	2,
		duration:	300,
		fps:		50
	});

	function openBox () {
		if ((mask & 1) && !(mask & 2)) {
			mask |= 2;
			jQuery("#donation-box").animate(
				{height: 'toggle'}, 300, function () {
					mask &= ~2;
					mask |= 4;

					if (!(mask & 1)) {
						window.setTimeout(closeBox, delayMouseOver);
					}
				}
			);
		}
	}

	function closeBox () {
		if (!(mask & 1) && !(mask & 2)) {
			mask |= 2;
			jQuery("#donation-box").animate(
				{height: 'toggle'}, 300, function () {
					mask &= ~6;

					if (mask & 1) {
						window.setTimeout(openBox, delayMouseOver);
					}
				}
			);
		}
	}

	jQuery("#counter-box").mouseenter(function () {
		mask |= 1;
		if (!(mask & 2) && !(mask & 4)) {
			window.setTimeout(openBox, delayMouseOver);
		}
	}).mouseleave(function () {
		mask &= ~1;
		if (!(mask & 2) && (mask & 4)) {
			window.setTimeout(closeBox, delayMouseOver);
		}
	});

});

//!
//! ProtoSlider - Image transition library
//!
Event.observe(window, "load", function (evt) {
	//! Use of the combination of these effects only
	var effects =
		"straight:o:a straight:o:a:inv straight:o:b straight:o:b:inv straight:o:a:od "+
		"straight:ow:a:seat[0.5] straight:ow:a:inv:seat[0.5] straight:oh:a:seat[0.5] "+
		"straight:oh:a:inv:seat[0.5] straight:owh:a:seat[0.5] straight:owh:a:inv:seat[0.5] "+
		"straight:owh:b:seat[0.5] straight:oc:a:seat[0.5] straight:oc:a:inv:seat[0.5] "+
		"straight:oc:b straight:oc:b:inv straight:och:a:seat[0.5] straight:och:a:inv:seat[0.5] "+
		"straight:ocw:b:seat[0.5] straight:ohl:a:seat[0.4] straight:ohl:b:seat[0.4] "+
		"straight:ohr:a:inv:seat[0.4] straight:ohr:b:inv:seat[0.4] straight:ovt:b:seat[0.4] "+
		"straight:ovt:a:inv:seat[0.4] straight:ovb:a:seat[0.4] straight:ovb:b:inv:seat[0.4] "+
		"corner:o:a corner:o:a:inv corner:o:b corner:o:b:inv corner:oc:a corner:oc:a:inv "+
		"corner:oc:b corner:oc:b:inv random:o:a random:owh:a random:oc:a random:ohl:a "+
		"random:ohr:a random:ovt:a random:ovb:a swirl:o:a:seat[0.4] swirl:o:b:seat[0.4] "+
		"swirl:owh:a:seat[0.4] swirl:owh:b:seat[0.4] swirl:oc:a:seat[0.4] swirl:oc:b:seat[0.4] "+
		"grid:o:a grid:o:a:inv grid:ow:a:seat[0.4] grid:ow:a:inv:seat[0.4] grid:oh:a:seat[0.4] "+
		"grid:oh:a:inv:seat[0.4] grid:och:a:seat[0.4] grid:och:a:inv:seat[0.4] grid:ocw:a:seat[0.4] "+
		"grid:ocw:a:inv:seat[0.4] grid:ohl:a:seat[0.5] grid:ohl:a:inv:seat[0.5] grid:ohl:b:seat[0.5] "+
		"grid:ohl:b:inv:seat[0.5] grid:ovt:a:seat[0.5] grid:ovt:a:inv:seat[0.5] grid:ovb:a:seat[0.5] "+
		"grid:ovb:a:inv:seat[0.5] grid:owh:a:seat[0.5] grid:owh:a:inv:seat[0.5] grid:oc:a:seat[0.5] "+
		"grid:oc:a:inv:seat[0.5] strokes1:o:a strokes1:o:b:seat[0.4] strokes1:oh:a:seat[0.5] "+
		"strokes1:oh:a:inv:seat[0.5] strokes1:owh:a:seat[0.5] strokes1:owh:a:inv:seat[0.5] "+
		"strokes1:oc:a:seat[0.5] strokes1:oc:a:inv:seat[0.5] strokes1:oc:b:seat[0.5] "+
		"strokes1:oc:b:inv:seat[0.5] strokes1:och:a:seat[0.5] strokes1:och:a:inv:seat[0.5] "+
		"strokes1:ocw:b:seat[0.5] strokes1:ocw:b:inv:seat[0.5] strokes1:ovt:a:seat[0.5] "+
		"strokes1:ovt:a:inv:seat[0.5]";

	if ($("pSlider")) {
		slider = new ProtoSlider("pSlider", {
			navigation:		false,
			duration:		1500,
			interval:		7000,
			fps:			75,
			columns:		9,
			rows:			7,
			seat:			0.3,
			random:			effects
		});
	}
});

//!
//! Google Search
//!
google.load('search', '1', {language : 'fr', style : google.loader.themes.GREENSKY});
google.setOnLoadCallback(function() {
	search = new google.search.CustomSearchControl('008455696635280192844:d80hx0qt4b8');
	search.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
	search.setLinkTarget(google.search.Search.LINK_TARGET_SELF);
});