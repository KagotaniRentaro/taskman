<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
</head>
<body>
@include('taskman.include.header')
    <main id="main">
        <section class="section" id="mypage_section1">
            <div class="mypage_todo"">
                <h3>User一覧</h3>
                <table class="todo_list">
                    <tr>
                        <th>名前</th>
                        <th>取り組みタスク</th>
                        <th>ログイン</th>
                    </tr>
                @foreach($user_list as $user)
                    @php
                        $task = App\Models\Task::whereUser_id($user->id)->whereDel_flg(0)->first(['content'])
                    @endphp
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>カリキュラム5-1</td>
                        <td>{{ $user->login }}</td>
                    </tr>
                @endforeach
                </table>
            </div>
        </section>
    </main>
@include('taskman.include.footer')
</body>