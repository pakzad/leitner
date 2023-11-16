<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_id',
        'language_id',
        'heading',
        'content',
        'excerpt',
        'is_private',
        'parent_id',
        'students_count',
        'level'
    ];

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function languages(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function phrases(): HasMany
    {
        return $this->hasMany(Phrase::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
