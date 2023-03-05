window.addEventListener("load", function(){
	slider();
});
function slider(){
	// Right To Left
	TweenLite.to('.slider', 0.5, {height:"100%", ease:Ease.easeOut});
	TweenLite.to('.slider', 0, { width: "100%", delay:0.5, ease: Power4.easeInOut});
	TweenLite.to('.slider', 0, { width: "1.4em", left:'0', right:'initial', delay:1, ease: Power4.easeInOut, onComplete:rtl});
    TweenLite.to('.slider', 0.1, {width:"1.4em", height:'0%', delay:'1.5',ease:Ease.linear});
	// // Left To Right 
	// TweenLite.to('.slider', 0, {width:"100%", delay:'4.5', ease: Power4.easeInOut, onComplete:ltr});
	// TweenLite.to('.slider', 0, {width:"1.4em", left:'initial', right:'0', delay:'5'});
	// TweenLite.to('.slider', 0.1, {width:"1.4em", height:'0%', delay:'5.5',ease:Ease.easeOut});

	function rtl(){ TweenLite.to('.slider__text', 0 , {opacity:'1', delay:'0'}); }
	function ltr(){ TweenLite.to('.slider__text', 0.5 , {opacity:'1', delay:'0.2'}); }
}










