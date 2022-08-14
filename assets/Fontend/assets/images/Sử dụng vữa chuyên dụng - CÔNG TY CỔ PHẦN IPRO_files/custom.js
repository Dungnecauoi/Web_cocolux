jQuery( document ).ready(function() {

		jQuery(window).scroll(function() {
			if (jQuery(window).width() > 991) {
				if (jQuery(".main-product-right").height() > jQuery(".main-product-left").height()) {
					var h = jQuery("#header").height() + jQuery(".child-banner").height() + jQuery(".main-breadcrumb").height() + 30;
					var h2 = 200 + jQuery('.main-product-right').height() - jQuery(".danhmuc-sp").height();
					if (window.pageYOffset > h) {
						jQuery(".main-product-left .danhmuc-sp").addClass('active');
						if(window.pageYOffset > h2) {
							jQuery(".main-product-left .danhmuc-sp").removeClass('active');
						} else {
							jQuery(".main-product-left .danhmuc-sp").removeClass('active2');

						}
					} else {
						jQuery(".main-product-left .danhmuc-sp").removeClass('active');
					}
				}
			}
		});
	jQuery(".home-slideshow ul").responsiveSlides({
		auto: true,             // Boolean: Animate automatically, true or false
		speed: 500, 
		autoplay: true,
		autoplaySpeed: 2000,          // Integer: Speed of the transition, in milliseconds
		timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
		pager: false,           // Boolean: Show pager, true or false
		nav: true,             // Boolean: Show navigation, true or false
		random: false,          // Boolean: Randomize the order of the slides, true or false
		pause: false,           // Boolean: Pause on hover, true or false
		pauseControls: true,    // Boolean: Pause when hovering controls, true or false
		prevText: "",   // String: Text for the "previous" button
		nextText: "",       // String: Text for the "next" button
		maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
		navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
		manualControls: "",     // Selector: Declare custom pager navigation
		namespace: "rslides",   // String: Change the default namespace used
		before: function(){},   // Function: Before callback
		after: function(){}     // Function: After callback
	});
	
	jQuery('.doitac-lienket-content').slick({
		autoplay: true,
		autoplaySpeed: 2000,
		dots: false,
		arrows:false,
	});

	jQuery('.list-product').slick({
		dots: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		arrows:false,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
	    {
	      breakpoint: 800,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});
	
	jQuery('.list-product-image').slick({
		dots: false,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows:true,
		autoplay: true,
		autoplaySpeed: 4000,
		prevArrow: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
		nextArrow: '<i class="fa fa-angle-left" aria-hidden="true"></i>'
	});
	
	
	
	jQuery("li.search a").click(function(){
		jQuery('.share-area').removeClass('active');
	  	jQuery('.main-language').removeClass('active');
	  	
		if(jQuery("#search-3").hasClass('active')){
			jQuery("#search-3").removeClass('active');
		}else{
			jQuery("#search-3").addClass('active');
		}
		return false;
	});
	
	jQuery(".search-icon").click(function(){
	  jQuery('.share-area').removeClass('active');
	  jQuery('.main-language').removeClass('active');
		if(jQuery(this).parent().hasClass('active')){
			jQuery(this).parent().removeClass('active');
			jQuery(".search-icon").html('<i class="fa fa-search" aria-hidden="true"></i>');
		}else{
			jQuery(this).parent().addClass('active');
			jQuery(".search-icon").html('<i class="fa fa-times" aria-hidden="true"></i>');
		}
	});
	jQuery(".close-dathang").click(function(){
		jQuery(".dat-hang").removeClass('active');
	});
	jQuery(".dathangngay").click(function(){
		jQuery(".dat-hang").addClass('active');
		return false;
	});
	jQuery(".main-menu .mobile-menu").click(function(){
		jQuery(".menu-main-menu-container").height(jQuery(window).height() - 165);
		if(jQuery(this).parent().hasClass('active')){
			jQuery(this).parent().removeClass('active');
		}else{
			jQuery(this).parent().addClass('active');
		}
	});
	jQuery(".tuvan-head").click(function(){
		if(jQuery(".main-tuvan").hasClass('active')){
			jQuery(".main-tuvan").removeClass('active')
		}else{
			jQuery(".main-tuvan").addClass('active')
		}
	});
	
	
	jQuery(window).scroll(function(){
		if(jQuery("body").hasClass('home')){
			if(jQuery(this).scrollTop()>=jQuery(".home-slideshow").height()){
		       jQuery('.main-breadcrumb').addClass('active');
		    }else{
			    jQuery('.main-breadcrumb').removeClass('active');
		    }
		}else{
			if(jQuery(this).scrollTop()>=jQuery(".child-banner").height() + jQuery("#header").height()){
		       jQuery('.main-breadcrumb').addClass('active');
		    }else{
			    jQuery('.main-breadcrumb').removeClass('active');
		    }
		}
	    
  });
  jQuery("li.share a").click(function(){
	  jQuery('#search-3').removeClass('active');
	  jQuery('.main-language').removeClass('active');
	  if(jQuery(".share-area").hasClass('active')){
		  jQuery(".share-area").removeClass('active');
	  }else{
		  jQuery(".share-area").addClass('active');
	  }
	  return false;
  });
  
/*
  jQuery("li.globe a").click(function(){
	  jQuery('#search-3').removeClass('active');
	  jQuery('.globe-area').removeClass('active');
	  jQuery('.main-language').removeClass('active');
	  if(jQuery(".globe-area").hasClass('active')){
		  jQuery(".globe-area").removeClass('active');
	  }else{
		  jQuery(".globe-area").addClass('active');
	  }
	  return false;
  });
  
*/
  jQuery("li.globe a").click(function(){
	  jQuery('#search-3').removeClass('active');
	  jQuery('.share-area').removeClass('active');
	  if(jQuery(".main-language").hasClass('active')){
		  jQuery(".main-language").removeClass('active');
	  }else{
		  jQuery(".main-language").addClass('active');
	  }
	  return false;
  });
  
  jQuery(".video-sp").click(function(){
	  jQuery(".popup-video").show();
	  jQuery(".popup-video-content").html('<iframe width="560" height="315" src="'+ jQuery(".video-sp").attr('href') +'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
	  return false;
  });
  jQuery(".close-popup").click(function(){
	  jQuery(".popup-video").hide();
	  jQuery(".popup-video-content").html('');
	  return false;
  });
  
  jQuery(".lang-en .breadcrumbs a.home").attr('href','https://iprovietnam.com/en');
  jQuery(".lang-en .breadcrumbs a.home span").html('Home'); 
  jQuery(".show-language").click(function(){
  	if(jQuery(".list-language").hasClass('active')){
  		jQuery(".list-language").removeClass('active')
  	}else{
  		jQuery(".list-language").addClass('active')
  	}
  	return false;
  });

  jQuery('.popup-youtube').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});

});

