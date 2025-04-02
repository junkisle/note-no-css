<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }
    public function viewLogin(){
        return view('Authenticate.Login');
    }
    public function viewSignup(){
        return view('Authenticate.Signup');
    }
    public function viewMain(Request $request){
        $username = $request->query('username');
        $account = Account::where('username', $username)->first();

        return view('main', ['Account' => $account]); 
    }

    // Insert signup details
    public function signup(Request $request){
        $data = $request->validate([
            'username' => 'required|unique:Accounts,username',
            'password' => 'required',
        ]);

        $newAccount = Account::create($data);
        if($newAccount){
            return redirect(route('signup.open'))->with('success', 'Account created successfully');
        }
        else
            return redirect(route('signup.open'))->with('success', 'Error');
    }

    // Login registered account
    public function login(Request $request){
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $loginAccount = Account::where('username', $data['username'])->first();

        if($loginAccount && $loginAccount->password === $data['password']){
            return redirect(route('main.open', ['username' => $loginAccount->username]));
        }
        else{
            return redirect(route('login.open'))->with('success', 'account does not exist');
        }
    }
}
