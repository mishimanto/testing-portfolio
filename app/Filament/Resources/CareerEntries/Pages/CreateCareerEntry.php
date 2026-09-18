<?php

namespace App\Filament\Resources\CareerEntries\Pages;

use App\Filament\Resources\CareerEntries\CareerEntryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCareerEntry extends CreateRecord
{
    protected static string $resource = CareerEntryResource::class;
}
