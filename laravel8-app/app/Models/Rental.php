<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_mulai', 'tgl_akhir', 'mobil_id', 'user_id','status'];

    // Relationships
    public function car()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function user()
    {   
        return $this->belongsTo(Userss::class);
    }
}
