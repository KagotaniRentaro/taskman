<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
@include('taskman.include.login_js_validation')
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
            <form action="{{ url('/mypage') }}" method="post" id="form">
            @csrf
                <div class='sign_up'>
                    <p>アカウントをまだお持ちでないですか？
                        <a id="link" href="{{ url('/signup') }}">こちらよりご登録いただけます。</a>
                    </p>
                </div>
                <div class='form_content'>
                    <dl class='error'>
                        @isset($judge)
                            @if ($judge==='e')
                                <p style="color: red;">メールアドレスまたはまたはパスワードが間違っています。</p>
                            @endif
                        @endisset
                        <dt>
                            <label for="email">Email</label>
                        </dt>
                        <dd>
                            <input placeholder="test@test.co.jp" name="email" value='{{ session('email') }}'>
                            <p class="is-error-email"></p>
                        </dd>
                        <dt>
                            <label for="password">パスワード</label>
                        </dt>
                        <dd class="pass">
                            <input name="password"  type='password'>
                            <p class="is-error-password"></p>
                            <a href="{{ url('/repassword') }}">パスワードを忘れた場合</a>
                        </dd>
                        <dd>
                            <button id="login_button">ログイン</button>
                        </dd>
                        {{-- <div id="guest">
                            <a id="link">ゲストとしてログインする方はこちら</a>
                        </div> --}}
                    </dl>
                </div>
            </form>
          </div>
        </section>
    
      </main>
@include('taskman.include.footer')
</body>