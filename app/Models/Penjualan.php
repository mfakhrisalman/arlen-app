<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function details()
    {
        return $this->hasMany(DetailPenjualan::class, 'sale_id', 'id');
    }
}
