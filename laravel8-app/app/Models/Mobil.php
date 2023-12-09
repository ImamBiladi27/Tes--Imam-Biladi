<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = ['merk', 'model', 'no_plat', 'sewa'];

    // Relationships
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
