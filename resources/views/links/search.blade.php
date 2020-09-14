@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Links <small>({{ $links->count() }})</small>
            </div>
            <div class="card-body">
                @forelse ($links as $link)
                    <article class="mb-3">
                        <h2>{{ $link->title }}</h2>
                        <p class="m-0">{{ $link->description }}</body>
                        <p class="m-0">{{ $link->keywords }}</body>
                        <p class="m-0">{{ $link->link }}</body>

                    </article>
                @empty
                    <p>No link found</p>
                @endforelse
            </div>
        </div>
    </div>
@stop
