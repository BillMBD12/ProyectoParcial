<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class SessionsController extends Controller{
    public function create(){

        return view('auth.login');
    }

    public function store(){
        if(auth()->attempt(request(['email','password']))==false){
            return back()->withErrors(['message'=> 'the email or password is incorrect, please try again']);
        }else{
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin.index');
            }else{
                if(auth()->user()->role == 'cliente'){
                    return redirect()->route('cliente.listarcatalogocliente');
                }else{
                    if(auth()->user()->role == 'personal'){
                        return redirect()->route('personal.listarentrega');
                    }
                    
                }
            }
        }
        
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/login');
    }


    
}
