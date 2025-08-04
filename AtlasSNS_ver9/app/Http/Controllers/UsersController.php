<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function search(){
        return view('users.search');
    }
    public function users(){
        return view('users.search');
    }
}
