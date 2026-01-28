<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use File;
use Filament\Forms\Components\FileUpload;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Perusahaan')
                    ->schema([
                        Group::make()
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                Textarea::make('description')
                                    ->default(null)
                                    ->autosize(),
                            ])->columns(2),

                        Group::make()
                            ->schema([
                                Textarea::make('vision')
                                    ->default(null)
                                    ->autosize(),
                                Textarea::make('mission')
                                    ->default(null)
                                    ->autosize(),
                            ])->columns(2),

                        Group::make()
                            ->schema([
                                Textarea::make('address')
                                    ->default(null)
                                    ->autosize(),
                                TextInput::make('founded_year')
                                    ->default(null),

                            ])->columns(2),

                        Group::make()
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email address')
                                    ->email()
                                    ->default(null),
                                TextInput::make('phone')
                                    ->tel()
                                    ->default(null),
                            ])->columns(2),

                        Group::make()
                            ->schema([
                                TextInput::make('website')
                                    ->url()
                                    ->default(null),
                                FileUpload::make('logo')
                                    ->label('Logo Perusahaan')
                                    ->image()
                                    ->imagePreviewHeight('100')
                                    ->maxSize(2048) // Maks 2MB
                                    ->directory('company_images')
                                    ->disk('public') // pastikan menggunakan disk 'public'
                                    ->downloadable()
                                    ->openable()
                                    ->default(null),
                            ])->columns(2),

                    ])->columnSpan(2),
            ]);
    }
}
