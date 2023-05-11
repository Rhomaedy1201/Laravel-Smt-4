<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cobaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->segment(1) !== null) {
            $nama = $request->segment(1);
            echo $nama;
        } else {
            abort(404);
        }
    }
}