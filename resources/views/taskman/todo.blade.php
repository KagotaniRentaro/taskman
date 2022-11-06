<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
@include('taskman.include.popup_form')
</head>
<body>
@include('taskman.include.header')
    <main id="main">
        <div class="overlay none">
            <div id="sign_box">
                <h2>ToDo登録</h2>
                <form method="post" action="{{ url('/todo') }}">
                @csrf
                    <dl>
                        <dd>
                            <input placeholder="ToDo入力" name="todo">
                        </dd>
                        <dd>
                            <button type="submit">登 録</button>
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
        <section class="section" id="todo_section">
            <div class="todo_main">
                <h3>ToDoリスト</h3>
                <div id="popup">
                    <a>+</a>                    
                </div>
            </div>
            <table class="todo_list">
            @foreach($todo_list as $todo)
                <tr>
                    <td>・{{ $todo->content }}</td>
                    <td>{{ $todo->created_at }}</td>
                    <td class='ud' id="ud">
                        <form action="{{ url('/todo_complete') }}"" method='post'>
                        @csrf
                            <input type='submit' value='完了' id="todo_input">
                            <input type='hidden' name='id' value={{ $todo->id }}>
                        </form>
                    </td>
                    <td class='ud'>
                        <form action="{{ url('/todo_delete') }}" method='post' onsubmit='return confirm_test()'>
                        @csrf
                            <input type='submit' value='削除' id="todo_input">
                            <input type='hidden' name='id' value={{ $todo->id }}>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </section>
        <section class="section" id="todo_section2">
            <div class="todo_main">
                <h3>完了済みToDo</h3>
            </div>
            <table class="todo_list">
            @foreach($todo_list_comp as $todo)
                <tr>
                    <td>・{{ $todo->content }}</td>
                    <td>{{ $todo->created_at }}</td>
                    <td class='ud' id="ud"></td>
                    <td class='ud'></td>
                </tr>
            @endforeach
            </table>
        </section>
    </main>
@include('taskman.include.footer')
</body>