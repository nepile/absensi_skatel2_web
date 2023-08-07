<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Presensi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'presensi';
    protected $primaryKey = 'presensi_id';
    protected $fillable = [
        'user_id',
        'day',
        'month',
        'year',
        'time',
        'category',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
