$(document).ready(function($) {
	
	// Global back button
	$('#back').bind('click', function(event){
		window.history.back();
		$(form)[0].reset();
	});

	// search
	$('#submit-catalog').click(function() {
		var txt = $('#query').val();
		if(txt) $('form#search-catalog').submit();
		else return false;
    });

});