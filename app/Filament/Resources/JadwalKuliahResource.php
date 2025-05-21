<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalKuliahResource\Pages;
use App\Models\JadwalKuliah;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;

class JadwalKuliahResource extends Resource
{
    protected static ?string $model = JadwalKuliah::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('mata_kuliah')
                ->label('Mata Kuliah')
                ->required()
                ->maxLength(255),

            Select::make('hari')
                ->label('Hari')
                ->options([
                    'Senin' => 'Senin',
                    'Selasa' => 'Selasa',
                    'Rabu' => 'Rabu',
                    'Kamis' => 'Kamis',
                    'Jumat' => 'Jumat',
                    'Sabtu' => 'Sabtu',
                    'Minggu' => 'Minggu',
                ])
                ->required(),

            TimePicker::make('jam_mulai')
                ->label('Jam Mulai')
                ->required(),

            TimePicker::make('jam_selesai')
                ->label('Jam Selesai')
                ->required(),

            TextInput::make('ruang')
                ->label('Ruang')
                ->required()
                ->maxLength(50),

            Select::make('user_id') // ✅ gunakan nama kolom foreign key yang benar
                ->label('Dosen')
                ->options(
                    User::where('role', 'dosen')->pluck('name', 'id')
                )
                ->searchable()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('mata_kuliah')->label('Mata Kuliah')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('hari')->sortable(),
            Tables\Columns\TextColumn::make('jam_mulai')->label('Jam Mulai')->sortable(),
            Tables\Columns\TextColumn::make('jam_selesai')->label('Jam Selesai')->sortable(),
            Tables\Columns\TextColumn::make('ruang')->label('Ruang'),
            Tables\Columns\TextColumn::make('dosen.name')->label('Dosen')->sortable()->searchable(),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalKuliahs::route('/'),
            'create' => Pages\CreateJadwalKuliah::route('/create'),
            'edit' => Pages\EditJadwalKuliah::route('/{record}/edit'),
        ];
    }
}
