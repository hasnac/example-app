<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = [
        'id_rating',
        'id_user',
        'id_buku',
        'ulasan',
        'rating',

    ];
    protected $primaryKey = 'id_rating';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku', 'id_buku');
    }
}
