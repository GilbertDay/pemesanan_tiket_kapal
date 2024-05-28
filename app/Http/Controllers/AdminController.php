<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dahsboard()
    {
        return view('backend.index');
    }

    public function penumpang()
    {
        return view('backend.penumpang');
    }
}
