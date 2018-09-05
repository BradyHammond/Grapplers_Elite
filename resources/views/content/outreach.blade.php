@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - $name")

@section('stylesheets')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    @if(Auth::check())
                        <h3 class="card-title d-inline">{{$name}}</h3>
                        <button type="button" id="edit" class="btn-primary btn-sm ml-1 pointer float-right d-inline" data-toggle="modal" data-target="#edit-menu"><em class="fas fa-pencil-alt"></em></button>
                    @else
                        <h3 class="card-title">{{$name}}</h3>
                    @endif
                    @if(Auth::check())
                        <div class="modal fade" id="edit-menu" tabindex="-1" role="dialog" aria-labelledby="edit-menu-label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit-menu-label">Edit Outreach Content</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/outreach/edit/{{$outreach->id}}">
                                            @method('POST')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="edit-content" class="col-md-4 col-sm-4 col-form-label">Rich HTML Editor</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <textarea class=" form-control" name="edit-content" id="edit-content" rows="5" placeholder="Content..." required>{{$outreach->content}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="text-center offset-4 col-4">
                                                    <button type="submit" class="btn btn-primary btn-square">Edit <em class="fas fa-pencil-alt"></em></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div>
                        {!!$outreach->content!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection