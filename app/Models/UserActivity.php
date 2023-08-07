<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserActivity extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_activity';
    protected $primaryKey = 'activity_id';
    protected $fillable = [
        'user_id',
        'actcategory_id',
        'activity_desc',
        'created_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function activityCategory(): BelongsTo
    {
        return $this->belongsTo(ActivityCategory::class, 'actcategory_id');
    }
}
