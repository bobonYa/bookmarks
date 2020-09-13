<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    protected $fillable = [
        'title', 'link', 'description', 'keywords', 'favicon', 'password'
    ];
}
