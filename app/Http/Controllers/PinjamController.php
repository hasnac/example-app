<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = peminjaman::with(['user', 'buku'])

            ->orderBy('tanggal_pinjam', 'desc')
            ->paginate(5);

        return view('pinjam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('id_user', 'asc')
            ->where('role', 'user')
            ->get();
        $books = buku::orderBy('id_buku', 'asc')
            ->get();
        return view('pinjam.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('status')) {
            Session::flash('status', $request->status);
        }
        $this->validate($request, [
            'username' => 'required',
            'judul' => 'required',
            'jumlah' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status' => 'required',
        ]);


        peminjaman::create([
            'id_user' => $request->username,
            'id_buku' => $request->judul,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        // $stok = buku::findOrFail($request['id_buku']);
        // $stok->stok -= $request['jumlah'];
        // $stok->save();


        return redirect()->to('pinjam')->with('success', 'Berhasil melakukan update data');
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
        $borrowing = peminjaman::findOrFail($id);
        $borrowing->update([
            'status' => 'kembali'
        ]);
        return redirect('/pinjam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    //     public function kembali()
    //     {
    //         $kembali = peminjaman::where('status', 'kembali');
    //         $kembali->update();

    //         return redirect()->route('pinjam.index',  ['id' => $id])->with('success', 'Buku kembali');
    //     }
    public function report($id)
    {
        $data = peminjaman::with(['user', 'buku'])
            ->where('id_pinjam', $id)
            ->firstOrFail();

        return view('report.index', compact('data'));
    }
}
