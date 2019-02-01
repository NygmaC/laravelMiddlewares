<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios','UsuarioControllador@index');
 
Route::get('/terceiro',function (){
    return "Teste Middleware";
})->middleware('terceiro::Leonardo');

Route::get('/negado', function () {
    return "Acesso Negado";
})->name('negado');

Route::post('/login', function (Request $req){

    $login_ok = false;
    $admin = false;

    switch($req->input('user')){
        case 'Leo':
            if($login_ok = $req->input('pass') === "senhaleonardo"){
                $login_ok = true;
                $admin = true;
            };
        break;

        case 'Lucas':
         if($req->input('pass') === "senhaleonardo"){
            $login_ok = true;
         }
        break;

        case 'Default':
            $login_ok = false;
    }

    if($login_ok) {
        $login = ['user' => $req->input('user'), 
        'admin' => $admin];
        
        $req->session()->put('login', $login);
        return response('Login OK', 200);
    }else {
        $req->session()->flush();
        return response('Erro de login', 404);
    }
});