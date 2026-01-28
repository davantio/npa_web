<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Perusahaan')
                    ->schema([
                        Group::make([
                            TextInput::make('name')
                                ->required(),
                            TextInput::make('email')
                                ->label('Email address')
                                ->email()
                                ->required(),
                        ])->columns(2),

                        TextInput::make('subject')
                            ->required(),
                        Textarea::make('message')
                            ->required()
                            ->columnSpanFull()
                            ->autosize(),
                    ])->columnSpan(2),
            ]);
    }
}
