<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cafe;

class CafeController extends Controller
{
    //
    protected $table = "cafe";

    public function index(){
      $cafes = Cafe::all();
      return view('cafes', compact('cafes'));
    }
}
