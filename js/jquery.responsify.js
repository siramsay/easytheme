jQuery(function($){
	$(document).ready(function(){
		
	//toggle nav	
	$("#menu-icon").click(function(){
		//alert("hi")
		$('#mob-menu .links').slideToggle()
		// $('#mob-menu .menu').slideToggle()
		$(this).addClass('active-menu-top');
	});
	
	//toggle #search_top
	$("#search-icon").click(function(){
		//alert("hi")
		$('#search_top').slideToggle();
		//$(this).addClass('active-menu-top');
	});
	
	// Prefill the search box with Search... text.
	$('#block-search-form input:text').autofill({
    value: "Search..."
  	});
	
	//toggle #overview_inner
	$("#more-icon").click(function(){
		//alert("hi")''
		$('#overview_inner').attr( 'style', 'height: auto; padding-bottom: 80px;' )
		$("#more-icon").remove()
		//$('#overview_inner:after').remove()
		//$(this).addClass('active-menu-top');
	});
	
	//back to top
	//$('#back-to-top').scrollTop( 300 );
	
	//scroll to top
	//hide or show the "back to top" link
	
	$scroll_to_top = $('.back-to-top');
	
	$(window).scroll(function(){
		( $(this).scrollTop() > 300 ) ? $scroll_to_top.addClass('btt-is-visible') : $scroll_to_top.removeClass('btt-is-visible');
	});
	
	
	$scroll_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, 1000
		);
	});

	
	
	//remove img height and width attributes for better responsiveness
	$('img').each(function(){
		$(this).removeAttr('width')
		$(this).removeAttr('height')
	});
		
	}); // END doc ready
}); // END function