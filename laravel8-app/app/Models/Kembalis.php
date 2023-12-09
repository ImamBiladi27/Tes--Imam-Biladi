<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kembalis extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_kembali', 'mobil_id', 'user_id'];

    // Relationships
    public function car()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
