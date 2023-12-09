<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
class Userss extends Model   
{
    use HasFactory;
    protected $table = 'userss';
    protected $fillable = ['name', 'alamat', 'nomor_telepon', 'nomor_sim'];

    // Relationships
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function kembalis()
    {
        return $this->hasMany(Kembalis::class);
    }
}
