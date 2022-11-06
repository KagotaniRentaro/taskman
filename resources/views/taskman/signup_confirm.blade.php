<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
</head>
<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
    
          <div class="logo me-auto">
            <h1><a href="index.html">TASKMAN</a></h1>
          </div>
        </div>
    </header><!-- End #header -->
    <main id="main">
        <section class="inner-page">
          <div class="container" id="login">
            <img src="./img/taskman.jpg" id='login_img'>
            <form action="{{ url('/signup_complete') }}" method="post" >
            @csrf
                <p>下記の内容をご確認の上、新規登録ボタンを押してください。<br>内容を訂正する場合は「戻る」を押してください。</p>
                @if ($judge ===0)
                    <p style="color: red;">入力エラーがあります。</p>
                @endif
                <dl class="confirm">
                    <dt>氏名</dt>
                    <dd>{{ $name }}</dd>
                    <dt>メールアドレス</dt>
                    <dd>{{ $email }}</dd>
                    <dt>パスワード</dt>
                    <dd>{{ $password }}</dd>
                    <dd class="signup_button_div">
                        @if ($judge ===1)
                            <button id="signup_confirm_button">新規登録</button>
                        @endif
                        <a onclick=history.back() id="back">戻　る</a>
                    </dd>
                </form>
          </div>
        </section>
    
      </main>
@include('taskman.include.footer')
</body>