<?php

namespace App\Models;

use Database\Factories\SectionSettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionSetting extends Model
{
    /** @use HasFactory<SectionSettingFactory> */
    use HasFactory;

    protected $fillable = ['section_key', 'subtitle', 'title', 'description', 'image', 'is_visible'];

    protected function casts(): array
    {
        return ['is_visible' => 'boolean'];
    }
}
