<?php

namespace App\Models;

use Database\Factories\CounterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    /** @use HasFactory<CounterFactory> */
    use HasFactory;

    protected $fillable = ['label', 'value', 'suffix', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
