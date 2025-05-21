<?php

namespace App\Filament\Dosen\Resources\DaftarJadwalResource\Pages;

use App\Filament\Dosen\Resources\DaftarJadwalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarJadwal extends EditRecord
{
    protected static string $resource = DaftarJadwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
