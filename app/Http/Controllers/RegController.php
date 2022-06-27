<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class RegController extends Controller {
    
public function show(){ return view('regi');}

public function checkUsername($username){

    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $username)) {
        echo "Usernamenonvalido";
    }else{
     $exist=User::where('username', $username)->first();
     if($exist){return 'userutilizzato';
     }else{
     return 'ok';
     }
    }
}

public function checkEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Emailnonvalida";
     }else{
        $exist=User::where('email', $email)->first();
        if($exist){return 'emailutilizzata';
        }else {
        return 'ok';
        }
    }
}

public function register(){
$request=request();
$password = password_hash($request -> password , PASSWORD_BCRYPT);

if(User::create([
    'username'=> $request->username,
    'password'=> $password,
    'email'=> $request->email,
    'name'=> $request->nome,
    'surname'=> $request->cognome
])==true) { return redirect('login')->with('ok','ok')->with('csrf_token',csrf_token()); }
}

}