$(document).ready(function() {



	$(window).scroll(function(e){
	    // fixedchat();
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
    

    $('.collapse').on('shown.bs.collapse', function(){
		$(this).parent().find(".img").attr("src", "images/accordion-minus.jpg");
	}).on('hidden.bs.collapse', function(){
		$(this).parent().find(".img").attr("src", "images/accordion-plus.jpg");
	});      


	function checkendscroll() {
    	if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
    		// $(window).unbind('scroll');
	      $(".sticky-chat").removeClass("fixed");
	   } else {
	   	  $(".sticky-chat").addClass("fixed");
	   }
    }

	function fixedchat(){
		var winScroll = $(window).scrollTop();
		var finalend = $(document).height();
		if(winScroll >= 100 ){
			$(".sticky-chat").addClass("fixed");
			if(winScroll + $(window).height() > $(document).height() - 100) {
		     	 $(".sticky-chat").removeClass("fixed");
	 		} 
		} else {
			$(".sticky-chat").removeClass("fixed");
		}
    }


    // STICKY CHAT FOOTER
    $(window).scroll(function(e) {
    	var winScroll = $(window).scrollTop();
		var finalend = $(document).height() - $(window).height();
		var final = finalend - 100;
		console.log("final:" + final);
		console.log(winScroll);
		if( winScroll >= 100 ){
			$(".sticky-chat").addClass("fixed");
			e.preventDefault();
			// 
		} else {
			$(".sticky-chat").removeClass("fixed");
		}

		if (winScroll >= final) {
			$(".sticky-chat").removeClass("fixed");
			e.preventDefault();
		} 
	});




    // Loop job options
    $('#jobcat').change(function() { 
    	var selected = $("#jobcat option:selected").val();
    	console.log("selected: " +selected);
    	var a1 = ["上で選択した項目の詳細がプルダウン","システムコンサルタント・プロジェクトマネジメント","システムエンジニア（ＳＥ）", "プログラマー（ＰＧ）","サーバーエンジニア","Ｗｅｂエンジニア（アプリ開発・フルスタック）", "テスト・評価・ＱＡ","インフラエンジニア","運用管理・保守","ユーザサポート・ヘルプデスク","ＩＴインストラクター", "その他ＩＴ系"];
    	var a2 = ["Ｗｅｂプロデューサー・Ｗｅｂディレクター","Ｗｅｂデザインー・ＵＩ/ＵＸデザインー" ,"Ｗｅｂ構築・制作コーディング","ＤＴＰ・ＣＧオペレーター","映像・音響・ゲーム制作","ＣＧデザインー・キャラクターデザイン","その他クリエイティブ系"];
    	var a3 = ["コンサルティング営業・企画営業","セールスエンジニア" ,"テレコミュニュケーター","デモンストレーション","海外営業" ,"営業マネージャー", "販売・添乗","メディカル営業"];
    	var a4 = ["英語講師","中国語講師","塾講師・家庭教師","スクール運営・マネジメント"];
    	var a5 = ["ＩＴブリッジ","同時通訳",,"通訳","翻訳","保育士","英語保育士","保育補助"];
    	var a6 = ["一般事務・ＯＡ事務","営業事務・営業アシスタント","秘書・受付","その他一般事務・アシスタント関連職"];
    	var num = [1,2,3,4,5,6,7,8,9,10,11,12];
 		var dd;
 		console.log("d: " + dd);

    	$('#joblist').empty().html("<optgroup label=''><option value=''>選択してください</option></optgroup>");
    	if(selected == "a1") {
    		dd = a1;
	    	} else if(selected == "a2") { dd = a2;
	    	} else if(selected == "a3") { dd = a3;
	    	} else if(selected == "a4") { dd = a3;
	    	} else if(selected == "a5") { dd = a3;
	    	} else if(selected == "a6") { dd = a3;
	    	} else if(selected == "a7") { dd = a3;
	    	} else { return 0;
    	}
    	for(var i = 0; i < dd.length; i++) {
			   $('#joblist optgroup').append("<option value='opt"+ num[i] +"'>"+ dd[i] +"</option>");
		}
	});



	// ============================
	// 	  Add more awards
	// ----------------------------
	// $(".addhere").append("<span id='addmore' class='lnr lnr-plus-circle'></span>");
	$("#addmore").click(function() {
		var a = $(".addhere").html();
		$(".lists.awards").append("<label></label><div class='addhere'>"+ a + "</div>");
	});


	// ============================
	// 	  Add more jobs
	// ----------------------------
	// $(".addhere").append("<span id='addmore' class='lnr lnr-plus-circle'></span>");
	$("#addmorejob").click(function() {
		var a = $(".addjobs").html();
		$(".jobshere").append("<div class='addjobs'>"+ a + "</div>");
	});






    function scrolltotop() {
    	var header = $("header").outerHeight();
		var body = $("body").outerHeight();
		// console.log("header:" + header + ", body:" + body);
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

	function showOptions() {
		var i;
		// BDATE YEAR
		for (i = 1950; i <= 2012; i++) {
		    $('<option/>', {
		        value: i,
		        text: i
		    }).appendTo("#bdyear");
		}
		// BDATE DAys
		for (i = 1; i <= 31; i++) {
		    $('<option/>', {
		        value: i,
		        text: i
		    }).appendTo("#bddays");
		}
	}
	showOptions();

	// ============================
	// 	  UPLOAD FILES	
	// ----------------------------

	const realFileBtn = document.getElementById("real-file");
	const customBtn = document.getElementById("custom-button");
	const customTxt = document.getElementById("custom-text");

	customBtn.addEventListener("click", function() {
	  realFileBtn.click();
	});

	realFileBtn.addEventListener("change", function() {
	  if (realFileBtn.value) {
	    customTxt.innerHTML = realFileBtn.value.match(
	      /[\/\\]([\w\d\s\.\-\(\)]+)$/
	    )[1];
	  } else {
	    customTxt.innerHTML = "sample.jpg";
	  }
	});

	


	// ============================
	// 	  SCROLL NAV ON CLICK
	// ----------------------------
	  (function($) {
	  "use strict"; // Start of use strict

	  // Smooth scrolling using jQuery easing
	  $('.scrollmenu[href*="#"]:not([href="#"])').click(function() {
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
	  $('.scrollmenu').click(function() {
	    $('.navbar-collapse').collapse('hide');
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
		$("#mySidenav").css("left", "0");
		$(".closenav").show();
		$(".wrap-sidenav").show();
		$("html,body").css("overflow", "hidden");
	});

	$(".closenav").click(function(){
		var sidenavwidth = $(".sidenav").width();
		$("#mySidenav").css("left", '150%');
		$(".closenav").hide();
		$(".wrap-sidenav").hide();
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