<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'client',
        'completed_date',
        'project_url',
        'thumbnail',
        'is_featured',
        'category',
        'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'completed_date' => 'date',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }
}
