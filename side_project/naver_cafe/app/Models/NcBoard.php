<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NcBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "view",
        "like",
        "comment_cnt"
    ];

    protected $foreignKey = "user_number";

    public function BoardUser(){
        return $this->belongsTo(User::class,"user_number","id");
    }
}
