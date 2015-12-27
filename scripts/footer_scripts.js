$(function() {

    var slideUp = function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            console.log('At bottom!!');
            //toggle the handlers
            $(".footer_row").slideDown(function() {
                $(window).off('scroll', slideUp).on('scroll', slideDown);
            });
        }
    };

    var slideDown = function() {
        if ($(window).scrollTop() + $(window).height() < $(document).height()) {
            //toggle the handlers
            $(".footer_row").slideUp(function() {
                $(window).off('scroll', slideDown).on('scroll', slideUp);
            });
        }
    };


    $(window).on('scroll', slideUp);
});​

$(function(){
	var SlideUp = function(){
		$(".header_table").scroll(function(){
			$(".footer_row").slideDown();
		});
	}
});
