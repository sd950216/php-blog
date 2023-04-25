<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['username', 'title', 'subtitle', 'img_url','body'];

}
