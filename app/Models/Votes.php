<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;
    protected $table = 'votes';
    protected $fillable = [
        'name',
        'id_project',
        'ipaddress',
        'created_at',
        'updated_at',
        'email',
    ];
}
