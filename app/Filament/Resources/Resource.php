<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource as FilamentResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class Resource extends FilamentResource
{
    protected static function permissionName(string $action): string
    {
        return $action.'_'.Str::snake(class_basename(static::getModel()));
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can(static::permissionName('view_any')) ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can(static::permissionName('create')) ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can(static::permissionName('update')) ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can(static::permissionName('delete')) ?? false;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->can(static::permissionName('delete')) ?? false;
    }
}
