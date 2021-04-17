$(function(){
	$('input[name="image"]').on('change',function(){
        var image = $(this)[0].files[0];
        var url = window.URL.createObjectURL(image);
		$('div.images.image').empty();
		$('div.images.image').append("<div class='img'><img src='"+url+"'><i class='fa remove fa-close'></i></div>");
	});

	$('input[name="identity_image"]').on('change',function(){
        var identity_image = $(this)[0].files[0];
        var url = window.URL.createObjectURL(identity_image);
		$('div.images.identity_image').empty();
		$('div.images.identity_image').append("<div class='img'><img src='"+url+"'><i class='fa remove fa-close'></i></div>");
	});

	$(document).on('click','.img i.remove',function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).parent('div.img').remove();
	});

	if($('.steps ul li.active.last').length){
		setTimeout(function(){
			window.location.href='/paymentGateway';
		},5000);
	}

	if($('.datepicker').length){
		$('.datepicker').datepicker({
			format:'yyyy-mm-dd',
		});
	}
});