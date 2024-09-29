<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 *
 *
 * @property int $id
 * @property int $project_id
 * @property string $slide
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project|null $project
 * @method static \Database\Factories\SlideFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereSlide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Slide extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getSlideAttribute()
    {
        if (Str::startsWith($this->attributes['slide'], ['http://', 'https://'])) {
            return $this->attributes['slide'];
        } else {
            return asset($this->attributes['slide']);
        }
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
