<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'page_id',
        'sort',
        'title',
        'url',
        'background_color',
        'text_color',
        'border_radius',
        'sort',
    ];
}
