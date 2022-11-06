<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
@include('taskman.include.popup_form')
@include('taskman.include.popup_taskdetail')
</head>
<body>
@include('taskman.include.header')
    <main id="main">
        <div class="overlay none">
            <div id="sign_box">
                <h2>質問</h2>
                <form method="post" action="{{ url('/add_question') }}">
                @csrf
                    <dl>
                        <dt>質問内容</dt>
                        <dd>
                            <textarea name="q_content" class="q_content"></textarea>
                        </dd>
                        <dt>カリキュラム</dt>
                        <dd>
                            <select name="e_num">
                                <option value="1">No.1 2022_コーディング基礎</option>
                                <option value="2">No.2 2022_JavaScript/jQuery</option>
                                <option value="3">No.3 2022_コーディング応用</option>
                                <option value="4">No.4 2022_PHP基礎/アルゴリズム</option>
                                <option value="5">No.5 2022_DB基礎</option>
                                <option value="6">No.6 2022_PHP応用</option>
                                <option value="7">No.7 2022_PHP自作</option>
                                <option value="8">No.8 2022_Linux基礎/フレームワーク</option>
                                <option value="0">その他</option>
                            </select>
                        </dd>
                        <dd>
                            <button type="submit">登 録</button>
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
        <div class="overlay1 none">
            <div id="sign_box">
                <h2>質問検索</h2>
                <form method="get" action="{{ url('/question') }}">
                @csrf
                    <dl>
                        <dd>
                            <input placeholder="検索したい言葉を入れてください" name="search">
                        </dd>
                        <dd>
                            <button type="submit">登 録</button>
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
        <section class="section" id="todo_section">
            <div class="todo_main" id="task_main">
                <h3>質問</h3>
                <div id="popup">
                    <a>+</a>                    
                </div>
            </div>
            <div class="search_div">
                <ul>
                    <div class="select">
                        <select onChange="location.href=value;">
                            <option>選択</option>
                            <option value='{{ url("/question") }}'>未回答</option>
                            <option value='{{ url("/question?search=1") }}'>すべて</a></option>
                        </select>
                    </div>
                    <div class="search_button" id="popup1">
                        <a id="popup1">🔎</a>
                    </div>
                </ul>
            </div>
            <div>
                <table class="todo_list" id="task_ud">
                    <tr>
                        <th>質問内容</th>
                        <th>カリキュラム番号</th>
                        <th>作成日時</th>
                    </tr>
                @isset($question_list)
                    @foreach($question_list as $question)
                        <tr>
                            <td><a href="/question_detail?id=<?=$question->q_id ?>">{{ $question->question }}</a></td>
                            <td>{{ $question->educare_num }}</td>
                            <td>{{ $question->created_at }}</td>
                        </tr>
                    @endforeach
                @endisset
                </table>
            </div>
        </section>
    </main>
@include('taskman.include.footer')
</body>