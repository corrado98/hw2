<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller{

public function show(){
if(session('username')!=null){
    return view('home')->with('csrf_token',csrf_token());
}else{  
    return view('login');}
}

public function red(){
    if(session('username')!=null){
        return view('home');
    } else {
    return view("login");}
}

public function cerca($evento, $nazione, $data){
 
    $key= env('API_KEY_EVENTS');
    $d_0="T00:00:00Z";
    //se la data è inserita
    if(strcmp($data,$d_0)!==0){
    if($nazione !== 'no'){
    $dati = array("keyword" => $evento, "startDateTime" => $data,"countryCode"=>$nazione, "apikey"=>$key, "locale"=>'*');
    $dati = http_build_query($dati);
    }else{
         $dati = array("keyword" => $evento, "startDateTime" => $data, "apikey"=>$key, "locale"=>'*');
        $dati = http_build_query($dati);
    }
    }
    //se la data non è inserita
    else{
        if($nazione !== 'no'){
            $dati = array("keyword" => $evento,"countryCode"=>$nazione, "apikey"=>$key, "locale"=>'*');
            $dati = http_build_query($dati);
            }else {
                $dati = array("keyword" => $evento,"apikey"=>$key, "locale"=>'*');
                $dati = http_build_query($dati);
            } 
    }
    
    $curl= curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://app.ticketmaster.com/discovery/v2/events.json?".$dati);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result= curl_exec($curl);
    return $result ;
    curl_close($curl);

}


}

