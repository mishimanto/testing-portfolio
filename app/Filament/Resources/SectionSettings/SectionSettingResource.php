<?php

namespace App\Filament\Resources\SectionSettings;

use App\Filament\Resources\Resource;
use App\Filament\Resources\SectionSettings\Pages\CreateSectionSetting;
use App\Filament\Resources\SectionSettings\Pages\EditSectionSetting;
use App\Filament\Resources\SectionSettings\Pages\ListSectionSettings;
use App\Filament\Resources\SectionSettings\Schemas\SectionSettingForm;
use App\Filament\Resources\SectionSettings\Tables\SectionSettingsTable;
use App\Models\SectionSetting;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SectionSettingResource extends Resource
{
    protected static ?string $model = SectionSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAdjustmentsHorizontal;

    public static function form(Schema $schema): Schema
    {
        return SectionSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SectionSettingsTable::configure($table);
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
            'index' => ListSectionSettings::route('/'),
            'create' => CreateSectionSetting::route('/create'),
            'edit' => EditSectionSetting::route('/{record}/edit'),
        ];
    }
}
