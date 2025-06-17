<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    protected $table = 't_mahasiswa';
    protected $primaryKey = 'f_id';
    protected $fillable = ['f_nama', 'f_nim', 'id_jenjang'];
    public $timestamps = false;

    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class, 'id_jenjang', 'id_jenjang');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'f_id_mhs');
    }

}
