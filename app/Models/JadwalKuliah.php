<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class JadwalKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_kuliah',
        'user_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruang',
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function mahasiswas()
    {
        return $this->belongsTo(User::class, 'jadwal_mahasiswa', 'jadwal_kuliah_id', 'mahasiswa_id');
    }
    public function jadwalKuliah()
    {
        return $this->belongsTo(JadwalKuliah::class, 'jadwal_kuliah_id');
    }

}
