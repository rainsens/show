<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_team' => 'boolean',
    ];

    protected $with = [
        'members',
        'slides',
        'images',
        'links',
        'materials',
        'events',
        'permits',
        'comments',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function slides(): HasMany
    {
        return $this->hasMany(Slide::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class)->orderBy('created_at', 'desc');
    }

    public function permits(): HasMany
    {
        return $this->hasMany(Permit::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}
