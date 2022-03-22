<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profiles";
    protected $fillable = [
        'nama_lengkap', 'email', 'umur', 'alamat', 'image', 'user_id'
    ];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'user_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
