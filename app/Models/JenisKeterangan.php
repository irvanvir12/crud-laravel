<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKeterangan extends Model
{
    protected $table = 't_jenisketerangan';
    protected $primaryKey = 'f_id';
    public $timestamps = false;

    protected $fillable = ['f_suket'];

    // Relasi ke t_history
    public function histories()
    {
        return $this->hasMany(History::class, 'f_id_jenisket');
    }
}
