<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategories extends Model
{
    use HasFactory;
    protected $table = 'project_categories';
    protected $fillable = [
        'name',
        'id_jurusan',
    ];
}
