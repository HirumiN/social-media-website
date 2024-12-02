<?php

namespace App\Http\Controllers;

use inertia\Inertia;
use Illuminate\Http\Request;

class HomeCOntroller extends Controller
{
    public function index(Request $request){
        return inertia::render('Home');
    }
}
