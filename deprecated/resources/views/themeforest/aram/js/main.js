


(function($) {
    "use strict";




    /*----------------------          
    Date TimePicker
    ----------------------*/
	if(jQuery('.datetimepicker').length) {
		jQuery('.datetimepicker').datetimepicker({
			dayOfWeekStart : 1,
			lang:'en',
			disabledDates:['1986/01/22','1986/01/23','1986/01/19'],
			startDate:	'2015/01/05'
		});
	}


        /*----preloader------*/
         $('#loading').fadeOut('slow');


    /*----------------------
  Mixitup activation
  ----------------------*/

  $('#mixstart').mixItUp();
            

    
  /*----------------------
   Mobile-menu
  ----------------------*/
    
    jQuery('.mobile-menu-start').meanmenu();
    
    
    
/*----------------------
   Tetimonial activation
----------------------*/

    
  
    
    $(".testimonail-list").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:false,	  
      items : 1,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,1],
	  itemsDesktopSmall : [991,1],
	  itemsTablet: [768,1],
	  itemsMobile : [479,1]
    }); 
    
    $(".about-carousel").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 1,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,1],
	  itemsDesktopSmall : [991,1],
	  itemsTablet: [768,1],
	  itemsMobile : [479,1]
    }); 
    
     $(".ser-page").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:false,	  
      items : 3,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,3],
	  itemsDesktopSmall : [991,2],
	  itemsTablet: [767,1],
	  itemsMobile : [479,1]
    }); 
 
  
  
 
   
  /*--------------------------
       Counter Up
    ---------------------------- */	
    $('.counter').counterUp({
        delay: 70,
        time: 5000
    }); 
   
  /*------------------
     wow js active
    ---------------- */
 if($('.wow').length){
      var wow = new WOW(
        {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true       // act on asynchronously loaded content (default is true)
        }
      );
      wow.init();
    }
   /*------------
    	 scrollUp jquery active
    ------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

     /*------------
     lightbox jquery active
    ------------- */
        lightbox.option({
          'resizeDuration': 200,
          'positionFromTop': 100
        })
 
    
   
    

})(jQuery);

