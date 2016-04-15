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
	
	//remove img height and width attributes for better responsiveness
	$('img').each(function(){
		$(this).removeAttr('width')
		$(this).removeAttr('height')
	});
		
	}); // END doc ready
}); // END function