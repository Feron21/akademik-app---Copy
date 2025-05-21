<?php

namespace App\Filament\Mahasiswa\Resources\AbsensiMahasiswaResource\Pages;

use App\Filament\Mahasiswa\Resources\AbsensiMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsensiMahasiswas extends ListRecords
{
    protected static string $resource = AbsensiMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
