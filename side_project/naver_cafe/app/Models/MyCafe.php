<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCafe extends Model
{
    use HasFactory;

    protected $fillable = [
        "visit",
        "level",
        "file_number"
    ];
}
