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
            return view('Tasks.homepage', ['Account' => $accountSearch], ['Tasks' => $taskSearch]);
        }

        return redirect(route('index.open'))->with('error', 'Account not found');
    }

    // Create a new task and include username
    public function viewCreateTasks($username){
    $accountSearch = Account::where('username', $username)->first();
        if ($accountSearch) {
            return view('Tasks.create', ['user_data' => $accountSearch],['username' => $username]);
        }
    }
}
