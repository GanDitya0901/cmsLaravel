<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = [
        'type', 
        'page_id', 
        'content',
        'position'
    ];

    protected $casts = [
        'content' => 'array'
    ];

    public function page() {
        return $this->belongsTo(Page::class);
    }

    /** @use HasFactory<\Database\Factories\PageSectionFactory> */
    use HasFactory;
}
