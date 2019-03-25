function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function soLetras(v){
    return v.replace(/\d/g,"") //Remove tudo o que não é Letra
}
function mobileNavigation(e) {
	$(e).toggleClass('is-active');
    $('.mobile-navigation .navigation').toggleClass('toggle');
}
function closeMenu() {
	$('.toggle').removeClass('toggle'),
	$('.is-active').removeClass('is-active'); 
}
$(window).on("resize",function(o){
	closeMenu();
});
$(document).mouseup(function (e)
{
    var container = $('.mobile-navigation').children();

    if (!container.is(e.target) 
        && container.has(e.target).length === 0)
    {
        closeMenu();
    }
});  
$(document).ready(function () {
	$('.telefone').mask('(00) 00000-0000');
	$('.owl-carousel').owlCarousel({
		touchDrag:false,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
	    loop:false,
	    items:1,
	    nav:false
	});
});
      
      