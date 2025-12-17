<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;
    protected $table = 'pegawai';
    protected $guarded = ['id'];

    public function pegawai()
    {
        return $this->hasOne(Pekerjaan::class);
        return $this->hasMany(Pegawai::class);
    }
}
