<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opname extends Model
{
    use HasFactory;

    protected $table = "opname";

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class);
    }

    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
        // return $this->hasMany(Barang::class);
    }

    public function keluars()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
        // return $this->hasMany(Barang::class);
    }
}
