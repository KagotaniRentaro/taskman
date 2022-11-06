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
                <h3>ToDo</h3>
                <a href="{{ url('/todo') }}"></a>
                <table class="todo_list">
                @foreach($todo_list as $todo)
                    <tr>
                        <td>・{{ $todo->content }}</td>
                        <td>{{ $todo->created_at }}</td>
                    </tr>
                @endforeach
                </table>
            </div>
            <div class="mypage_task">
                <h3>タスク</h3>
                <a href="{{ url('/task') }}"></a>
                <table class="todo_list">
                @foreach($task_list as $task)
                    <tr>
                        <td>・{{ $task->content }}</td>
                        <td>{{ $task->created_at }}</td>
                    </tr>
                @endforeach
                </table>
            </div>
        </section>
        <section class="section">
            <div class="mypage_question">
                <h3>質問</h3>
                <a href="{{ url('/question') }}"></a>
                <table class="todo_list">
                @foreach($q_list as $q)
                <tr>
                    <td>{{ $q->question }}</td>
                    <td>{{ $q->created_at }}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </section>
    </main>
@include('taskman.include.footer')
</body>
