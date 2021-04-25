$(function(){
	$('a.itemEvent').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		$('#modalPost .desc').html($(this).find('.desc').html());
		$('#modalPost .date').html($(this).find('.date').html());
		$('#modalPost img').attr('src',$(this).find('img').attr('src'));
		$('#modalPost').modal('toggle');
	});
});