<?php

namespace App\Filament\Mahasiswa\Resources;

use App\Filament\Mahasiswa\Resources\AbsensiMahasiswaResource\Pages;
use App\Models\Absensi;
use App\Models\AbsensiSession;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;

class AbsensiMahasiswaResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Hidden mahasiswa_id otomatis isi dengan user login
            Forms\Components\Hidden::make('mahasiswa_id')
                ->default(fn () => \Filament\Facades\Filament::auth()->user()?->id)
                ->required(),

            Select::make('absensi_session_id')
                ->label('Sesi Absensi')
                ->options(
                    AbsensiSession::with('jadwalKuliah')->get()->mapWithKeys(function ($session) {
                        $mataKuliah = $session->jadwalKuliah ? $session->jadwalKuliah->mata_kuliah : '-';
                        return [
                            $session->id => $mataKuliah . ' - ' . $session->tanggal,
                        ];
                    })
                )
                ->searchable()
                ->required(),

            Select::make('status')
                ->label('Status Kehadiran')
                ->options([
                    'hadir' => 'Hadir',
                    'izin' => 'Izin',
                    'sakit' => 'Sakit',
                    'alpa' => 'Alpa',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('absensiSession.jadwalKuliah.mata_kuliah')->label('Mata Kuliah'),
            Tables\Columns\TextColumn::make('absensiSession.tanggal')->label('Tanggal'),
            Tables\Columns\TextColumn::make('status')->label('Status'),
            Tables\Columns\TextColumn::make('created_at')->label('Waktu Absen')->since(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbsensiMahasiswas::route('/'),
            'create' => Pages\CreateAbsensiMahasiswa::route('/create'),
            'edit' => Pages\EditAbsensiMahasiswa::route('/{record}/edit'),
        ];
    }
}
