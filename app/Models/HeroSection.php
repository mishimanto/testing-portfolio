<?php

namespace App\Models;

use Database\Factories\HeroSectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSection extends Model
{
    /** @use HasFactory<HeroSectionFactory> */
    use HasFactory;

    protected $fillable = ['eyebrow', 'heading_prefix', 'name', 'heading_connector', 'roles', 'description', 'image', 'primary_button_label', 'primary_button_url', 'is_active'];

    protected function casts(): array
    {
        return ['roles' => 'array', 'is_active' => 'boolean'];
    }

    public function imageUrl(): string
    {
        $path = $this->image ?: 'assets/images/banner/banner-user-image-one.png';

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, ['assets/', 'storage/'])) {
            return asset($path);
        }

        return Storage::disk('site_assets')->url($path);
    }
}
