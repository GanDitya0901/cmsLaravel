<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        "title",
        "slug",
    ];

    public function sections() {
        return $this->hasMany(PageSection::class)->orderBy('position');
    }

    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory;
}
