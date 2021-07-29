$(document).ready(function(){
	$('.header__burger').click(function(event){
		$('.header__burger, .header__menu').toggleClass('active');
		 $('body').toggleClass('lock');
	});
});


function ibg(){

	let ibg=document.querySelectorAll(".ibg");
	for (var i = 0; i < ibg.length; i++) {
	if(ibg[i].querySelector('img')){
	ibg[i].style.backgroundImage = 'url('+ibg[i].querySelector('img').getAttribute('src')+')';
	}
	}
	}
	
ibg();

	
	$(document).ready(function(){
		$('.ac-block__title').click(function(event){
			if($('.ac-block').hasClass('one')){
				$('.ac-block__title').not($(this)).removeClass('active');
				$('.ac-block__text').not($(this).next()).slideUp(300);
			}
			$(this).toggleClass('active').next().slideToggle(300);
			 
		});
	});