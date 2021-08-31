<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'id_category',
        'thumbnail',
        'title',
        'desc',
        'year',
        'url_youtube',
        'url_gmeet',
        'created_at',
        'updated_at',
    ];
}
