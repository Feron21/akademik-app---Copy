<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiSession extends Model
{
    protected $fillable = ['jadwal_kuliah_id', 'tanggal'];

    public function jadwalKuliah()
    {
        return $this->belongsTo(JadwalKuliah::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
