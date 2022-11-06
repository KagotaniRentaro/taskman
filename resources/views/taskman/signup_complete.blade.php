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
                <div class="su_comp">
                    <p>新規登録完了しました。
                        <br><a href="{{ url('/login') }}">ログインページはこちら</a>
                    </p>
                </div>
            </div>
        </section>
    
      </main>
@include('taskman.include.footer')
</body>