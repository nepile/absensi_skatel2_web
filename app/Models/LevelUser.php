<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'level_user';
    protected $primaryKey = 'level_id';
    protected $fillable = [
        'level_name'
    ];
}
