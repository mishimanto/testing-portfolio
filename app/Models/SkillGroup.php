<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SkillGroup extends Model
{
    protected $fillable = ['key', 'title', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'category', 'key')->orderBy('sort_order');
    }
}
