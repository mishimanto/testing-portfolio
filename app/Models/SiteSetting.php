<?php

namespace App\Models;

use Database\Factories\SiteSettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    /** @use HasFactory<SiteSettingFactory> */
    use HasFactory;

    protected $fillable = ['site_name', 'meta_title', 'meta_description', 'logo', 'dark_logo', 'favicon', 'email', 'phone', 'address', 'sidebar_title', 'sidebar_description', 'footer_text'];
}
