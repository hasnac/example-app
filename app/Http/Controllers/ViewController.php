<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $count = buku::count();
        return view('landing', compact('count'));
    }
    // public function listbook()
    // {
    //     return view('user.list_book');
    // }
}
