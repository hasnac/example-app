<?php

namespace App\Http\Controllers;

use App\Models\koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = koleksi::with(['user', 'book'])
            ->orderBy('id_kolesi', 'desc')
            ->paginate(5);

        return view('user.koleksi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_buku' => 'required|exists:bukus,id_buku',

        ]);
        $user = auth()->user();


        // Tandai buku sebagai favorit
        koleksi::create([
            'id_user' => $user->id_user,
            'id_buku' => $request->id_buku,

        ]);
        $message = 'Bookmarked successfully.';


        return redirect()->to('/koleksi')->with('success', $message);
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
        $user = auth()->user();
        $bookmark = koleksi::where('id_user', $user->id_user)
            ->where('id_buku', $id)
            ->first();

        // Buku sudah ditandai sebagai favorit, hapus bookmark
        $bookmark->delete();
        $message = 'Bookmark removed successfully.';
        return redirect()->back()->with('success', $message);
    }
}
