<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = buku::all();
        return view('user.koleksi', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = buku::all();
        return view('user.koleksi', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $item = rating::where('id_user', $request->input('id_user'))->where('id_buku', $request->input('id_buku'))->first();
        if ($item) {
            return redirect()->back()->with('error', 'Kamu sudah pernah rating');
        }
        $request->validate([
            'id_buku' => 'required|exists:bukus,id_buku',
            'rating' => 'required|integer|between:1,5',
            'ulasan' => 'required'
        ]);

        $user = auth()->user();
        if ($user->role != 'user') {
            return redirect()->back()->with('user', 'Kamu bukan peminjam');
        }

        rating::create([
            'id_user' => $user->id_user,
            'id_buku' => $request->id_buku,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
        ]);

        return redirect()->back()->with('success', 'Rating saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
