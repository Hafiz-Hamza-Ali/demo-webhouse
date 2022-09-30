$(document).ready(function() {
    $("#slide-nav.navbar .container").append($('<div id="navbar-height-col"></div>'));
    var e = ".navbar-toggle",
        a = "#page-content",
        i = ".navbar-header",
        t = "50%",
        n = "-100%",
        o = "-80%";
    $("#slide-nav").on("click", e, function(e) {
        var l = $(this).hasClass("slide-active");
        $("#slidemenu").stop().animate({
            left: l ? n : "0px"
        }), $("#navbar-height-col").stop().animate({
            left: l ? o : "0px"
        }), $(a).stop().animate({
            left: l ? "0px" : t
        }), $(i).stop().animate({
            left: l ? "0px" : t
        }), $(this).toggleClass("slide-active", !l), $("#slidemenu").toggleClass("slide-active"), $("#page-content, .navbar, body, .navbar-header").toggleClass("slide-active")
    });
    var l = "#slidemenu, #page-content, body, .navbar, .navbar-header";
    $(window).on("resize", function() {
        $(window).width() > 767 && $(".navbar-toggle").is(":hidden") && $(l).removeClass("slide-active")
    });

    $("section.active").load(function(){
        $(".notch-screen").addClass("animated");
    });
    
    // Preloader Portfolio	
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 3000);
});

$(document).ready(function() {
	$('#portfolio').fullpage({
		'verticalCentered': false,
		'css3': false,
		'navigation': true,
		loopTop: true,
		loopBottom: true,
		scrollOverflow: true,
		'navigationPosition': 'left',
		'navigationTooltips': ['1/12', '2/12', '3/12', '4/12', '5/12', '6/12', '7/12', '8/12', '9/12', '10/12', '11/12', '12/12', '13/13'],

		'afterLoad': function(anchorLink, index){
			if(index == 2){
				$('#iphone3, #iphone2, #iphone4').addClass('active');
			}
		},

		'onLeave': function(index, nextIndex, direction){
			if (index == 3 && direction == 'down'){
				$('.sections').eq(index -1).removeClass('moveDown').addClass('moveUp');
			}
			else if(index == 3 && direction == 'up'){
				$('sections').eq(index -1).removeClass('moveUp').addClass('moveDown');
			}

			$('#staticImg').toggleClass('active', (index == 2 && direction == 'down' ) || (index == 4 && direction == 'up'));
			$('#staticImg').toggleClass('moveDown', nextIndex == 4);
			$('#staticImg').toggleClass('moveUp', index == 4 && direction == 'up');
		},
		
		// 'afterRender': function(){
// 			
			// setInterval(function(){
				// $.fn.fullpage.moveSectionDown();						
			// }, 4500);					
		// }
	});
});