<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Barang;
use App\Models\Riwayat;

class Barang_masuk extends Model
{


    protected $table = "barang_masuk";

    protected $guarded = ['id'];



    public function barangs()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
        // return $this->hasMany(Barang::class);
    }
}
