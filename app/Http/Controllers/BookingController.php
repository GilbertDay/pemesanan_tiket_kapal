<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $req) {
        $id_kapal = $req->id;
        return view('frontend.booking',compact('id_kapal'));
    }
}
