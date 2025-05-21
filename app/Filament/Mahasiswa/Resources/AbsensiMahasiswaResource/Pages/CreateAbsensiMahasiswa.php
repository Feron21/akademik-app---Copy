<?php

namespace App\Filament\Mahasiswa\Resources\AbsensiMahasiswaResource\Pages;

use App\Filament\Mahasiswa\Resources\AbsensiMahasiswaResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\AbsensiSession;
use Filament\Notifications\Notification;
use Carbon\Carbon;

class CreateAbsensiMahasiswa extends CreateRecord
{
    protected static string $resource = AbsensiMahasiswaResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record;

        $session = AbsensiSession::with('jadwalKuliah')->find($record->absensi_session_id);

        if ($session && $session->jadwalKuliah && $session->jadwalKuliah->jam_mulai) {
            $jamMulai = Carbon::parse($session->jadwalKuliah->jam_mulai);
            $waktuAbsen = Carbon::parse($record->created_at ?? now());

            if ($waktuAbsen->greaterThan($jamMulai->copy()->addMinutes(15))) {
                Notification::make()
                    ->title('Terlambat Absen')
                    ->body('Anda melakukan absensi lebih dari 15 menit setelah jam mulai kuliah.')
                    ->danger()
                    ->send();
            } else {
                Notification::make()
                    ->title('Absensi Berhasil')
                    ->body('Anda berhasil melakukan absensi tepat waktu.')
                    ->success()
                    ->send();
            }
        } else {
            Notification::make()
                ->title('Absensi Berhasil')
                ->body('Absensi berhasil, namun tidak bisa memverifikasi keterlambatan.')
                ->warning()
                ->send();
        }
    }
}
