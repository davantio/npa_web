<?php

namespace App\Filament\Resources\ProductCategories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Kategori Produk')
                    ->schema([
                        Group::make([
                            TextInput::make('name')
                                ->live(onBlur: true)
                                ->afterStateUpdated(function ($set, ?string $state) {
                                    $set('slug', Str::slug($state));
                                })
                                ->required()
                                ->maxLength(255),
                            TextInput::make('slug')
                                ->readOnly(),
                        ])->columns(2),

                        Group::make([
                            TextInput::make('subtitle')
                                ->maxLength(50),
                            Textarea::make('description')
                                ->autosize(),
                        ])->columns(2),

                        Group::make([
                            TextInput::make('icon')
                                ->maxLength(50),
                            FileUpload::make('image')
                                ->required()
                                ->label('Foto Kategori')
                                ->image()
                                ->imagePreviewHeight('100')
                                ->maxSize(2048) // Maks 2MB
                                ->directory('category_images')
                                ->disk('public') // pastikan menggunakan disk 'public'
                                ->downloadable()
                                ->openable(),
                        ])->columns(2),

                        Toggle::make('is_visible')
                            ->required(),
                    ])->columnSpan(2),
            ]);
    }
}