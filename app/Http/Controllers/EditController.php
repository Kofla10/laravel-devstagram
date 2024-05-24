<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('edit.perfil');
    }

    public function store(){
        dd('this code working');
    }
}
