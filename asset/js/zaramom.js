$('div.wp-caption').each(function(i) {
	var img_ = $('img', this);			
	var img_height = img_.attr('height');
	var p_height = $('p', this).outerHeight();

	$(this).height(img_height);
	$(this).hover(function() {
		img_.animate({marginTop : -p_height}, 500);
	}, function() {
		img_.animate({marginTop : '0'}, 500);
	});
});		