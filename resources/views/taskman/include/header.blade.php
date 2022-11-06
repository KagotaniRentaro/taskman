<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto" id="logo">
        <h1><a href="index.html">TASKMAN</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a href="#"><span>メニュー</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('/mypage') }}">マイページ</a></li>
              <li><a href="{{ url('/todo') }}">ToDo</a></li>
              <li><a href="{{ url('/task') }}">タスク</a></li>
              <li><a href="{{ url('/question') }}">質問</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ url('/logout') }}">ログアウト</a></li>
          <li><a class="nav-link scrollto">ログイン：{{ session('name') }} </a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header><!-- End #header -->