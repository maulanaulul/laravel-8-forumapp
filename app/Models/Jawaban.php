<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function pertanyaan()
    {
        return $this->belongsTo('App\Models\Pertanyaan', 'pertanyaan_id');
    }

}
