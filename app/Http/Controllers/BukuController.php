<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\koleksi;
use App\Models\rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = buku::latest()->paginate(5);

        return view('buku.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('deskripsi', $request->deskripsi);
        if ($request->has('status')) {
            Session::flash('status', $request->status);
        }
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required|max:4',
            'picture' => 'required|image|mimes:png,jpg,jpeg,svg',
            'stok' => 'required|numeric|min:0',
            'status' => 'required',
            'kategori' => 'required',

        ]);
        $picture = $request->file('picture');
        $picture->storeAs('public/books', $picture->hashName());

        buku::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
            'picture' => $picture->hashName(),
            'stok' => $request->stok,
            'status' => $request->status,
            'kategori' => $request->kategori,
        ]);

        return redirect()->to('/buku')->with('success', 'Berhasil melakukan update data');
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
    public function listbook()
    {
        $data = buku::where('status', 'publish')->paginate(4);
        return view('user.list_book', compact('data'));
    }
    public function detailbook($id)
    {
        $book = buku::with(['rating', 'rating.user'])
            ->where('id_buku', $id)
            ->where('status', 'publish')
            ->withAvg('rating', 'rating')
            ->withCount('rating')
            ->firstOrFail();
        $koleksi = koleksi::where('id_user', Auth::user()->id_user)
            ->where('id_buku', $book->id_buku)
            ->exists();
        // $rating = rating::where('id_buku', $id)
        // ->
        return view('user.detail', compact('book', 'koleksi'));
    }

    public function fiksi()
    {
        $data = buku::where('status', 'publish')
            ->where('kategori', 'fiksi')
            ->paginate(4);
        return view('user.list_book', compact('data'));
    }
}
