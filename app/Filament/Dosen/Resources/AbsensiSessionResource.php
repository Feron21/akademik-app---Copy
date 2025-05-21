<?php
namespace App\Filament\Dosen\Resources;

use App\Filament\Dosen\Resources\AbsensiSessionResource\Pages;
use App\Models\AbsensiSession;
use App\Models\JadwalKuliah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class AbsensiSessionResource extends Resource
{
    protected static ?string $model = AbsensiSession::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Sesi Absensi';
    protected static ?string $navigationGroup = 'Manajemen Absensi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('jadwal_kuliah_id')
            ->label('Jadwal Kuliah')
            ->options(
                JadwalKuliah::where('user_id', Auth::id())->pluck('mata_kuliah', 'id')
            )
            ->required(),

            Forms\Components\DatePicker::make('tanggal')
                ->label('Tanggal')
                ->required()
                ->default(now()),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('jadwalKuliah.mata_kuliah')->label('Mata Kuliah')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('tanggal')->label('Tanggal')->sortable(),
            Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->date(),
        ])
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
            'index' => Pages\ListAbsensiSessions::route('/'),
            'create' => Pages\CreateAbsensiSession::route('/create'),
            'edit' => Pages\EditAbsensiSession::route('/{record}/edit'),
        ];
    }
}
