jQuery(document).ready(function($){
	
	$('#content').masonry({
		itemSelector: '.news-item',
		// set columnWidth a fraction of the container width
		columnWidth: function( containerWidth ) {
			console.log('containerWidth: ' + containerWidth);
			if(containerWidth<700) {
				columns = 2;
			} else if(containerWidth<500) {
				columns = 1;
			} else {
				columns = 3;
			}
			return containerWidth / columns;
		}
	});
	
	var spanWidth4 = 0;
	var spanWidth8 = 0;
	span4obj = $('div#wrapper div.row-fluid.single div.span4');
	span8obj = $('div#wrapper div.row-fluid.single div.span8');
	
	$('div#wrapper div.row-fluid.single div.span4').stop(true, true).hover( function() {
		
		spanWidth4 = $(span4obj).outerWidth();
		spanWidth8 = $(span8obj).outerWidth();
		spanWidth4 = "31.6239%";
		spanWidth8 = "65.812%";
		spanWidth4 = $(span4obj).css('width');
		spanWidth8 = $(span8obj).css('width');
		console.log(spanWidth4 + " | " + spanWidth8);
		
		$(span4obj).stop(true, true).animate({
			width : spanWidth8
		});
		
		$(span4obj).find('img').stop(true, true).animate({
			marginLeft: "0%"
		}, 'normal', 'swing');
		
		$(span8obj).stop(true, true).animate({
			width : spanWidth4
		});
	}, function() {
		$(span4obj).stop(true, true).animate({
			width : spanWidth4
		}, function() {
			$(this).removeAttr('style');
		});
		
		$(span4obj).find('img').stop(true, true).animate({
			marginLeft: "-70%"
		}, 'normal', 'swing');
		
		$(span8obj).stop(true, true).animate({
			width : spanWidth8
		}, function() {
			$(this).removeAttr('style');
		});
	});

});