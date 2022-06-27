<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller{


    public function account(){

        if(session('username')!=null){
            $user = session('username');
            $info = User::where('username', $user)->first();
            return view('account')->with('username', $user)->with('name', $info->name)->with('surname', $info->surname)->with('email', $info->email)->with('n_pr', $info->n_pr);
        }
        else{  
            return view('login');}
        }
    }
