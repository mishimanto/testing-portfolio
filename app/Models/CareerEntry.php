<?php

namespace App\Models;

use Database\Factories\CareerEntryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerEntry extends Model
{
    /** @use HasFactory<CareerEntryFactory> */
    use HasFactory;

    protected $fillable = ['type', 'title', 'organization', 'period', 'description', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
