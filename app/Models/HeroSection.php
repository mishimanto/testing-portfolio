<?php

namespace App\Models;

use Database\Factories\HeroSectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    /** @use HasFactory<HeroSectionFactory> */
    use HasFactory;

    protected $fillable = ['eyebrow', 'name', 'roles', 'description', 'image', 'primary_button_label', 'primary_button_url', 'is_active'];

    protected function casts(): array
    {
        return ['roles' => 'array', 'is_active' => 'boolean'];
    }
}
