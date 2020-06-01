function passwordvisibility(target){

    $(target).click(function(){
    	$(this).children().toggleClass('visible');

		if ($(this).parent().find('.field input').prop('type') == "password") {
			$(this).parent().find('.field input').prop('type','text');
		} else {
			$(this).parent().find('.field input').prop('type','password');
		}

    });
}