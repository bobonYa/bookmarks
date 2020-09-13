@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">

                <div class="card-body">
                    <h2 class="card-title">Details</h2>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Link URL</label>
                                <input type="text" id="link" name="link" class="form-control" value="{{ $link->link }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                       value="{{ $link->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="name">META Description</label>
                                <textarea name="description" class="form-control">{{ $link->description }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="name">META Keywords</label>
                                <input type="text" id="link" name="link" class="form-control"
                                       value="{{ $link->keywords }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Favicon url</label>
                                <input type="text" id="favicon" name="favicon" class="form-control"
                                       value="{{ $link->favicon }}">
                            </div>

                            @if(!empty($link->favicon))
                                <div class="form-group">
                                    <img src="{{  $link->favicon }}" class="img-thumbnail">
                                </div>
                            @endif
                        </div>
                    </div>


                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first() }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(!empty($link->password))
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                            Delete
                        </button>


                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/dashboard/links/{{ $link->id }}" method="post">

                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Password</label>
                                                        <input type="password" id="password" name="password"
                                                               class="form-control"
                                                               value="">
                                                        @if($errors->first)
                                                            <div
                                                                class="invalid-feedback">{{ $errors->first('password') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete Link</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection
