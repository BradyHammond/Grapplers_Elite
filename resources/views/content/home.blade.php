@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite")

@section('stylesheets')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content-super')
<div class="main-content">
    <div class="jumbotron jumbotron-fluid jumbotron-main" style="background-image: url({{asset('storage/images/jiu_jitsu2.png')}})">
        <div class="jumbotron jumbotron-fluid jumbotron-sub text-right">
            <div class="container mr-0">
                <h1 class="display-2 home-header">Grapplers Elite</h1>
                <div class="container text-left">
                    @if(Auth::check())
                        <div class="row">
                            <div class="col-lg-4 offset-lg-8 col-md-12 col-12">
                                <div class="card mb-3">
                                    <div class="card-body text-center">
                                        <h4 class="card-title text-primary d-inline header">Administrator</h4>
                                        <div class="content">
                                            <div>
                                                <button type="button" id="add" class="btn btn-primary btn-square btn-sm mx-auto" data-toggle="modal" data-target="#add-menu">Add Section</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="add-menu" tabindex="-1" role="dialog" aria-labelledby="add-menu-label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="add-menu-label">Add Front Page Section</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/home/add">
                                            @method('POST')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="input-header" class="col-md-4 col-sm-4 col-form-label">Header</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class=" form-control" type="text" name="input-header" id="input-header" placeholder="Header..." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-overview" class="col-md-4 col-sm-4 col-form-label">Content</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <textarea class=" form-control" name="input-content" id="input-content" rows="5" placeholder="Content..." required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-header" class="col-md-4 col-sm-4 col-form-label">Action Link</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class=" form-control" type="text" name="input-link" id="input-link" placeholder="Link...">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-header" class="col-md-4 col-sm-4 col-form-label">Action Button Label</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input class=" form-control" type="text" name="input-link-label" id="input-link-label" placeholder="Label...">
                                                </div>
                                            </div>
                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-md-4 col-sm-4 pt-0">Alignment</legend>
                                                    <div class="col-md-8 col-sm-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="input-alignment" id="input-left" value="Left" checked required>
                                                            <label class="form-check-label" for="input-alignment">Left</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="input-alignment" id="input-center" value="Center" required>
                                                            <label class="form-check-label" for="input-center">Center</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="input-alignment" id="input-right" value="Right" required>
                                                            <label class="form-check-label" for="input-right">Right</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
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
                    @foreach ($home as $section)
                        <div class="row">
                            @if ($section->alignment === "Left")
                                <div class="col-lg-4 col-md-12 col-12">
                            @elseif($section->alignment === "Center")
                                <div class="col-lg-4 offset-lg-4 col-md-12 col-12">
                            @else
                                <div class="col-lg-4 offset-lg-8 col-md-12 col-12">
                            @endif
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary d-inline header">{{$section->header}}</h4>
                                        <div class="content">
                                            <p>{{$section->content}}</p>
                                            <div class="text-center">
                                                @if ((is_null($section->link) || $section->link === "")&&((!is_null($section->link_label)) || $section->link_label !== ""))
                                                    <a href="#" class="btn btn-primary btn-square btn-sm mx-auto disabled" role="button" aria-disabled="true">{{$section->link_label}}</a>
                                                @elseif (((!is_null($section->link)) || $section->link !== "")&&(is_null($section->link_label) || $section->link_label === ""))
                                                    <a href="{{$section->link}}" class="btn btn-primary btn-square btn-sm mx-auto" role="button" aria-disabled="true"> </a>
                                                @elseif (((!is_null($section->link)) || $section->link !== "")&&((!is_null($section->link_label)) || $section->link_label !== ""))
                                                    <a href="{{$section->link}}" class="btn btn-primary btn-square btn-sm mx-auto disabled" role="button" aria-disabled="true">{{$section->link_label}}</a>
                                                @endif
                                            </div>
                                            @if(Auth::check())
                                                <div class="mx-auto mt-3 text-center">
                                                    <button id="edit" class="btn-primary btn-sm ml-1 pointer" data-toggle="modal" data-target="#{{$section->id}}"><em class="fas fa-pencil-alt"></em></button>
                                                    <form method="POST" action="/home/delete/{{$section->id}}" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" id="delete" class="btn-primary btn-sm pointer"><em class="fas fa-times"></em></button>
                                                    </form>
                                                </div>
                                                <div class="modal fade" id="{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$section->id}}-label" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="{{$section->id}}-label">Edit Section</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="/home/edit/{{$section->id}}" class="text-left">
                                                                    @method('POST')
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                        <label for="input-header" class="col-md-4 col-sm-4 col-form-label">Header</label>
                                                                        <div class="col-md-8 col-sm-8">
                                                                            <input class=" form-control" type="text" name="edit-header" id="edit-header" placeholder="Header..." value="{{$section->header}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="input-overview" class="col-md-4 col-sm-4 col-form-label">Content</label>
                                                                        <div class="col-md-8 col-sm-8">
                                                                            <textarea class=" form-control" name="edit-content" id="edit-content" rows="5" placeholder="Content..." required>{{$section->content}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="edit-link" class="col-md-4 col-sm-4 col-form-label">Action Link</label>
                                                                        <div class="col-md-8 col-sm-8">
                                                                            <input class=" form-control" type="text" name="edit-link" id="edit-link" placeholder="Link..." value="{{$section->link}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="edit-link-label" class="col-md-4 col-sm-4 col-form-label">Action Button Label</label>
                                                                        <div class="col-md-8 col-sm-8">
                                                                            <input class=" form-control" type="text" name="edit-link-label" id="edit-link-label" placeholder="Label..." value="{{$section->link_label}}">
                                                                        </div>
                                                                    </div>
                                                                    <fieldset class="form-group">
                                                                        <div class="row">
                                                                            <legend class="col-form-label col-md-4 col-sm-4 pt-0">Alignment</legend>
                                                                            <div class="col-md-8 col-sm-8">
                                                                                <div class="form-check">
                                                                                    @if ($section->alignment === "Left")
                                                                                        <input class="form-check-input" type="radio" name="edit-alignment" id="edit-left" value="Left" checked required>
                                                                                    @else
                                                                                        <input class="form-check-input" type="radio" name="edit-alignment" id="edit-left" value="Left"required>
                                                                                    @endif
                                                                                    <label class="form-check-label" for="edit-alignment">Left</label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    @if ($section->alignment === "Center")
                                                                                        <input class="form-check-input" type="radio" name="edit-alignment" id="edit-center" value="Center" checked required>
                                                                                    @else
                                                                                        <input class="form-check-input" type="radio" name="edit-alignment" id="edit-center" value="Center" required>
                                                                                    @endif
                                                                                    <label class="form-check-label" for="edit-center">Center</label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    @if ($section->alignment === "Right")
                                                                                        <input class="form-check-input" type="radio" name="edit-alignment" id="edit-right" value="Right" checked required>
                                                                                    @else
                                                                                        <input class="form-check-input" type="radio" name="edit-alignment" id="edit-right" value="Right" required>
                                                                                    @endif
                                                                                    <label class="form-check-label" for="edit-right">Right</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="form-group row">
                                                                        <label for="input-order" class="col-md-4 col-sm-4 col-form-label">Order</label>
                                                                        <div class="col-md-8 col-sm-8">
                                                                            <input type="number" class="form-control" name="edit-order" id="edit-order" value="{{$section->order}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <div class="text-center offset-4 col-4">
                                                                            <button type="submit" class="btn btn-primary btn-square">Edit <em class="fas fa-plus"></em></button>
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