$('.single-item').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
});

$(document).ready(function(){
	if ($(".courses-page .content-block img.size-full").length) {
		$(".courses-page .content-block img.size-full").each(function(){
			$(this).wrap("<div class='img-wrap'></div>")
		})
	}
})