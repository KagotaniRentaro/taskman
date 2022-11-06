<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(function(){
    $(document).click(function(){
        if (!($('.overlay').hasClass('none'))){
            var a = $(event.target).closest('#sign_box').length;
            var b = $(event.target).closest('#popup').length;
            if (!(a || b)){
                $('.overlay').addClass('none');
                $('#sign_box').removeClass("SlideIN2")
            }
        } else {
            $('#popup').on('click', function(){
                $('.overlay').removeClass('none');
                $('#sign_box').addClass("SlideIN2")
            })
        }
    });
	
	// function slide_click
	function slide_click() {
		
		var slide_class  = $( this ).attr( 'class' );
		var data_slide   = $( this ).attr( 'data-slide' );
		
		
		if ( slide_class.indexOf( 'active' ) !== -1 ) {
			$( 'div.'+ data_slide ).slideUp();
			$( this ).removeClass( 'active' );
		} else {
			$( 'div.'+ data_slide ).slideDown();
			$( this ).addClass( 'active' );
		}
		
	}
	
	
	
	
	$( '.slide-down' ).on( 'click', slide_click );

});
</script>