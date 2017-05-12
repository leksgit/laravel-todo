<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Task, TaskToUser, User
};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(auth()->id());
        if (!$request->get('closed')){
            $btn_show = [
                'text' => 'Show all',
                'js' => 'window.location=\'?closed=true\''
            ];
            $tasks = $user->tasks()->get()->filter(function($tasks)
            {
                return ($tasks->status < 2)? true : false;
            });
        }else{
            $btn_show = [
                'text' => 'Show works',
                'js' => 'window.location=\'\home\''
            ];

            $tasks = $user->tasks()->get();
        }

        return view('task.index', [
            'tasks' => $tasks,
            'btn_show' => $btn_show,
        ]);
    }
}
