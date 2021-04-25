$(function(){

	$('.select2').select2();

	$.scrollIt({topOffset:-100});

	$(".openMenu").click(function () {
		
		$("body").addClass("overflowH");
		$(".menuMobile").fadeIn();
		$(".transformPage,.menuMobile .menuContent").addClass("active");
		
	});
	
	$(".closeX,.BgClose").click(function () {
		
		$("body").removeClass("overflowH");
		$(".menuMobile").fadeOut();
		$(".transformPage,.menuMobile .menuContent").removeClass("active");
		
	});


	$(window).load(function () {
		
		$(".splash").fadeOut(1000,function () {
				
			$(this).remove();
			
		});
	});
	
	$('.the-slider-inner').bxSlider({
		useCSS: false,
		auto: true,
		controls: true,
		pager: true,
		autoHover: true,
		responsive: true,
		nextSelector: '#slider-next',
		prevSelector: '#slider-prev',
		nextText: '<i class="fa fa-angle-right"></i>',
		prevText: '<i class="fa fa-angle-left"></i>'
		
	});
	
	  var containerItems = $('#containerItems');
	 
	  containerItems.owlCarousel({
	      
	      items : 8, //10 items above 1000px browser width
	      itemsDesktop : [1200,7], //5 items between 1000px and 901px
	      itemsDesktopSmall : [991,6], // betweem 900px and 601px
	      itemsTablet: [768,3], //2 items between 600 and 0
	      itemsMobile : [479,2],// itemsMobile disabled - inherit from itemsTablet option
	      slideSpeed : 500,
	      paginationSpeed : 400,
	      pagination:false,
	      navigation:false,
	      autoPlay:true,
	  });
	
	/****** Start Tabs ******/
	
	$(".tabsBtns li").click(function () {
		
		var myButton = $(this).attr("id"),
			parent = $(this).parent().attr("id");
		
		$(this).addClass("active").siblings().removeClass("active");
		
		$("."+parent+" .tab").hide();
		$("."+parent+" .tabber .tabbed:first-of-type").show();
		
		$("."+parent+" ." + myButton).fadeIn();

		
	});
	
	/****** End Tabs ******/
	
	  var events = $('#events');
	 
	  events.owlCarousel({
	      
	      items : 2, //10 items above 1000px browser width
	      itemsDesktop : [1200,2], //5 items between 1000px and 901px
	      itemsDesktopSmall : [991,1], // betweem 900px and 601px
	      itemsTablet: [768,1], //2 items between 600 and 0
	      itemsMobile : [479,1],// itemsMobile disabled - inherit from itemsTablet option
	      slideSpeed : 500,
	      paginationSpeed : 400,
	      pagination:false,
	      navigation:true,
	      autoPlay:true,
	      navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
	  });
	
	
	$(".footer .contact .inputStyle input").change(function() {
		if($(this).val() !== '') {
			$(this).parent().addClass("active");
		} else {
			$(this).parent().removeClass("active");
		}
	});
	

	$(".selectStyle .textSelect").click(function() {
		var id = $(this).parents(".selectStyle").attr("id");
		$("#"+id+"  .listSelect").slideToggle();
	});
	
	$('body,html').on('click', function (e) {
		var container = $(".selectStyle .textSelect,.selectStyle .textSelect *,.selectStyle  .listSelect"),
			Sub = $(".selectStyle  .listSelect");


		if (!$(e.target).is(container)) {
			Sub.slideUp();
		}

	});
	
	$(".selectStyle  .listSelect ul li").click(function() {
		if($(this).hasClass("checked")) {
			$(this).removeClass("checked");
		} else {
			$(this).addClass("checked").siblings().removeClass("checked");
		}
		
		var id = $(this).parents(".selectStyle").attr("id");
		var val = $("#"+id+ " .listSelect li.checked").attr("val");
		var defVal = $("#"+id+ " .textSelect").attr("defval");
		
		if ($("#"+id+ " .listSelect .checked").length > 0) {
			
			$("#"+id+ " .textSelect").text(val);
			$("#"+id+ " input").val(val);
			
		} else {
			$("#"+id+ " .textSelect").text(defVal);
			$("#"+id+ " input").val("");
		}
		
	});
	
	
	$(".registration .addSocial .add .name,.registration .addSocial .add i").click(function() {
		var id = $(this).parents(".add").attr("id");
		$(".registration .inputSocial").not($("#"+id+" .inputSocial")).slideUp()
		$("#"+id+" .inputSocial").slideToggle();
	});
	
	$('body,html').on('click', function (e) {
		var container = $(".registration .addSocial *"),
			Sub = $(".registration .inputSocial");


		if (!$(e.target).is(container)) {
			Sub.slideUp();
		}

	});
	
	$(".inputSocial .btnSoc").click(function() {
		var id = $(this).parents(".add").attr("id");
		
		if($("#"+id+" input").val() === '') {
			$("#"+id+" .name").text("@yourname");
		} else {
			$("#"+id+" .name").text($("#"+id+" input").val());
		}
	});
	
	$(".inputSocial input").change(function() {
		var id = $(this).parents(".add").attr("id");
		if($(this).val() === '') {
			$("#"+id+" .name").text("@yourname");
		}
	});
	
	
});
