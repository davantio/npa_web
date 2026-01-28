<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Tables\Filters\SelectFilter;
use File;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Produk')
                    ->schema([
                        Group::make([
                            Select::make('category_id')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                            TextInput::make('name')
                                ->live(onBlur: true)
                                ->afterStateUpdated(function ($set, ?string $state) {
                                    $set('slug', Str::slug($state));
                                })
                                ->required()
                                ->maxLength(255),
                        ])->columns(2),

                        Group::make([
                            TextInput::make('slug')
                                ->readOnly(),
                            Textarea::make('packaging')
                                ->autosize()
                                ->default(null),
                        ])->columns(2),

                        Group::make([
                            Textarea::make('description')
                                ->default(null)
                                ->autosize(),
                            Textarea::make('application')
                                ->default(null)
                                ->autosize(),
                        ])->columns(2),

                        Group::make([
                            FileUpload::make('image')
                                ->label('Foto Produk')
                                ->image()
                                ->imagePreviewHeight('100')
                                ->maxSize(2048) // Maks 2MB
                                ->directory('product_images')
                                ->disk('public') // pastikan menggunakan disk 'public'
                                ->downloadable()
                                ->openable(),
                            FileUpload::make('datasheet_file')
                                ->label('Brosur Produk')
                                ->maxSize(2048) // Maks 2MB
                                ->directory('product_datasheets')
                                ->disk('public')
                                ->downloadable()
                                ->openable()
                                ->default(null),
                        ])->columns(2),

                        Toggle::make('is_visible')
                            ->required(),
                    ])->columnSpan(2),
            ]);
    }
}
