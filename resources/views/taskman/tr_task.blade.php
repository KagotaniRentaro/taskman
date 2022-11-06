<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
</head>
<body>
    <main id="main">
        <div class="overlay">
            <div id="sign_box">
                <h2>遷移図</h2>
                <form method="post" action="{{ url('/task') }}">
                @csrf
                    <dl>
                        <dd>
                            @if($judge==0)
                                <input placeholder="遷移元作成" name="task">
                            @elseif($judge==1)
                                <input placeholder="あああ" name="task">
                                <input placeholder="あああ" name="task">
                            @endif
                        </dd>
                        <dd>
                            <button type="submit" id="ajax_show">登　録</button>
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
    </main>
</body>