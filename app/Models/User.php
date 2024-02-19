<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id_user'];
    protected $casts = ['password' => 'hashed'];

    // public function detail()
    // {
    //     return $this->hasOne(peminjaman::class, 'id_user', 'id_user');
    // }
    public function pinjam()
    {
        return $this->belongsTo(peminjaman::class, 'id_user', 'id_user');
    }
    public function rating()
    {
        return $this->hasMany(rating::class, 'id_user', 'id_user');
    }
    public function bookmarks()
    {
        return $this->hasMany(koleksi::class, 'id_user', 'id_user');
    }
}
