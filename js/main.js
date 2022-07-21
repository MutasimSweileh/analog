/** ==========================================================================================
  Project :   Raxena - Construction HTML5 Template
  Author :    CymolThemes
========================================================================================== */
! function(t) {
    "use strict";
    t(window).on("load", function() {
        t("#preloader").fadeOut(), t("#status").fadeOut(9e3)
    }), jQuery(".cmt-header-search-link a").addClass("sclose"), jQuery(".cmt-header-search-link a").on("click", function(t) {
        jQuery(".field.searchform-s").focus(), jQuery(".cmt-header-search-link a").hasClass("sclose") ? (jQuery(".cmt-header-search-link a i").removeClass("ti-search").addClass("ti-close"), jQuery(this).removeClass("sclose").addClass("open"), jQuery(".cmt-search-overlay").addClass("st-show")) : (jQuery(this).removeClass("open").addClass("sclose"), jQuery(".cmt-header-search-link a i").removeClass("ti-close").addClass("ti-search"), jQuery(".cmt-search-overlay").removeClass("st-show")), t.preventDefault()
    }), t(window).scroll(function() {
        matchMedia("only screen and (min-width: 1200px)").matches && (t(window).scrollTop() >= 50 ? (t(".cmt-stickable-header").addClass("fixed-header"), t(".cmt-stickable-header").addClass("visible-title")) : (t(".cmt-stickable-header").removeClass("fixed-header"), t("cmt-stickable-header").removeClass("visible-title")))
    }), t("ul li:has(ul)").addClass("has-submenu"), t("ul li ul").addClass("sub-menu"), t("ul.dropdown li").on({
        mouseover: function() {
            t(this).addClass("hover")
        },
        mouseout: function() {
            t(this).removeClass("hover")
        }
    });
    var e = t("#menu"),
        a = t("#menu-toggle-form"),
        s = t(".has-submenu > a");
    a.on("click", function(t) {
        a.toggleClass("active"), e.toggleClass("active")
    }), s.on("click", function(e) {
        e.preventDefault(), t(this).toggleClass("active").next("ul").toggleClass("active")
    }), t("ul li:has(ul)"), t("[data-appear-animation]").each(function() {
        var e = t(this),
            a = e.data("appear-animation");
        e.data("appear-animation-delay") && e.data("appear-animation-delay");
        t(window).width() > 959 ? (e.html("0"), e.waypoint(function(t) {
            if (!e.hasClass("completed")) {
                var a = e.data("from"),
                    s = e.data("to"),
                    i = e.data("interval");
                e.numinate({
                    format: "%counter%",
                    from: a,
                    to: s,
                    runningInterval: 2e3,
                    stepUnit: i,
                    onComplete: function(t) {
                        e.addClass("completed")
                    }
                })
            }
        }, {
            offset: "85%"
        })) : "animateWidth" == a && e.css("width", e.data("width"))
    }), t(".cmt-progress-bar").each(function() {
        t(this).find(".progress-bar").width(0)
    }), t(".cmt-progress-bar").each(function() {
        t(this).find(".progress-bar").animate({
            width: t(this).attr("data-percent")
        }, 2e3)
    }), t(".progress-bar-percent[data-percentage]").each(function() {
        var e = t(this),
            a = Math.ceil(t(this).attr("data-percentage"));
        t({
            countNum: 0
        }).animate({
            countNum: a
        }, {
            duration: 2e3,
            easing: "linear",
            step: function() {
                var t = "";
                t = 0 == a ? Math.floor(this.countNum) + "%" : Math.floor(this.countNum + 1) + "%", e.text(t)
            }
        })
    }), t(".cmt-tabs").each(function() {
        t(this).children(".content-tab").children().hide(), t(this).children(".content-tab").children().first().show(), t(this).find(".tabs").children("li").on("click", function(e) {
            var a = t(this).index(),
                s = t(this).siblings().removeClass("active").parents(".cmt-tabs").children(".content-tab").children().eq(a);
            s.addClass("active").fadeIn("slow"), s.siblings().removeClass("active"), t(this).addClass("active").parents(".cmt-tabs").children(".content-tab").children().eq(a).siblings().hide(), e.preventDefault()
        })
    }), t(".toggle").eq(0).addClass("active").find(".toggle-content").css("display", "block"), t(".accordion .toggle-title").on("click", function() {
        t(this).siblings(".toggle-content").slideToggle("fast"), t(this).parent().toggleClass("active"), t(this).parent().siblings().children(".toggle-content:visible").slideUp("fast"), t(this).parent().siblings().children(".toggle-content:visible").parent().removeClass("active")
    }), t(window).on("load", function() {
        var e = t("#isotopeContainer");
        t("#filters a").on("click", function() {
            var a = t(this).attr("data-filter");
            return e.isotope({
                filter: a
            }), !1
        }), t("#filters li").find("a").on("click", function() {
            var a = t(this);
            if (a.hasClass("selected")) return !1;
            var s = a.parents("#filters");
            s.find(".selected").removeClass("selected"), a.addClass("selected");
            var i = {},
                o = s.attr("data-option-key"),
                l = a.attr("data-option-value");
            return l = "false" !== l && l, i[o] = l, "layoutMode" === o && "function" == typeof changeLayoutMode ? changeLayoutMode(a, i) : e.isotope(i), !1
        })
    }), jQuery(document).ready(function() {
        jQuery('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function() {
            if ("_blank" != jQuery(this).attr("target") && !jQuery(this).hasClass("prettyphoto") && !jQuery(this).hasClass("modula-lightbox")) {
                var e = t(this).attr("data-gal");
                void 0 !== e && !1 !== e && "prettyPhoto" != e && jQuery(this).attr("data-rel", "prettyPhoto")
            }
        }), jQuery('a[data-gal^="prettyPhoto"]').prettyPhoto(), jQuery("a.ttm_prettyphoto").prettyPhoto(), jQuery('a[data-gal^="prettyPhoto"]').prettyPhoto(), jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({
            hook: "data-gal"
        })
    }), 
    jQuery(document).ready(function() {
        jQuery(".cmt-blog-classic").each(function(t) {
            var e = jQuery(this);
            e.find(".cmt-social-share-title").on("click", function() {
                return e.find(".cmt-social-share-wrapper").toggleClass("cmt-show-share-list"), !1
            })
        })
    }), t(".testimonial-slide").owlCarousel({
        loop: !0,
        margin: 0,
        smartSpeed: 3e3,
        nav: t(".testimonial-slide").data("nav"),
        dots: t(".testimonial-slide").data("dots"),
        autoplay: t(".testimonial-slide").data("auto"),
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: t(".testimonial-slide").data("item")
            }
        }
    }), t(".portfolio-slide").owlCarousel({
        autoplay: !1,
        margin: 0,
        loop: !0,
        nav: t(".portfolio-slide").data("nav"),
        dots: t(".portfolio-slide").data("dots"),
        autoplay: t(".portfolio-slide").data("auto"),
        smartSpeed: 1e3,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: t(".portfolio-slide").data("item")
            }
        }
    }), t(".team-slide").owlCarousel({
        autoplay: !1,
        margin: 0,
        loop: !0,
        nav: t(".team-slide").data("nav"),
        dots: t(".team-slide").data("dots"),
        autoplay: t(".team-slide").data("auto"),
        smartSpeed: 1e3,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: t(".team-slide").data("item")
            }
        }
    }), t(".post-slide").owlCarousel({
        autoplay: !1,
        margin: 0,
        loop: !0,
        nav: t(".post-slide").data("nav"),
        dots: t(".post-slide").data("dots"),
        autoplay: t(".post-slide").data("auto"),
        smartSpeed: 3e3,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: t(".post-slide").data("item")
            }
        }
    }), t(".testimonial-slide2").owlCarousel({
        loop: !0,
        center: !0,
        margin: 0,
        smartSpeed: 3e3,
        nav: t(".testimonial-slide2").data("nav"),
        dots: t(".testimonial-slide2").data("dots"),
        autoplay: t(".testimonial-slide2").data("auto"),
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            992: {
                items: t(".testimonial-slide2").data("item")
            }
        }
    }), 
    jQuery("#totop").hide(), jQuery(window).scroll(function() {
        jQuery(this).scrollTop() >= 100 ? (jQuery("#totop").fadeIn(200), jQuery("#totop").addClass("top-visible")) : (jQuery("#totop").fadeOut(200), jQuery("#totop").removeClass("top-visible"))
    }), jQuery("#totop").on("click", function() {
        return jQuery("body,html").animate({
            scrollTop: 0
        }, 500), !1
    }),
    /*-----------------------------------------------------------------------------------
/* Styles Switcher
-----------------------------------------------------------------------------------*/
window.console = window.console || (function(){
    var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
    return c;
})();
jQuery(document).ready(function($) {
// layour-style    
    // Header Style Switcher
    jQuery("#header-style").change(function(e){
        if($.cookie('kw_hidewbar') === null || $.cookie('kw_hidewbar') === "" 
        || $.cookie('kw_hidewbar') === "null" || $.cookie('kw_hidewbar') === undefined){
            defaultPadding = '193px';
        } else {
            defaultPadding = '153px';
        }
    }); 
    
    
    var selectedScheme = 'cmt-wide';
    
    jQuery(".layout-style a").click(function(e){    
       
        jQuery(".layout-style a").removeClass('active');
        jQuery(this).addClass('active');
        jQuery('body').removeClass(selectedScheme).addClass(jQuery(this).attr('data-name'));
        selectedScheme = jQuery(this).attr('data-name');    
   
        return false;
    });
    $('.color-switcher .layout-style .layout-reset').on('click', function() {
        $('.colors-list .theme-color').removeClass('active');
        var targetCSSFile = $('link[id="switcher-color"]');
       $(targetCSSFile).attr('href','css/colors/default-color.css');
       $('.colors-list .theme-color.default-color').addClass('active');
        });
    
});
     t(function() {})
}(jQuery);
		$('.main-slider-carousel').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplayTimeout: 3000,
			loop:true,
			rewind:true,
			margin:0,
			nav:true,
			autoHeight: true,
			smartSpeed: 3000,
			autoplay: true,
			navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1},
					600:{
					items:1},
					800:{
					items:1},
					1024:{
					items:1},
					1200:{
					items:1}
				}
			});    		
		$('.portfolio-slider').owlCarousel({
        autoplayTimeout: 3000,dots:false,
			loop:true,
			rewind:true,
			margin:15,
			nav:true,
			autoHeight: true,
			smartSpeed: 3000,
			autoplay: true,
			navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1},
					600:{
					items:2},
					800:{
					items:2},
					1024:{
					items:4},
					1200:{
					items:5}
				}
			});    		
		$('.blog-slider').owlCarousel({
        autoplayTimeout: 3000,dots:false,
			loop:true,
			rewind:true,
			margin:15,
			nav:true,
			autoHeight: true,
			smartSpeed: 3000,
			autoplay: true,
			navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1},
					600:{
					items:1},
					800:{
					items:1},
					1024:{
					items:1},
					1200:{
					items:3}
				}
			});    		
		$('.partn-slide').owlCarousel({
        autoplayTimeout: 3000,dots:false,
			loop:true,
			rewind:true,
			margin:15,
			nav:true,
			autoHeight: true,
			smartSpeed: 3000,
			autoplay: true,
			navText: [ '<span class="fal fa-angle-left"></span>', '<span class="fal fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:2},
					600:{
					items:2},
					800:{
					items:2},
					1024:{
					items:4},
					1200:{
					items:6}
				}
			});    	
        $('.accordion').find('.accordion-title').on('click', function() {
            $(this).toggleClass('active');
            $(this).next().slideToggle('fast');
            $('.accordion-content').not($(this).next()).slideUp('fast');
            $('.accordion-title').not($(this)).removeClass('active');
        });
// counterUp
  $('.count').counterUp({
    delay: 10,
    time: 2000
  });
