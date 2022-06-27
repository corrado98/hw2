<?php

namespace App\Http\Controllers;
use App\Models\Pref;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PrefController extends Controller{

public function aggiungi(){
    $cred = json_decode(file_get_contents('php://input'), true);
    $user = session('username');

    $evento=$cred['titolo'];
   
    $luogo=$cred['luogo'];
    $ora=$cred['ora'];
    $data=$cred['data']; $immagine=$cred['immagine'];
    $info=$cred['url'];
    
    $exist= Pref::where('user', $user)->where('evento', $evento)->where('luogo',$luogo)->where('data',$data)
    ->where('ora',$ora)->where('immagine',$immagine)->where('info',$info)->first();
    
    if($exist){
    return 'gia preferito';
    }
    else{
        
    if(Pref::create([
        'user'=> $user,
        'evento'=> $evento,
        'luogo'=> $luogo,
        'data'=> $data,
        'ora'=> $ora,
        'immagine'=>$immagine,
        'info'=>$info
    ])==true){return 'aggiunto';}else{return 'er_inser';}
  
    } 
  
}
public function numero(){
    $user = session('username');
    $num= User::where('username', $user)->first(); 
    return $num['n_pr'];
}

public function gestione(){
    
$user = session('username');
$res= Pref::where('user', $user)->get();
return $res ;
}

public function rimuovi(){
$cred = json_decode(file_get_contents('php://input'), true);
$user = session('username');

$evento=$cred['evento'];
$luogo=$cred['luogo'];

$ora=$cred['ora'];
$data=$cred['data'];
$immagine=$cred['immagine'];
$info=$cred['url'];
$canc= Pref::where('user', $user)->where('evento', $evento)->where('luogo',$luogo)->where('data',$data)
->where('ora',$ora)->where('immagine',$immagine)->where('info',$info)->first();
$id = $canc['id'];

$canc2= Pref::find($id)->delete();

if($canc2){
return 'eliminato';}else {
    return 'Errore...';     
}
}
}