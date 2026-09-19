<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->disabled(fn ($record): bool => $record?->name === 'super_admin'),
                Hidden::make('guard_name')
                    ->default('web'),
                CheckboxList::make('permissions')
                    ->relationship('permissions', 'name')
                    ->searchable()
                    ->bulkToggleable()
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
