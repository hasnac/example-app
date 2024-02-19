<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = [
        'id_buku',
        'judul',
        'deskripsi',
        'penulis',
        'penerbit',
        'tahunterbit',
        'picture',
        'stok',
        'status',
        'kategori',
    ];
    public $timestamps = true;
    protected $primaryKey = 'id_buku';

    public function pinjam()
    {
        return $this->belongsTo(peminjaman::class, 'id_buku', 'id_buku');
    }
    public function rating()
    {
        return $this->hasMany(rating::class, 'id_buku', 'id_buku');
    }
    // public function isBookmarkedBy(User $user)
    // {
       
    //     return $this->bookmarks()
    //         ->where('id_user', $user->id_user)
    //         ->exists();
    // }

    public function bookmarks()
    {
        return $this->hasMany(koleksi::class, 'id_buku', 'id_buku');
    }
    // public function detail()
    // {
    //     return $this->hasMany(detailpinjam::class, 'id_buku', 'id_buku');
    // }
}
