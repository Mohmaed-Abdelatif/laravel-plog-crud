<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Add the fields you want to allow for mass assignment
    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
