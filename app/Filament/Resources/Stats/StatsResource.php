<?php

namespace App\Filament\Resources\Stats;

use App\Filament\Resources\Stats\Pages\CreateStats;
use App\Filament\Resources\Stats\Pages\EditStats;
use App\Filament\Resources\Stats\Pages\ListStats;
use App\Filament\Resources\Stats\Schemas\StatsForm;
use App\Filament\Resources\Stats\Tables\StatsTable;
use App\Models\Stats;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StatsResource extends Resource
{
    protected static ?string $model = Stats::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::PresentationChartLine;

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return StatsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatsTable::configure($table);
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
            'index' => ListStats::route('/'),
            'create' => CreateStats::route('/create'),
            'edit' => EditStats::route('/{record}/edit'),
        ];
    }
}
