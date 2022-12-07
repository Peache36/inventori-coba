<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Barang;
use App\Models\User;
use App\Models\Opname;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = "riwayat";

    protected $guarded = ['id'];


    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
