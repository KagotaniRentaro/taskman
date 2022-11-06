<!DOCTYPE html>
<html lang="ja">
<head>
@include('taskman.include.head')
@include('taskman.include.popup_form')
@include('taskman.include.popup_taskdetail')
    <script language="JavaScript" type="text/javascript">
    function openWin(url){
        遷移図 = window.open(`/transition?task=${url}`,"遷移図","width=820,height=600,scrollbars=yes,status=no,toolbar=no,location=no,menubar=no,directories=no,resizable=yes");
        遷移図.focus();
    }
    </script>
</head>
<body>
@include('taskman.include.header')
    <main id="main">
        <div class="overlay none">
            <div id="sign_box">
                <h2>タスク登録</h2>
                <form method="post" action="{{ url('/task') }}">
                @csrf
                    <dl>
                        <dd>
                            <input placeholder="タスク入力" name="task">
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
                <h3>タスク</h3>
                <div id="popup">
                    <a>+</a>                    
                </div>
            </div>
            <div>
            @foreach($task_list as $task)
                @php
                   $i= $loop->iteration
                @endphp 
                <div class="task_list">
                    <p class="task_ud">・{{ $task->content }}</p>
                    <div class='task_button'>
                        <input value="詳細追加" type="submit" id="todo_input" class="slide-down" data-slide="slide-{{$i}}">
                        <form action="{{ url('/todo_delete') }}" method='post' onsubmit='return confirm_test()'>
                        @csrf
                            <input type='submit' value='編集' id="todo_input">
                            <input type='hidden' name='id' value={{ $task->task_id }}>
                        </form>
                        <form action="{{ url('/task_delete') }}" method='post' onsubmit='return confirm_test()'>
                        @csrf
                            <input type='submit' value='完了' id="todo_input">
                            <input type='hidden' name='id' value={{ $task->task_id }}>
                        </form>
                        
                    </div>
                </div>
                <div class="slide-{{$i}}">
                    <div id="task_list">
                        <table class="todo_list" id="task_ud">
                            <tr>
                                <th>タスク詳細名</th>
                                <th>機能</th>
                            </tr>
                        @php
                            $taskdetail_list = App\Models\TaskDetail::whereTask_id($task->task_id)->get()
                        @endphp
                        @foreach($taskdetail_list as $taskdetail)
                            <tr>
                                <td>{{ $taskdetail->file }}</td>
                                <td>{{ $taskdetail->function }}</td>
                                <td>
                                    <input type='submit' value='遷移図' href="javascript:void(0);" onclick="openWin({{ $taskdetail->taskdetail_id }})">
                                </td>
                            </tr>
                            <script>
                                const url = '{{$taskdetail->task_detail_id}}';
                            </script>  
                        @endforeach
                        </table>
                        <form method="post" action="{{ url('/taskdetail') }}">
                        @csrf
                            <dl>
                                <dd>
                                    <input placeholder="タスク詳細名" name='file'>
                                    <input type='hidden' name='task_id' value={{ $task->task_id }}>
                                </dd>
                                <dd>
                                    <textarea placeholder="機能" name='function'></textarea>
                                </dd>
                                <dd>
                                    <button id="taskdetail_button">登　録</button>
                                </dd>
                            </dl>
                        </form>
                    </div>
                </div>
            @endforeach
            </div>
        </section>
    </main>
@include('taskman.include.footer')
</body>