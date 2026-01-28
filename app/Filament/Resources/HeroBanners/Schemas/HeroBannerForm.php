<?php

namespace App\Filament\Resources\HeroBanners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroBannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Banner')
                    ->schema([
                        TextInput::make('title')
                            ->default(null),
                        Textarea::make('subtitle')
                            ->default(null)
                            ->columnSpanFull(),

                        Group::make([
                            TextInput::make('button_text')
                                ->default(null),
                            TextInput::make('button_url')
                                ->url()
                                ->default(null),
                        ])->columns(2),

                        FileUpload::make('image')
                            ->label('Image Banner')
                            ->image()
                            ->imagePreviewHeight('100')
                            ->maxSize(2048) // Maks 2MB
                            ->directory('banner_images')
                            ->disk('public') // pastikan menggunakan disk 'public'
                            ->downloadable()
                            ->openable()
                            ->required(),
                        Toggle::make('is_visible')
                            ->required(),
                    ])->columnSpan(2),
            ]);
    }
}
