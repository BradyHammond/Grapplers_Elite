@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - $name")

@section('stylesheets')
<link href="{{ asset('css/policy.css') }}" rel="stylesheet">
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
                                        <h5 class="modal-title" id="add-menu-label">Add Policy Content</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/policies/add">
                                            @method('POST')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="input-header" class="col-md-4 col-sm-4 col-form-label">Header</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class=" form-control" type="text" name="input-header" id="input-header" placeholder="Header..." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-content" class="col-md-4 col-sm-4 col-form-label">Content</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <textarea class=" form-control" name="input-content" id="input-content" rows="5" placeholder="Content..." required></textarea>
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
                        @foreach ($policies as $policy)
                            <div class="card mb-1">
                                <div class="card-body">
                                    <h4 class="card-title text-primary d-inline header">{{$policy->header}}</h4>
                                    <div class="content">
                                        <p>{{$policy->content}}</p>
                                        @if(Auth::check())
                                            <div class="mx-auto text-center">
                                                <button id="edit" class="btn-primary btn-sm ml-1 pointer" data-toggle="modal" data-target="#{{$policy->id}}"><em class="fas fa-pencil-alt"></em></button>
                                                <form method="POST" action="/policies/delete/{{$policy->id}}" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" id="delete" class="btn-primary btn-sm pointer"><em class="fas fa-times"></em></button>
                                                </form>
                                            </div>
                                            <div class="modal fade" id="{{$policy->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$policy->id}}-label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="{{$policy->id}}-label">Edit Policy</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="/policies/edit/{{$policy->id}}" class="text-left">
                                                                @method('POST')
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <label for="edit-header" class="col-md-4 col-sm-4 col-form-label">Header</label>
                                                                    <div class="col-md-8 col-sm-8">
                                                                        <input class=" form-control" type="text" name="edit-header" id="edit-header" placeholder="Header..." value="{{$policy->header}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="edit-content" class="col-md-4 col-sm-4 col-form-label">Content</label>
                                                                    <div class="col-md-8 col-sm-8">
                                                                        <textarea class=" form-control" name="edit-content" id="edit-content" rows="5" placeholder="Content...">{{$policy->content}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="edit-order" class="col-md-4 col-sm-4 col-form-label">Order</label>
                                                                    <div class="col-md-8 col-sm-8">
                                                                        <input type="number" class="form-control" name="edit-order" id="edit-order" value="{{$policy->order}}" required>
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
@endsection