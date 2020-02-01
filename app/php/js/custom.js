$(document).ready(function() {



	$(window).scroll(function(){
	    fixedheader();
	    scrolltotop();
	});

	$(window).resize(function(){
		
		if( $(".page.home").length ) {
			console.log("Homepage");
		} else	{
			return false;
		} 

	});

	$('.carousel').carousel({
      interval: 5000
    });

	$(document).mouseup(function(e) 
	{
	    var container = $("#mySidenav");

	    // if the target of the click isn't the container nor a descendant of the container
	    if (!container.is(e.target) && container.has(e.target).length === 0) 
	    {
	        container.hide();
	    }
	});

	$('.carousel-staff .item').each(function(){
	var itemToClone = $(this);

	for (var i=1;i<3;i++) {
	  itemToClone = itemToClone.next();

	  // wrap around if at end of item collection
	  if (!itemToClone.length) {
	    itemToClone = $(this).siblings(':first');
	  }

	  // grab item, clone, add marker class, add to collection
	  itemToClone.children(':first-child').clone()
	    .addClass("cloneditem-"+(i))
	    .appendTo($(this));
	}
	});

	$(".accordion2").each(function() {
		$(this).click(function(){
			$(this).closest(".acc-container").find(".accord-content").slideToggle();
		});
	});

	$(".read-arrow").each(function() {
		$(this).click(function(){
			$(this).closest(".blocks").find(".more-content").toggleClass("active");
			$(this).closest(".blocks").find(".read-arrow").toggleClass("hide");
			$(this).closest(".blocks").find(".hide-arrow").toggleClass("show");
		});
		console.log("show");
	});

	$(".hide-arrow").each(function() {
		$(this).click(function(){
			$(this).closest(".blocks").find(".more-content").toggleClass("active");
			$(this).closest(".blocks").find(".read-arrow").toggleClass("hide");
			$(this).closest(".blocks").find(".hide-arrow").toggleClass("show");
		});
		console.log("hide");
	});


	 // Configure/customize these variables.
    var showChar = 50;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "さらに読む <img src='images/readmore-arrow.jpg'>";
    var lesstext = "隠す  <img src='images/hide-arrow.jpg'>";
    

    // $('.more').each(function() {
    //     var content = $(this).html();
 
    //     if(content.length > showChar) {
 
    //         var c = content.substr(0, showChar);
    //         var h = content.substr(showChar, content.length - showChar);
 
    //         var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
    //         $(this).html(html);
    //     }
 
    // });
 
    // $(".morelink").click(function(){
    //     if($(this).hasClass("less")) {
    //         $(this).removeClass("less");
    //         $(this).html(moretext);
    //         $(this).closest(".imge").hide();
    //     } else {
    //         $(this).addClass("less");
    //         $(this).html(lesstext);
    //         $(this).closest(".imge").show();
    //     }
    //     $(this).parent().prev().toggle();
    //     $(this).prev().toggle();
    //     return false;
    // });


    $('.collapse').on('shown.bs.collapse', function(){
		$(this).parent().find(".img").attr("src", "images/accordion-minus.jpg");
	}).on('hidden.bs.collapse', function(){
		$(this).parent().find(".img").attr("src", "images/accordion-plus.jpg");
	});      


	

	function fixedheader(){
		var winScroll = $(window).scrollTop();
		
		if(winScroll >= 100){
			$("header").addClass("mobile");
		} else{
			$("header").removeClass("mobile");
		}
    }


    function scrolltotop() {
    	var header = $("header").outerHeight();
		var body = $("body").outerHeight();
		console.log("header:" + header + ", body:" + body);
		var totalv = body - 650;
		if ($(this).scrollTop() >= 100) {        // If page is scrolled more than 100px
	        $('#return-to-top').fadeIn(200); 
		        if($(this).scrollTop() < totalv) { // If page is scrolled outside the footer
		        	$('#return-to-top').css("bottom","70px"); 
		        }
		        else {
		        	$('#return-to-top').css("bottom","130px"); 
		        }
	    } else {
	        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
	    }
	}

	$('.return-to-top').click(function() { 
	     // When arrow is clicked
	    $('body,html').animate({
	        scrollTop : 0                       // Scroll to top of body
	    }, 1000);
	});


	// ============================
	// 	  SCROLL NAV ON CLICK
	// ----------------------------
	  (function($) {
	  "use strict"; // Start of use strict

	  // Smooth scrolling using jQuery easing
	  $('a.scrollmenu[href*="#"]:not([href="#"])').click(function() {
	  	$("body, html").css("overflow","auto");
	    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: (target.offset().top - 54)
	        }, 1000, "easeInOutExpo");
	        return false;
	      }
	    }
	  });

	  // Closes responsive menu when a scroll trigger link is clicked
	  $('.reglink').click(function() {
	    $('.navbar-collapse').collapse('hide');
	    $("html,body").css("overflow", "auto");
	    var sidenavwidth = $(".sidenav").width();
	    $("#mySidenav").css("left", '100%');
		$(".closenav").hide();
		$(".closenav").hide();
	  });

	  // Activate scrollspy to add active class to navbar items on scroll
	  $('body').scrollspy({
	    target: '#mainNav',
	    offset: 54
	  });

	})(jQuery); // End of use strict


	$(".canvas").click(function(){
		var sidenavwidth = $(".sidenav").width();
		console.log(sidenavwidth);
		$("#mySidenav").css("left", "20%");
		$(".closenav").show();
		$("html,body").css("overflow", "hidden");
	});

	$(".closenav").click(function(){
		var sidenavwidth = $(".sidenav").width();
		$("#mySidenav").css("left", '100%');
		$(".closenav").hide();
		$(".closenav").hide();
		$("html,body").css("overflow", "auto");
	});


    $('.sidenav li a').click(function() { 
	    $(this).closest(".sidenav").css("left", '100%');
	    $(".closenav").hide();
	});

	if( $(".page.home").length ) {
		console.log("Homepage");
	} else	{
		return false;
	} 

});