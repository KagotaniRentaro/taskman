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
        <div class="overlay">
            <div id="sign_box">
                <h2>質問</h2>
                <form method="post" action="{{ url('/answer') }}">
                @csrf
                    <dl>
                    @foreach($question as $q)
                        <dt>質問内容</dt>
                        <dd>{{ $q->question }}</dd>
                        <dt>カリキュラム番号</dt>
                        <dd>{{ $q->educare_num }}</dd>
                        <dt>質問日時</dt>
                        <dd>{{ $q->created_at }}</dd>
                        @isset($q->answer)
                            <dt>回答</dt>
                            <dd>{{ $q->answer }}</dd> 
                        @else
                            <dt>回答</dt>
                            <dd><textarea name="answer" class="q_content"></textarea></dd>
                            <dd>
                                <input type="hidden" name="id" value="{{ $q->q_id }}">
                                <button type="submit">登 録</button>
                            </dd>
                        @endempty
                    @endforeach
                    </dl>
                </form>
            </div>
        </div>
    </main>
</body>