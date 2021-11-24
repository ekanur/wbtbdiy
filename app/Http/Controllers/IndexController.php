<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function pencatatan()
    {
        return view("pencatatan");
    }

    public function pengusulan()
    {
        return view("pengusulan");
    }

    public function detail()
    {
        return view("detail");
    }
}