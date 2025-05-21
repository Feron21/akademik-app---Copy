<?php

namespace App\Filament\Dosen\Resources\AbsensiSessionResource\Pages;

use App\Filament\Dosen\Resources\AbsensiSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsensiSessions extends ListRecords
{
    protected static string $resource = AbsensiSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
