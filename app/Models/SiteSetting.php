<?php

namespace App\Models;

use Database\Factories\SiteSettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteSetting extends Model
{
    /** @use HasFactory<SiteSettingFactory> */
    use HasFactory;

    protected $fillable = ['site_name', 'meta_title', 'meta_description', 'meta_keywords', 'logo', 'dark_logo', 'favicon', 'og_image', 'sidebar_image', 'email', 'phone', 'address', 'sidebar_title', 'sidebar_description', 'footer_text'];

    public function mediaUrl(?string $path, string $fallback): string
    {
        $path = $path ?: $fallback;

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, ['assets/', 'storage/'])) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }
}
