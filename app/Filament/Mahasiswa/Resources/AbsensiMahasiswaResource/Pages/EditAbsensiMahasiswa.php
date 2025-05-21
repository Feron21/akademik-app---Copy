<?php

namespace App\Filament\Mahasiswa\Resources\AbsensiMahasiswaResource\Pages;

use App\Filament\Mahasiswa\Resources\AbsensiMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbsensiMahasiswa extends EditRecord
{
    protected static string $resource = AbsensiMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
