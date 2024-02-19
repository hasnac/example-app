<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class koleksi extends Model
{
    use HasFactory;
    protected $table = 'koleksis';
    protected $guarded = ['id_kolesi'];
    protected $primaryKey = 'id_kolesi';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function book()
    {
        return $this->belongsTo(buku::class, 'id_buku', 'id_buku');
    }
}
