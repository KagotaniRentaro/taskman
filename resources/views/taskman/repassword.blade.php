<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
@include('taskman.include.repass_js_validation')
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
            <form action="{{ url('/repass_comp') }}" method="post" id="form">
            @csrf
                <div class='form_content'>
                    @isset($judge)
                            @if ($judge==='e1')
                                <p style="color: red;">メールアドレスが間違っています。</p>
                            @endif
                    @endisset
                    <dl class='error'>
                        <dt>
                            <label for="email">Email</label>
                        </dt>
                        <dd>
                            <input placeholder="test@test.co.jp" name="email" value='{{ session('email') }}'>
                            <p class="is-error-email"></p>
                        </dd>
                        <dt>
                            <label for="password">新しいパスワード</label>
                        </dt>
                        <dd class="pass">
                            <input name="password"  type='password' id="password">
                            <p class="is-error-password"></p>
                        </dd>
                        <dt>
                            <label for="password">パスワード確認用</label>
                        </dt>
                        <dd class="pass">
                            <input name="conf_password"  type='password'>
                            <p class="is-error-conf_password"></p>
                        </dd>
                        <dd>
                            <button id="login_button">パスワード再発行</button>
                        </dd>
                    <div id="guest">
                        <a href="{{ url('/login') }}">ログインページはこちら</a>
                    </div>
                    </dl>
                </div>
            </form>
          </div>
        </section>
    
      </main>
@include('taskman.include.footer')
</body>