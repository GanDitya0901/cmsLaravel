<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        "title",
        "slug",
        "body",
    ];

    protected $casts = [
        "body" => "array",
    ];

    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory;
}
