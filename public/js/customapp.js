$(window).load(function() {
	$('.container').hide().delay(1000).fadeIn();
	var opts = {
		lines: 13, 			  // The number of lines to draw
		length: 11, 		  // The length of each line
		width: 5, 			  // The line thickness
		radius: 17, 		  // The radius of the inner circle
		corners: 1, 		  // Corner roundness (0..1)
		rotate: 0, 			  // The rotation offset
		color: '#337ab7',	  // #rgb or #rrggbb
		speed: 1, 			  // Rounds per second
		trail: 60, 			  // Afterglow percentage
		shadow: false, 		  // Whether to render a shadow
		hwaccel: false, 	  // Whether to use hardware acceleration
		className: 'spinner', // The CSS class to assign to the spinner
		zIndex: 2e9, 		  // The z-index (defaults to 2000000000)
		top: 'auto', 		  // Top position relative to parent in px
		left: 'auto' 		  // Left position relative to parent in px
	};
	var target = document.createElement("div");
	document.body.appendChild(target);
	var spinner = new Spinner(opts).spin(target);
	iosOverlay({
		text: "Cargando",
		duration: 1e3,
		spinner: spinner
	});
	return false;
});