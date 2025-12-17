<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes; // Tambahkan HasFactory biar lengkap

    protected $table = 'pegawai';
    protected $guarded = ['id'];

    /**
     * Relasi ke Model Pekerjaan
     * Pegawai "Milik" satu Pekerjaan
     */
    public function pekerjaan()
    {
        // Pastikan di tabel pegawai ada kolom 'pekerjaan_id'
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }
}