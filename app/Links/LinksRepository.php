<?php


namespace App\Links;


use Illuminate\Database\Eloquent\Collection;

interface LinksRepository
{
    public function search(string $query = ''): Collection;
}
