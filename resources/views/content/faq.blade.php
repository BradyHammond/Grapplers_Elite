@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - {{$name}}")

@section('stylesheets')
<link href="{{ asset('css/faq.css') }}" rel="stylesheet">
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
                                    <h5 class="modal-title" id="add-menu-label">Add New FAQ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/faq/add">
                                        @method('POST')
                                        @csrf
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">FAQ Age</legend>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-age" id="input-adult" value="Adult" checked>
                                                        <label class="form-check-label" for="input-adult">
                                                            Adult
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-age" id="input-junior" value="Junior">
                                                        <label class="form-check-label" for="input-junior">
                                                            Junior
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <label for="input-question" class="col-md-4 col-sm-4 col-form-label">FAQ Question</label>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea class=" form-control" name="input-question" id="input-question" rows="5" placeholder="FAQ Question..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-answer" class="col-md-4 col-sm-4 col-form-label">FAQ Answer</label>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea class=" form-control" name="input-answer" id="input-answer" rows="5" placeholder="FAQ Answer..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-order" class="col-md-4 col-sm-4 col-form-label">FAQ Order</label>
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
                    @foreach ($faqs as $faq)
                    <div class="card mb-1">
                        <div class="card-body">
                            <h4 class="card-title text-primary d-inline question">{{$faq->question}}</h4>
                            <span class="d-inline float-right pointer show-answer" data-toggle="collapse" data-target="#answer-{{$faq->id}}"><em class="fas fa-caret-right fa-lg text-primary"></em></span>
                            <div id="answer-{{$faq->id}}"class="collapse answer">
                                <p>{{$faq->answer}}</p>
                                @if(Auth::check())
                                    <div class="mx-auto text-center">
                                        <button id="edit" class="btn-primary btn-sm ml-1 pointer" data-toggle="modal" data-target="#{{$faq->id}}"><em class="fas fa-pencil-alt"></em></button>
                                        <form method="POST" action="/faq/delete/{{$faq->id}}" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" id="delete" class="btn-primary btn-sm pointer"><em class="fas fa-times"></em></button>
                                        </form>
                                    </div>
                                    <div class="modal fade" id="{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$faq->id}}-label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="{{$faq->id}}-label">Edit FAQ</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="/faq/edit/{{$faq->id}}" class="text-left">
                                                        @method('POST')
                                                        @csrf
                                                        <fieldset class="form-group">
                                                            <div class="row">
                                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">FAQ Age</legend>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="edit-age" id="edit-adult" value="Adult" checked>
                                                                        <label class="form-check-label" for="edit-adult">
                                                                            Adult
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="edit-age" id="edit-junior" value="Junior">
                                                                        <label class="form-check-label" for="edit-junior">
                                                                            Junior
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="form-group row">
                                                            <label for="input-question" class="col-md-4 col-sm-4 col-form-label">FAQ Question</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <textarea class=" form-control" name="edit-question" id="edit-question" rows="5" placeholder="FAQ Question...">{{$faq->question}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="input-answer" class="col-md-4 col-sm-4 col-form-label">FAQ Answer</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <textarea class=" form-control" name="edit-answer" id="edit-answer" rows="5" placeholder="FAQ Answer...">{{$faq->answer}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="edit-order" class="col-md-4 col-sm-4 col-form-label">FAQ Order</label>
                                                            <div class="col-md-8 col-sm-8">
                                                                <input type="number" class="form-control" name="edit-order" id="edit-order" value="{{$faq->order}}" required> 
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
<script src="{{ asset('js/faq.js') }}"></script>
@endsection