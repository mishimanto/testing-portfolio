<?php

namespace App\Filament\Resources\CareerEntries\Pages;

use App\Filament\Resources\CareerEntries\CareerEntryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCareerEntry extends EditRecord
{
    protected static string $resource = CareerEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
