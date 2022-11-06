<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
@include('taskman.include.signup_js_validation')
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
            <form action="{{ url('/signup_confirm') }}" method="post" id="form">
            @csrf
                <div class='form_content'>
                    <dl class='error'>
                        <dt>
                            <label for="name">名前</label>
                            <span class="required">*</span>
                        </dt>
                        <dd>
                            <input placeholder="山田太郎" name="name" value='{{ session('name') }}'>
                            <p class="is-error-name"></p>
                        </dd>
                        <dt>
                            <label for="email">Email</label>
                            <span class="required">*</span>
                        </dt>
                        <dd>
                            <input placeholder="test@test.co.jp" name="email" value='{{ session('email') }}'>
                            <p class="is-error-email"></p>
                            @isset($judge)
                                @if ($judge==='e')
                                    <p style="color: red;">このメールアドレスは既に登録されています。</p>
                                @endif
                            @endisset
                        </dd>
                        <dt>
                            <label for="password">パスワード</label>
                            <span class="required">*</span>
                        </dt>
                        <dd class="pass">
                            <input name="password" value='{{ session('password') }}'>
                            <p class="is-error-password"></p>
                        </dd>
                        <dd>
                            <button id="login_button">新規登録</button>
                        </dd>
                        <div id="guest">
                            <a id="link" href="{{ url('/login') }}">ログインページはこちら</a>
                        </div>
                    </dl>
                </div>
            </form>
          </div>
        </section>
    
      </main>
@include('taskman.include.footer')
</body>