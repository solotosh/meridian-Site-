<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    

public function Index(){
    //dd('user index');

    return view('dashboard');
}


}
