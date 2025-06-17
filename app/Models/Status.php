<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'k_status';
    protected $primaryKey = 'f_id';
    public $timestamps = false;

    protected $fillable = ['f_status'];

    // Relasi: satu status bisa dipakai banyak history
    public function histories()
    {
        return $this->hasMany(History::class, 'f_idstatus');
    }
}
