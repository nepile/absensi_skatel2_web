<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'class_user';
    protected $primaryKey = 'class_id';
    protected $fillable = [
        'class_name'
    ];
}
