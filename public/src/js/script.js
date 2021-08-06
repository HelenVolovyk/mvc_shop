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

	
	$(function(){
		$('.load-more').on('click', function(){
			const btn = $(this);
			const loader = btn.find('span');
			$.ajax({
				url: '../../../App/Views/templates/shop/index.php',
				type: 'GET',
				beforeSend: function(){
					btn.attr('disabled', true);
					loader.addClass('d-inline-block');
				},
				success: function(responce){
					setTimeout(function(){
						loader.removeClass('d-inline-block');
						btn.attr('disabled', false);
					}, 1000);
				},
				error: function(){
					alert('Error!');
					loader.removeClass('d-inline-block');
					btn.attr('disabled', false);
				}

			});
		});
	});


	$(document).ready(function(){
		$(".add-to-cart").click(function(){
			var id = $(this).attr("data-id");
			$.post("/cart/addAjax/"+id, {}, function(data){
				$("#cart-count").html(data);
			});
			return true;
		});
	});

// 	$(document).ready(function(){
// $(".sort span").click(function(){
// 	var id = $(this).attr("id");
// 	 alert(id);
// })
// 	});
