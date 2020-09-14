<?php

namespace App;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use Searchable;

    protected $fillable = [
        'title', 'link', 'description', 'keywords', 'favicon', 'password'
    ];
}
