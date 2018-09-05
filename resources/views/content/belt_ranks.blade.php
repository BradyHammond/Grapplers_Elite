@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - $name")

@section('stylesheets')
<link href="{{ asset('css/belt_ranks.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <div class="card mb-3">
            <div class="card-body">
                @if(Auth::check())
                    <h3 class="card-title d-inline">{{$name}}</h3>
                    <button type="button" id="add" class="btn-primary btn-sm ml-1 pointer float-right d-inline" data-toggle="modal" data-target="#add-menu"><em class="fas fa-plus"></em></button>
                @else
                    <h3 class="card-title">{{$name}}</h3>
                @endif
                @if(Auth::check())
                    <div class="modal fade" id="add-menu" tabindex="-1" role="dialog" aria-labelledby="add-menu-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="add-menu-label">Add Belt Content</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/belt-ranks/add" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">Age</legend>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-check">
                                                        @if(strpos($name, 'Adult') !== false)
                                                            <input class="form-check-input" type="radio" name="input-age" id="input-adult" value="Adult" checked>
                                                        @else
                                                            <input class="form-check-input" type="radio" name="input-age" id="input-adult" value="Adult">
                                                        @endif
                                                        <label class="form-check-label" for="input-adult">
                                                            Adult
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        @if(strpos($name, 'Junior') !== false)
                                                            <input class="form-check-input" type="radio" name="input-age" id="input-junior" value="Junior" checked>
                                                        @else
                                                            <input class="form-check-input" type="radio" name="input-age" id="input-junior" value="Junior">
                                                        @endif
                                                        <label class="form-check-label" for="input-junior">
                                                            Junior
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <label for="input-header" class="col-md-4 col-sm-4 col-form-label">Header</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input class=" form-control" type="text" name="input-header" id="input-header" placeholder="Header..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-overview" class="col-md-4 col-sm-4 col-form-label">Overview</label>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea class=" form-control" name="input-overview" id="input-overview" rows="5" placeholder="Overview..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-stripes" class="col-md-4 col-sm-4 col-form-label">Stripes</label>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea class=" form-control" name="input-stripes" id="input-stripes" rows="5" placeholder="Stripes..."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-sm-4 col-form-label">Image</div>
                                            <div class="col-md-8 col-sm-8 custom-file">
                                                <input type="file" class="custom-file-input pointer" accept=".jpg, .jpeg, .png" name="input-image" id="input-image"  onchange="fileSelected(this)">
                                                <label class="custom-file-label mx-3" for="input-image">Choose File</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-order" class="col-md-4 col-sm-4 col-form-label">Order</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input type="number" class="form-control" name="input-order" id="input-order" required> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="text-center offset-4 col-4">
                                                <button type="submit" class="btn btn-primary btn-square">Add <em class="fas fa-plus"></em></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mt-3">
                    @foreach ($belts as $belt)
                    <div class="card mb-1">
                        <div class="card-body">
                            <h4 class="card-title text-primary d-inline header">
                                <span>{{$belt->header}}</span>
                                @if(!is_null($belt->image))
                                    <span><image class="img-fluid img-belt" src="{{asset('storage/' . $belt->image)}}" alt="Belt Image"></span>
                                @endif
                            </h4>
                            <div class="content">
                                <p><strong>Overview: </strong>{{$belt->overview}}</p>
                                <p><strong>Stripes: </strong>{{$belt->stripes}}</p>
                                @if(Auth::check())
                                    <div class="mx-auto text-center">
                                        <button id="edit" class="btn-primary btn-sm ml-1 pointer" data-toggle="modal" data-target="#{{$belt->id}}"><em class="fas fa-pencil-alt"></em></button>
                                        <form method="POST" action="/belt-ranks/delete/{{$belt->id}}" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" id="delete" class="btn-primary btn-sm pointer"><em class="fas fa-times"></em></button>
                                        </form>
                                    </div>
                                    <div class="modal fade" id="{{$belt->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$belt->id}}-label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="{{$belt->id}}-label">Edit Belt Content</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="/belt-ranks/edit/{{$belt->id}}" class="text-left" enctype="multipart/form-data">
                                                        @method('POST')
                                                        @csrf
                                                        <fieldset class="form-group">
                                                            <div class="row">
                                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">Age</legend>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <div class="form-check">
                                                                        @if($belt->age == "Adult")
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-adult" value="Adult" checked>
                                                                        @else
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-adult" value="Adult">
                                                                        @endif
                                                                        <label class="form-check-label" for="edit-adult">
                                                                            Adult
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        @if($belt->age == "Junior")
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-junior" value="Junior" checked>
                                                                        @else
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-junior" value="Junior">
                                                                        @endif
                                                                        <label class="form-check-label" for="edit-junior">
                                                                            Junior
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="form-group row">
                                                            <label for="edit-header" class="col-md-4 col-sm-4 col-form-label">Header</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input class=" form-control" type="text" name="edit-header" id="edit-header" placeholder="Header..." value="{{$belt->header}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="edit-overview" class="col-md-4 col-sm-4 col-form-label">Overview</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <textarea class=" form-control" name="edit-overview" id="edit-overview" rows="5" placeholder="Overview...">{{$belt->overview}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="edit-stripes" class="col-md-4 col-sm-4 col-form-label">Stripes</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <textarea class=" form-control" name="edit-stripes" id="edit-stripes" rows="5" placeholder="Stripes...">{{$belt->stripes}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-4 col-sm-4 col-form-label">Image</div>
                                                            <div class="col-md-8 col-sm-8 custom-file">
                                                                <input type="file" class="custom-file-input pointer" accept=".jpg, .jpeg, .png" name="edit-image" id="edit-image" onchange="fileSelected(this)">
                                                                @if(is_null($belt->image))
                                                                    <label class="custom-file-label text-truncate mx-3" for="edit-image">Choose File</label>
                                                                @else
                                                                    <label class="custom-file-label text-truncate mx-3" for="edit-image">{{$belt->image}}</label>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="edit-order" class="col-md-4 col-sm-4 col-form-label">Order</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input type="number" class="form-control" name="edit-order" id="edit-order" value="{{$belt->order}}" required> 
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
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/belt_ranks.js') }}"></script>
@endsection