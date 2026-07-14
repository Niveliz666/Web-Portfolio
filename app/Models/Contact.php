<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $subject
 * @property string $message
 * @property bool $is_read
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'message', 'is_read'];
    protected $casts = ['is_read' => 'boolean'];
}