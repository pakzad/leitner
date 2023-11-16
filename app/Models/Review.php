<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'duration'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function phrases(): BelongsToMany
    {
        return $this->belongsToMany(Phrase::class);
    }
}
