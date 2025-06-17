<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 't_history';
    protected $primaryKey = 'f_id';
    public $timestamps = false;

    protected $fillable = [
        'f_id_mhs',
        'f_id_jenisket',
        'f_created',
        'f_idstatus',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'f_id_mhs');
    }

    public function jenisketerangan()
    {
        return $this->belongsTo(JenisKeterangan::class, 'f_id_jenisket');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'f_idstatus')->withDefault();
    }
}
