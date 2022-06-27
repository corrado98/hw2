<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LogController extends Controller{

public function show(){
if(session('username')!=null){
    return redirect("home");
}else{  
return view('login');}
}

public function checkUtente($username,$password){
$exist=User::where('username', $username)->first();
if($exist  && password_verify($password , $exist->password)){
Session::put('username',$username);    
return 'esiste';}
else if($exist && !password_verify($password , $exist->password)){
return 'pwsbagliata';
}else{
 return 'nonesiste'; 
}
}


public function logout(){

    Session::flush();
    return redirect('login');
}
}