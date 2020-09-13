@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Create a new link</h2>
                    <form action="/dashboard/links/new" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group required">
                                    <label for="name">Link URL</label>
                                    <input type="text" id="link" name="link" class="form-control{{ $errors->first('link') ? ' is-invalid' : '' }}" placeholder="https://google.com" value="{{ old('link') }}">
                                    @if($errors->first)
                                        <div class="invalid-feedback">{{ $errors->first('link') }}</div>
                                    @endif
                                    <small id="passwordHelpInline" class="text-muted">
                                        Required field.
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" id="password" name="password" class="form-control{{ $errors->first('password') ? ' is-invalid' : '' }}"  value="">
                                    <small id="passwordHelpInline" class="text-muted">
                                        Optional. For deletion only.
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary">Save Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
