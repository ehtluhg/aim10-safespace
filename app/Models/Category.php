<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'ss_categories';

    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'created_by'
    ];
}
