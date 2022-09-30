$(function() {
    function ratingEnable() {       

        $('#example-bootstrap').barrating({
            theme: 'bootstrap-stars',
            showSelectedRating: true,
            initialRating: 4.8,
            hoverState: false,
            onSelect: function(value, text) {
                if (!value) {
                    $('#example-fontawesome-o')
                        .barrating('clear');
                } else {						
					$.ajax({
						url: siteurl+"php/submitrating.php", 
						method: 'post',
						data:'rate='+value,
						success: function(result){
						$("#div1").html(result);
					}});
                    $('.stars-example-fontawesome-o .current-rating')
                        .addClass('hidden');

                    $('.stars-example-fontawesome-o .your-rating')
                        .removeClass('hidden')
                        .find('span')
                        .html(value);
                }
            }
        });

        var currentRating = $('#example-fontawesome-o').data('current-rating');

        $('.stars-example-fontawesome-o .current-rating')
            .find('span')
            .html(currentRating);

        $('.stars-example-fontawesome-o .clear-rating').on('click', function(event) {
            event.preventDefault();

            $('#example-fontawesome-o')
                .barrating('clear');
        });

        $('#example-fontawesome-o').barrating({
            theme: 'fontawesome-stars-o',
            showSelectedRating: true,
            initialRating: 5.0,   
            readonly:false,       
            onSelect: function(value, text) {				
				$.ajax({
					url: siteurl+"php/submitrating.php", 
					method: 'post',
					data:'rate='+value,
					success: function(result){
						$("#rateus").html('Rating Done!');	 
						$("#rateus").addClass('rate-block');
						$(this).barrating({ readonly:true});
						
				}});
					
                if (!value) {
                    $('#example-fontawesome-o')
                        .barrating('clear');
                } else {						
                    $('.stars-example-fontawesome-o .current-rating')
                        .addClass('hidden');

                    $('.stars-example-fontawesome-o .your-rating')
                        .removeClass('hidden')
                        .find('span')
                        .html(value);
                }
            },
            onClear: function(value, text) {
                $('.stars-example-fontawesome-o')
                    .find('.current-rating')
                    .removeClass('hidden')
                    .end()
                    .find('.your-rating')
                    .addClass('hidden');
            }
        });
    }

    function ratingDisable() {
        $('select').barrating('destroy');
    }

    $('.rating-enable').click(function(event) {
        event.preventDefault();

        ratingEnable();

        $(this).addClass('deactivated');
        $('.rating-disable').removeClass('deactivated');
    });

    $('.rating-disable').click(function(event) {
        event.preventDefault();

        ratingDisable();

        $(this).addClass('deactivated');
        $('.rating-enable').removeClass('deactivated');
    });

    ratingEnable();
});
