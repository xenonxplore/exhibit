<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('layouts.main', compact('experiences'));
    }
}
