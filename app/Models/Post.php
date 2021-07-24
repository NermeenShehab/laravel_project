<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{



    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];


    public function setTitleAttribute($value)
    {
     $this->attributes['title'] = $value;
     $this->attributes['slug'] = ($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}


