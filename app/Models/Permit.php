<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project|null $project
 * @method static \Database\Factories\PermitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Permit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permit whereUserId($value)
 * @mixin \Eloquent
 */
class Permit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
