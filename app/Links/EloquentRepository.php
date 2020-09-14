<?php


namespace App\Links;


use App\Link;
use Illuminate\Database\Eloquent\Collection;

class EloquentRepository implements LinksRepository
{

    public function search(string $query = ''): Collection
    {
        return Link::query()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('keywords', 'like', "%{$query}%")
            ->orWhere('link', 'like', "%{$query}%")
            ->get();
    }
}
