@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url('search') }}" method="get">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <input
                            type="text"
                            name="q"
                            class="form-control"
                            placeholder="Search..."
                            value="{{ request('q') }}"
                        />
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
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
