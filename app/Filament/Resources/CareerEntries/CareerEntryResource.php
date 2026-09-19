<?php

namespace App\Filament\Resources\CareerEntries;

use App\Filament\Resources\CareerEntries\Pages\CreateCareerEntry;
use App\Filament\Resources\CareerEntries\Pages\EditCareerEntry;
use App\Filament\Resources\CareerEntries\Pages\ListCareerEntries;
use App\Filament\Resources\CareerEntries\Schemas\CareerEntryForm;
use App\Filament\Resources\CareerEntries\Tables\CareerEntriesTable;
use App\Filament\Resources\Resource;
use App\Models\CareerEntry;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CareerEntryResource extends Resource
{
    protected static ?string $model = CareerEntry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    public static function form(Schema $schema): Schema
    {
        return CareerEntryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CareerEntriesTable::configure($table);
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
            'index' => ListCareerEntries::route('/'),
            'create' => CreateCareerEntry::route('/create'),
            'edit' => EditCareerEntry::route('/{record}/edit'),
        ];
    }
}
