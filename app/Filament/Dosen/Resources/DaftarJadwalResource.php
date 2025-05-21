<?php

namespace App\Filament\Dosen\Resources;

use App\Filament\Dosen\Resources\DaftarJadwalResource\Pages;
use App\Models\JadwalKuliah;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DaftarJadwalResource extends Resource
{
    protected static ?string $model = JadwalKuliah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mata_kuliah')->label('Mata Kuliah')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('hari')->sortable(),
                            Tables\Columns\TextColumn::make('ruang')->label('Ruang'),
                Tables\Columns\TextColumn::make('jam_mulai')->label('Jam Mulai')->sortable(),
                Tables\Columns\TextColumn::make('jam_selesai')->label('Jam Selesai')->sortable(),
                Tables\Columns\TextColumn::make('dosen.name')->label('Dosen')->sortable()->searchable(),
            ])
            ->filters([
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDaftarJadwals::route('/'),
        ];
    }
}
