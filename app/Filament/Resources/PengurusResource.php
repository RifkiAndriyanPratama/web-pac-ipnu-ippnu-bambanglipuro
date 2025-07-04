<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengurusResource\Pages;
use App\Filament\Resources\PengurusResource\RelationManagers;
use App\Models\Pengurus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;
    protected static ?string $navigationLabel = 'Kepengurusan';
    protected static ?string $pluralModelLabel = 'Kepengurusan';
    protected static ?string $navigationGroup = 'Struktur Organisasi';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('anggota_id')
                ->relationship('anggota', 'nama')
                ->searchable()
                ->required(),

            Forms\Components\Select::make('jabatan_id')
                ->relationship('jabatan', 'nama')
                ->required(),

            Forms\Components\Select::make('periode_id')
                ->relationship('periode', 'nama')
                ->required(),

            Forms\Components\DatePicker::make('tanggal_mulai'),
            Forms\Components\DatePicker::make('tanggal_selesai'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('anggota.nama')->label('Nama Anggota'),
            Tables\Columns\TextColumn::make('jabatan.nama')->label('Jabatan'),
            Tables\Columns\TextColumn::make('periode.nama')->label('Periode'),
            Tables\Columns\TextColumn::make('tanggal_mulai')->date(),
            Tables\Columns\TextColumn::make('tanggal_selesai')->date(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenguruses::route('/'),
            'create' => Pages\CreatePengurus::route('/create'),
            'edit' => Pages\EditPengurus::route('/{record}/edit'),
        ];
    }
}
