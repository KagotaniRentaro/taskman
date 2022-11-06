<script>
    $(function(){
        $(document).click(function(){
            if (!($('.overlay1').hasClass('none'))){
                var a = $(event.target).closest('#sign_box').length;
                var b = $(event.target).closest('#popup1').length;
                if (!(a || b)){
                    $('.overlay1').addClass('none');
                    $('#sign_box').removeClass("SlideIN2")
                }
            } else {
                $('#popup1').on('click', function(){
                    $('.overlay1').removeClass('none');
                    $('#sign_box').addClass("SlideIN2")
                })
            }
        });
    });
    </script>