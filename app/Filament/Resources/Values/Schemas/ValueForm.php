<?php

namespace App\Filament\Resources\Values\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Value')
                    ->schema([
                        Group::make([
                            TextInput::make('title')
                                ->required(),
                            Textarea::make('description')
                                ->default(null)
                                ->autosize(),
                        ])->columns(2),

                        Group::make([
                            TextInput::make('icon')
                                ->default(null),
                            TextInput::make('color')
                                ->default(null),
                        ])->columns(2),


                        Toggle::make('is_visible')
                            ->required(),
                    ])->columnSpan(2),
            ]);
    }
}
