<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, Textarea, DatePicker, Select};
use Filament\Tables\Columns\{TextColumn, BadgeColumn, DateColumn};


class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?string $navigationLabel = 'Program';
    protected static ?string $modelLabel = 'Program';


    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('nama_program')
                ->label('Nama Program')
                ->required()
                ->maxLength(255),
            DatePicker::make('tanggal_pelaksanaan')
                ->label('Tanggal Pelaksanaan')
                ->required(),
            TextInput::make('lokasi')
                ->label('Lokasi')
                ->maxLength(255),
            Select::make('status')
                ->label('Status')
                ->options([
                    'Terencana' => 'Terencana',
                    'Berlangsung' => 'Berlangsung',
                    'Selesai' => 'Selesai',
                ])
                ->required(),
            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(4),
        ]);
}


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nama_program')->label('Program')->searchable()->sortable(),
            TextColumn::make('tanggal_pelaksanaan')
        ->label('Tanggal')
        ->date()
        ->date('d M Y'),
            TextColumn::make('lokasi')->label('Lokasi')->searchable(),
            BadgeColumn::make('status')
                ->colors([
                    'primary' => 'Terencana',
                    'warning' => 'Berlangsung',
                    'success' => 'Selesai',
                ]),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'Terencana' => 'Terencana',
                    'Berlangsung' => 'Berlangsung',
                    'Selesai' => 'Selesai',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
