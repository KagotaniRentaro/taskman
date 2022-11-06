<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDB;
use App\Models\ToDo;
use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\Transition;
use App\Models\Question;

class TaskmanController extends Controller
{
    public function test() {
        $users = UserDB::all();
        return view('taskman.test', compact('users'));
    }

    public function signup_confirm(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        session([
            'name' =>$name,
            'email' =>$email,
            'password' =>$password
        ]);

        if (empty($name) || mb_strlen($name) > 11 ){
            $judge=0;
        } elseif (empty($email) || !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $email)){
            $judge=0;
        } elseif (empty($password)){
            $judge=0;
        } else {$judge=1;}

        $countEmail = UserDB::whereEmail($email)->count();
        if ($countEmail>0){
            $judge='e';
            return view('taskman.signup', ['judge' => $judge]);
        }

        return view('taskman.signup_confirm', [
            'judge' => $judge,
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function signup_complete() {
        
        $name = session('name');
        $email = session('email');
        $password = session('password');

        UserDB::create(['name'=>$name, 'email'=>$email, 'password'=>$password]);

        session()->flush();

        return view('taskman.signup_complete');
    }

    public function get_mypage() {
        if(empty(session('id'))){
            return view('taskman.login');
        }
        $todo_list = ToDo::where([
            ['user_id', '=', session('id')],
            ['complete', '=', 0],
        ])->get();

        $task_list = Task::where([
            ['user_id', '=', session('id')],
            ['del_flg', '=', 0]
        ])->get();

        $q_list = Question::where([
            ['user_id', '=', session('id')],
            ['resolution_flg', '=', 0]
        ])->get();
        return view('taskman.mypage', compact('todo_list', 'task_list', 'q_list'));
    }

    public function post_mypage(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $matchThese = ['email' => $email, 'password' => $password];
        $results = UserDB::where($matchThese)->count();
        if($results===1){
            $user_info = UserDB::where($matchThese)->first();
            $name = $user_info -> name;
            $id = $user_info -> id;
            $team_id = $user_info -> team_id;
            session()->flush();
            if(empty($team_id)){
                session([
                    'name' => $name,
                    'id' => $id,
                ]);
            }else{
                session([
                    'name' => $name,
                    'id' => $id,
                    'team_id' => $team_id,    
                ]);
            }
        }else{
            $judge='e';
            return view('taskman.login', ['judge' => $judge]);
        }

        date_default_timezone_set('Asia/Tokyo');
        $date = date('Y-m-d H:i:s');

        UserDB::whereId($id)->update([
            'login' => $date,
        ]);

        return redirect('/mypage');
    }

    public function logout() {
        session()->flush();
        return redirect('/login');    
    }

    public function post_todo(Request $request) {
        $todo = $request->input('todo');
        
        date_default_timezone_set('Asia/Tokyo');
        $date = date('Y-m-d H:i:s');

        ToDo::create(['user_id'=>session('id'), 'created_at'=>$date, 'content'=>$todo]);
        return redirect('/todo');  
    }

    public function complete_todo(Request $request) {
        $id = $request->input('id');
        ToDo::whereId($id)->update(['complete' => 1]);
        return redirect('/todo');
    }

    public function get_todo() {
        if(empty(session('id'))){
            return view('taskman.login');
        }
        $name = session('name');
        $id = session('id');

        if(empty($team_id)){
            session([
                'name' => $name,
                'id' => $id,
            ]);
        }else{
            session([
                'name' => $name,
                'id' => $id,
                'team_id' => session('team_id'),    
            ]);
        }

        $todo_list = ToDo::whereComplete(0)->get();
        $todo_list_comp = ToDo::whereComplete(1)->get();
        return view('taskman.todo', compact('todo_list', 'todo_list_comp'));
    }

    public function post_task(Request $request) {
        $task = $request->input('task');

        Task::create(['user_id'=>session('id'), 'content'=>$task]);
        return redirect('/task');  
    }

    public function get_task() {
        if(empty(session('id'))){
            return view('taskman.login');
        }
        $name = session('name');
        $id = session('id');

        if(empty($team_id)){
            session([
                'name' => $name,
                'id' => $id,
            ]);
        }else{
            session([
                'name' => $name,
                'id' => $id,
                'team_id' => session('team_id'),    
            ]);
        }

        $task_list = Task::whereDel_flg(0)->get();
        return view('taskman.task', compact('task_list'));
    }

    public function task_delete(Request $request) {
        $id = $request->input('id');
        Task::whereTask_id($id)->update(['del_flg' => 1]);
        return redirect('/task');
    }

    public function taskdetail(Request $request) {
        $file = $request->input('file');
        $function = $request->input('function');
        $task_id = $request->input('task_id');

        TaskDetail::create(['file'=>$file, 'function'=>$function, 'task_id'=>$task_id]);
        return redirect('/task');  
    }

    public function transition(Request $request) {
        $id = $request->task;
        session(['task_id' => $id]);

        if(Transition::where('taskdetail_id', $id)->exists()){
            $judge = 0;
        }else{$judge = 1;}  

        return view('taskman.tr_task', ['task_id' => $id, 'judge' => $judge]);
    }

    public function question(Request $request) {
        if(empty(session('id'))){
            return view('taskman.login');
        }
        $name = session('name');
        $id = session('id');

        if(empty($team_id)){
            session([
                'name' => $name,
                'id' => $id,
            ]);
        }else{
            session([
                'name' => $name,
                'id' => $id,
                'team_id' => session('team_id'),    
            ]);
        }

  
        $search = $request->search;
        if($search==1){
            $question_list = Question::where([
                ['team_id', '=', session('team_id')],
            ])->get();
            return view('taskman.question', compact('question_list'));
        }elseif(is_string($search)){
            $question_list = Question::where([
                ['team_id', '=', session('team_id')],
                ['question', 'LIKE', "%{$search}%"]
            ])->get();
            return view('taskman.question', compact('question_list'));
        }

        $question_list = Question::where([
            ['team_id', '=', session('team_id')],
            ['resolution_flg', '=', 0],
        ])->get();
        
        return view('taskman.question', compact('question_list'));
    }

    public function add_question(Request $request) {
        $question = $request->input('q_content');
        $num = $request->input('e_num');
        date_default_timezone_set('Asia/Tokyo');
        $date = date('Y-m-d H:i:s');

        Question::create([
            'team_id' => 1,
            'user_id' => session('id'),
            'question' => $question,
            'educare_num' => $num,
            'created_at' => $date,
            ]
        );
        return redirect('/question');  
    }

    public function question_detail(Request $request) {
        $id = $request->id;
        $question = Question::whereQ_id($id)->get();

        return view('taskman.question_detail', compact('question'));
    }

    public function answer(Request $request) {
        $id = $request->id;
        $answer = $request->answer;

        Question::whereQ_id($id)->update([
            'answer' => $answer,
            'resolution_flg' => 1,
        ]);

        return redirect("/question_detail?id={$id}");
    }

    public function admin() {
        $team_id = 1;
        $user_list = UserDB::whereTeam_id($team_id)->get();

        return view('taskman.admin', compact('user_list'));
    }

    public function repass(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $results = UserDB::whereEmail($email)->count();
        
        if($results==0){
            $judge='e1';
            return view('taskman.repassword', ['judge' => $judge]);
        }else{
            UserDB::whereEmail($email)->update(['password' => $password]);
        }

        return view('taskman.repass_comp');
    }
}