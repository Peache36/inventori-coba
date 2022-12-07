<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Barang_masuk;
use App\Models\Opname;
use App\Models\Barang_keluar;
use App\Models\Riwayat;

class Barang extends Model
{
    protected $table = "barang";

    protected $guarded = ['id'];




    public function barang_masuk()
    {
        return $this->hasMany(Barang_masuk::class, 'id');
        // return $this->belongsTo(Barang_masuk::class, 'barang_id');
    }

    public function barang_keluar()
    {
        return $this->hasMany(Barang_masuk::class, 'id');
        // return $this->belongsTo(Barang_masuk::class, 'barang_id');
    }

    public function opname()
    {
        return $this->hasMany(Opname::class, 'id');
        // return $this->belongsTo(Barang_masuk::class, 'barang_id');
    }
}
