<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index()
    {
        return view('tutorial.index');
    }

    public function create()
    {
        echo 'データ追加画面';
    }

    public function store(Request $request)
    {
        // データ追加処理
    }
}
