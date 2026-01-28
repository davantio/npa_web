<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use File;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Customer')
                    ->schema([
                        Group::make([
                            TextInput::make('name')
                                ->required(),
                            TextInput::make('website')
                                ->url()
                                ->default(null),
                        ])->columns(2),

                        Group::make([
                            FileUpload::make('logo')
                                ->label('Logo Customer')
                                ->image()
                                ->imagePreviewHeight('100')
                                ->maxSize(2048) // Maks 2MB
                                ->directory('customer_images')
                                ->disk('public') // pastikan menggunakan disk 'public'
                                ->downloadable()
                                ->openable(),
                            Textarea::make('description')
                                ->default(null) 
                                ->autosize(),
                        ])->columns(2),

                        Toggle::make('is_visible')
                            ->required(),
                    ])->columnSpan(2),
            ]);
    }
}
