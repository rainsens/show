<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string $initiator
 * @property string|null $cover
 * @property string $title
 * @property string $brief
 * @property string $detail
 * @property int $progress
 * @property bool $is_team
 * @property string|null $team_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Event> $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Image> $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Link> $links
 * @property-read int|null $links_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Material> $materials
 * @property-read int|null $materials_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Member> $members
 * @property-read int|null $members_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permit> $permits
 * @property-read int|null $permits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Slide> $slides
 * @property-read int|null $slides_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ProjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereBrief($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereInitiator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTeamName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 * @mixin \Eloquent
 */
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

    public function tools(): HasMany
    {
        return $this->hasMany(Tool::class);
    }
}
