<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
<script>
$(function(){

    // バリデーション
    $('#form').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
            },
            conf_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            email: {
                required: 'メールアドレスを入力してください。',
                email: '「~~@~~」で入力してください。'
            },
            password: {
                required: 'パスワードを入力してください。',
                minlength: 'パスワードは8字以上で入力してください。',
            },
            conf_password: {
                required: 'パスワード確認用を入力してください。',
                equalTo: '上記に入力した内容と異なります。ご確認ください。’,
            }
        },
        errorPlacement: function(error, element){
            var name = element.attr('name');
            error.appendTo($('.is-error-'+name));
        },
        
        errorElement: "span",
        errorClass: "is-error",
    });
});
</script>