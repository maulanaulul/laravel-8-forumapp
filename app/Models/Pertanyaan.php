<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // public function kategori()
    // {
    //     return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    // }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function jawaban()
    {
        return $this->hasMany('App\Models\Jawaban');
    }
}
