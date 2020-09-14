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
                        <a href="/dashboard/links/{{ $link->id }}"><h4>{{ $link->title }}</h4></a>
                        <p class="m-0">{{ $link->description }}</p>
                        <p class="m-0">{{ $link->keywords }}</p>
                        <p class="m-0"><a href="{{ $link->link }}" target="_blank">{{ $link->link }}</a></p>

                    </article>
                @empty
                    <p>No link found</p>
                @endforelse
            </div>
        </div>
    </div>
@stop
