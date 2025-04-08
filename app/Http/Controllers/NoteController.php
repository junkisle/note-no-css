<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Include user account details
use App\Models\Account;
use App\Models\Note;


class NoteController extends Controller
{
    public function viewNotes($username){

        $accountSearch = Account::where('username', $username)->first();
        $noteSearch = Note::where('username', $username)->get();
        
        if($accountSearch){
            return view('Notes.homepage', 
            ['Account' => $accountSearch,
            'Notes' => $noteSearch,
            'username' => $username]);
        }
        
    }

    public function viewCreateNotes($username){

        $accountSearch = Account::where('username', $username)->first();

        return view('Notes.create', 
            ['username' => $username],
            ['Account' => $accountSearch]);
    }
    
    public function submitNotes(Request $request, $username){
        $data = $request->validate([
            'username' => 'required',
            'title' => 'required|unique',
            'description' => 'nullable',
            'content' => 'required'
        ]);

        $insertNote = Note::create($data);

        if($insertNote){
            return redirect(route('notes.open', 
                ['username' => $username]));
        }
    }

    public function viewEditNotes($title){

        $noteSearch = Note::where('title', $title)->first();

        return view('Notes.edit',
            ['username' => $noteSearch->username,
            'note' => $noteSearch]);
    }

    public function editNotes(Note $note, Request $request){
        $accountSearch = Account::where('username', $request->username)->first();

        $data = $request->validate([
            'username' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'content' => 'required'
        ]);

        $note->update($data); 

        return redirect(route(
            'notes.open',
            [
                'username' => $accountSearch->username,
            ]));
    }

    public function deleteNotes(Note $note){
        $username = $note->username;
        $note->delete();

        return redirect(route('notes.open', ['username' => $username]));
    }
    
}
