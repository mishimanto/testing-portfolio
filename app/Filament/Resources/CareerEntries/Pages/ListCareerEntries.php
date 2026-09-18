<?php

namespace App\Filament\Resources\CareerEntries\Pages;

use App\Filament\Resources\CareerEntries\CareerEntryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCareerEntries extends ListRecords
{
    protected static string $resource = CareerEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
