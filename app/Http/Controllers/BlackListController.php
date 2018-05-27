<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlackListController extends Controller
{
    public function index()
    {
        return view('black-list.index');
    }
}
