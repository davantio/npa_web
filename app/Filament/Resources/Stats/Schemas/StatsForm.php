<?php

namespace App\Filament\Resources\Stats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StatsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Statistik')
                    ->schema([
                        Group::make([
                            TextInput::make('title')
                                ->required(),
                            TextInput::make('icon')
                                ->default(null),
                        ])->columns(2),

                        Group::make([
                            TextInput::make('value')
                                ->required()
                                ->numeric(),
                            TextInput::make('unit')
                                ->default(null)
                                ->maxLength(255),
                        ])->columns(2),

                        Toggle::make('is_visible')
                            ->required(),
                    ])->columnSpan(2),
            ]);
    }
}
