<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['absensi_session_id', 'mahasiswa_id', 'status'];

    public function absensiSession()
    {
        return $this->belongsTo(AbsensiSession::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function jadwalKuliah()
    {
        return $this->hasOneThrough(
            JadwalKuliah::class,
            AbsensiSession::class,
            'id', // absensi_session.id
            'id', // jadwal_kuliah.id
            'absensi_session_id',
            'jadwal_kuliah_id'
        );
    }
}
