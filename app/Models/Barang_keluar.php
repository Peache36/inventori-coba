<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Barang_keluar extends Model
{
    use HasFactory;

    protected $table = "barang_keluar";

    protected $guarded = ['id'];



    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
        // return $this->hasMany(Barang::class);
    }

    public function opname()
    {
        return $this->hasOne(Opname::class, 'barang_id');
    }
}
