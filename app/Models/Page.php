<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'logo',
        'title',
        'description',
        'background_color',
        'text_color',
        'link_background_color',
        'link_text_color',
        'link_border_radius',
    ];

    public function links(): HasMany
    {
        return $this->hasMany(Link::class)->orderBy('sort');
    }
}
