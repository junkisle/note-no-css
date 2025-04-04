<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Include user account details
use App\Models\Account;

use App\Models\Task;


class TaskController extends Controller
{   
    // View task homepage along with passing the task and user details
    public function viewTasks($username) {
    $accountSearch = Account::where('username', $username)->first();
    $taskSearch = Task::where('username', $username)->get();

        if ($accountSearch) {
            return view('Tasks.homepage', 
            ['Account' => $accountSearch], 
            ['Tasks' => $taskSearch],
            ['username' => $username]);
        }

        return redirect(route('index.open'))->with('error', 'Account not found');
    }

    // Create a new task and include username
    public function viewCreateTasks($username){
    $accountSearch = Account::where('username', $username)->first();
        if ($accountSearch) {
            return view('Tasks.create', 
            ['user_data' => $accountSearch],
            ['username' => $username]);
        }
    }

    public function submitTasks(Request $request, $username){
        $data = $request->validate([
            'username' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]); 

        $insertTask = Task::create($data);
        $account = Account::where('username', $username)->first();

        if($insertTask){
            return redirect(route('tasks.open', 
            ['username' => $username]
            ))->with('success', 'Account created successfully');
        }
    }

    public function updateTasks(Task $task, Request $request){
        $data = $request->validate([
            'status' => 'required'
        ]);

        // get username from task brought by $task from homepage 
        $username = $task->username;

        // update task status brought by $task from homepage
        $task->update($data);

        // Look for the account data through $username taken from $task->username which originated from homepage status
        $accountSearch = Account::where('username', $username)->first();
        $taskSearch = Task::where('username', $username)->get();

        if ($accountSearch) {
            return redirect(route('tasks.open', 
                ['username' => $username]));
        }
            return view('Tasks.homepage', 
                ['Account' => $accountSearch]);
    }
}
