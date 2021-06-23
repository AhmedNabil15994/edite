$(function(){

	  var memberships = $('#memberships');
	 
	  memberships.owlCarousel({
	      
	      items : 2, //10 items above 1000px browser width
	      itemsDesktop : [1200,2], //5 items between 1000px and 901px
	      itemsDesktopSmall : [979,1], // betweem 900px and 601px
	      itemsTablet: [768,1], //2 items between 600 and 0
	      itemsMobile : [479,1],// itemsMobile disabled - inherit from itemsTablet option
	      slideSpeed : 500,
	      paginationSpeed : 400,
	      pagination:false,
	      navigation:true,
	      autoPlay:true,
	      navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
	  });
		
	$('a.conditions').on('click',function (e) {
		e.preventDefault();
		e.stopPropagation();

		$('#membershipModal .desc').html('');
		var text = '';
		var myData = JSON.parse($(this).parent('li').siblings('input[name="conditions"]').val())//JSON.stringify();
		$.each(myData,function(index,item){
			text+= item + '<br>';
		})
		$('#membershipModal .desc').html(text);
		$('#membershipModal').modal('toggle');

	})
	
	$('a.features').on('click',function (e) {
		e.preventDefault();
		e.stopPropagation();

		$('#membershipModal .desc').html('');
		var text = '';
		var myData = JSON.parse($(this).parent('li').siblings('input[name="features"]').val())//JSON.stringify();
		$.each(myData,function(index,item){
			text+= item + '<br>';
		})
		$('#membershipModal .desc').html(text);
		$('#membershipModal').modal('toggle');

	})

});
