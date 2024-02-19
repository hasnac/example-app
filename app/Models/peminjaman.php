<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';

    protected $fillable = [
        'id_pinjam',
        'id_user',
        'id_buku',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];
    protected $primaryKey = 'id_pinjam';
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku', 'id_buku');
    }
    // public function detail()
    // {
    //     return $this->hasMany(detailpinjam::class, 'id_pinjam', 'id_pinjam');
    // }
}
