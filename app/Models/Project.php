<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string|null $long_description
 * @property string|null $image
 * @property string|null $live_url
 * @property string|null $github_url
 * @property string $category
 * @property array|null $technologies
 * @property bool $featured
 * @property int $sort_order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'long_description',
        'image', 'live_url', 'github_url', 'category',
        'technologies', 'featured', 'sort_order'
    ];

    protected $casts = [
        'technologies' => 'array',
        'featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = static::generateUniqueSlug($project->title);
        });

        static::updating(function ($project) {
            if ($project->isDirty('title')) {
                $project->slug = static::generateUniqueSlug($project->title, $project->id);
            }
        });
    }

    protected static function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        $query = static::where('slug', $slug);
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        while ($query->exists()) {
            $slug = $original . '-' . $counter++;
            $query = static::where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }
        }

        return $slug;
    }
}