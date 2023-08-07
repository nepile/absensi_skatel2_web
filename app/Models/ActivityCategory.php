<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'activity_category';
    protected $primaryKey = 'actcategory_id';
    protected $fillable = [
        'category_name'
    ];
}
