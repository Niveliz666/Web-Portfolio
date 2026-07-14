<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string|null $icon
 * @property string $category
 * @property int $level
 * @property int $sort_order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon', 'category', 'level', 'sort_order'];
}