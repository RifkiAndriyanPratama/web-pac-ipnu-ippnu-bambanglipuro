<?php

namespace App\Filament\Resources;

use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\NewsResource\Pages;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $modelLabel = 'Berita';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255),

            Forms\Components\RichEditor::make('content')
    ->label('Isi Berita')
    ->toolbarButtons(['bold', 'italic', 'bulletList', 'orderedList', 'link', 'h2', 'h3'])
    ->required(),

            Forms\Components\FileUpload::make('thumbnail')
    ->image()
    ->directory('news-thumbnails')
    ->disk('public')
    ->visibility('public')
    ->preserveFilenames()
    ->nullable()
    ->imageResizeMode('cover')
    ->imageCropAspectRatio('16:9'),


            Forms\Components\Select::make('news_category_id')
                ->label('Kategori')
                ->relationship('newsCategory', 'name')
                ->searchable()
                ->preload()
                ->required(),

            Forms\Components\DatePicker::make('published_at')
                ->label('Tanggal Publikasi')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public'), // Pastikan file tersimpan di /storage/app/public/news-thumbnails/

                Tables\Columns\BadgeColumn::make('newsCategory.name')
                    ->label('Kategori')
                    ->colors(fn ($state, $record) => [
                        $record->newsCategory?->color => true,
                    ]),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal')
                    ->date(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->since(),
            ])
            ->defaultSort('published_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
