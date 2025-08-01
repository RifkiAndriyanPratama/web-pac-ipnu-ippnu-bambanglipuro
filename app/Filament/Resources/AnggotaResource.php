<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggotaResource\Pages;
use App\Filament\Resources\AnggotaResource\RelationManagers;
use App\Models\Anggota;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use PhpParser\Node\Stmt\Label;
use App\Enums\PotensiAnggota;
use Filament\Tables\Filters\SelectFilter;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;


class AnggotaResource extends Resource
{
    protected static ?string $model = Anggota::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $pluralModelLabel = 'Anggota';
    protected static ?string $navigationLabel = 'Anggota';
    protected static ?string $navigationGroup = 'Manajemen Anggota';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\TextInput::make('alamat')->required(),
            Forms\Components\TextInput::make('no_hp')
            ->tel()
            ->required()
            ->Label('No HP')
            ->rules(['regex:/^08[0-9]{8,11}$/'])
            ->validationMessages([
                'regex' => 'Silakan isi nomor HP yang benar, contoh: 081234567890',
            ]),
            Forms\Components\DatePicker::make('tanggal_lahir')->required(),
            Forms\Components\FileUpload::make('foto')
            ->directory('anggota-foto')
            ->visibility('public')
            ->label('Foto (Maksimal 2MB)'),
            Forms\Components\Select::make('potensi')
            ->label('Potensi')
            ->options(PotensiAnggota::options())
            ->required(),
        ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('no')
                ->label('No.')
                ->rowIndex(),
            Tables\Columns\TextColumn::make('nama')
                ->searchable(),
            Tables\Columns\TextColumn::make('alamat'),
            Tables\Columns\TextColumn::make('no_hp'),
            Tables\Columns\TextColumn::make('potensi')
                ->label('Potensi')
                ->formatStateUsing(fn ($state) => $state?->label()),
            Tables\Columns\ImageColumn::make('foto')->disk('public'),
        ])
        ->filters([
            SelectFilter::make('potensi')
                ->label('Filter Potensi')
                ->options(PotensiAnggota::options())
                ->attribute('potensi'),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->headerActions([
            ExportAction::make('export')
                ->label('Export Data Anggota')
                ->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->withFilename('data-anggota-pac-mbali.xlsx')
                        ->withColumns([
                            Column::make('no')
                                ->heading('No.')
                                ->formatStateUsing(fn ($record, $rowIndex) => $rowIndex + 1),
                            Column::make('nama')->heading('Nama'),
                            Column::make('alamat')->heading('Alamat'),
                            Column::make('no_hp')->heading('No HP'),
                            Column::make('potensi')->heading('Potensi'),
                        ]),
                ])
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
            'index' => Pages\ListAnggotas::route('/'),
            'create' => Pages\CreateAnggota::route('/create'),
            'edit' => Pages\EditAnggota::route('/{record}/edit'),
        ];
    }
}
