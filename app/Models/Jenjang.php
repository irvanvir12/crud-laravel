<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    protected $table = 'k_jenjang';
    protected $primaryKey = 'id_jenjang';
    public $timestamps = false;

    protected $fillable = ['jenjang'];

    // Relasi: satu jenjang bisa punya banyak mahasiswa
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_jenjang');
    }
}
