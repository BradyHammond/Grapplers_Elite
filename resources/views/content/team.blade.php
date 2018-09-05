@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - $name")

@section('stylesheets')
<link href="{{ asset('css/team.css') }}" rel="stylesheet">
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
                                    <h5 class="modal-title" id="add-menu-label">Add Team Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/team/add" enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="input-first-name" class="col-md-4 col-sm-4 col-form-label">First Name</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input type="text" class="form-control" name="input-first-name" id="input-first-name" required> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-last-name" class="col-md-4 col-sm-4 col-form-label">Last Name</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input type="text" class="form-control" name="input-last-name" id="input-last-name" required> 
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">Captain</legend>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-captain" id="captain-true" value="True">
                                                        <label class="form-check-label" for="captain-true">
                                                            True
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-captain" id="captain-false" value="False" checked>
                                                        <label class="form-check-label" for="captain-false">
                                                            False
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">Belt</legend>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-belt" id="belt-white" value="White" checked>
                                                        <label class="form-check-label" for="belt-white">
                                                            White Belt
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-belt" id="belt-blue" value="Blue">
                                                        <label class="form-check-label" for="belt-blue">
                                                            Blue Belt
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-belt" id="belt-purple" value="Purple">
                                                        <label class="form-check-label" for="belt-purple">
                                                            Purple Belt
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-belt" id="belt-brown" value="Brown">
                                                        <label class="form-check-label" for="belt-brown">
                                                            Brown Belt
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-belt" id="belt-black" value="Black">
                                                        <label class="form-check-label" for="belt-black">
                                                            Brown Belt
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <label for="input-bio" class="col-md-4 col-sm-4 col-form-label">Biography</label>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea class=" form-control" name="input-bio" id="input-bio" rows="5" placeholder="Biography..."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-awards" class="col-md-4 col-sm-4 col-form-label">Awards</label>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea class=" form-control" name="input-awards" id="input-awards" rows="5" placeholder="Awards (comma separated)..."></textarea>
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
                    @foreach ($team as $member)
                        <div class="card-flip col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="flip">
                                <div class="front">
                                    <div class="card card-flip">
                                        @if (is_null($member->image))
                                            <img class="card-img-top team-img" src="https://upload.wikimedia.org/wikipedia/commons/9/93/Default_profile_picture_%28male%29_on_Facebook.jpg" alt="Default Team Member Portrait">
                                        @else
                                            <img class="card-img-top team-img" src="{{asset('storage/' . $member->image)}}" alt="Team Member Portrait">
                                        @endif
                                        <div class="card-body">
                                            <h4 class="card-title">{{$member->first_name}} {{$member->last_name}}</h4>
                                            <h5 class="card-subtitle mb-2 text-muted">{{$member->belt}} Belt</h5>
                                            <p class="card-text overflow-scroll">{{$member->bio}}</p>
                                            <div class="mx-auto text-center">
                                                <a href="#" class="card-link fixed-bottom-card mx-atuo" onclick="flip(this)">See Awards <em class="fas fa-share"></em></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="card card-flip">
                                        <div class="card-body">
                                            @if (!is_null($member->awards))
                                                @php
                                                    $award_list = explode(",", $member->awards);
                                                @endphp
                                                <ul class="overflow-scroll">
                                                    @foreach ($award_list as $award)
                                                        <li>{{trim($award)}}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="card-text">No Award Information Found.</p>
                                            @endif
                                            <div class="mx-auto text-center">
                                                @if(Auth::check())
                                                    <button id="edit" class="btn-primary btn-sm ml-1 pointer" data-toggle="modal" data-target="#{{$member->id}}"><em class="fas fa-pencil-alt"></em></button>
                                                    <form method="POST" action="/team/delete/{{$member->id}}" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" id="delete" class="btn-primary btn-sm pointer"><em class="fas fa-times"></em></button>
                                                    </form>
                                                @endif
                                                <a href="#" class="card-link fixed-bottom-card mx-atuo" onclick="flip(this)">See Biography <em class="fas fa-share"></em></a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Auth::check())
                            <div class="modal fade" id="{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$member->id}}-label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="{{$member->id}}-label">Edit Team Member</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="/team/edit/{{$member->id}}" enctype="multipart/form-data">
                                                @method('POST')
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="edit-first-name" class="col-md-4 col-sm-4 col-form-label">First Name</label>
                                                    <div class="col-md-8 col-sm-8">
                                                        <input type="text" class="form-control" name="edit-first-name" value="{{$member->first_name}}" id="edit-first-name" required> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="edit-last-name" class="col-md-4 col-sm-4 col-form-label">Last Name</label>
                                                    <div class="col-md-8 col-sm-8">
                                                        <input type="text" class="form-control" name="edit-last-name" value="{{$member->last_name}}" id="edit-last-name" required> 
                                                    </div>
                                                </div>
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <legend class="col-form-label col-md-4 col-sm-4 pt-0">Captain</legend>
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="form-check">
                                                                @if($member->captain)
                                                                    <input class="form-check-input" type="radio" name="edit-captain" id="edit-captain-true" value="True" checked>
                                                                @else
                                                                    <input class="form-check-input" type="radio" name="edit-captain" id="edit-captain-true" value="True">
                                                                @endif
                                                                <label class="form-check-label" for="edit-captain-true">
                                                                    True
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                @if($member->captain)
                                                                    <input class="form-check-input" type="radio" name="edit-captain" id="edit-captain-false" value="False">
                                                                @else
                                                                    <input class="form-check-input" type="radio" name="edit-captain" id="edit-captain-false" value="False" checked>
                                                                @endif
                                                                <label class="form-check-label" for="edit-captain-false">
                                                                    False
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <legend class="col-form-label col-md-4 col-sm-4 pt-0">Belt</legend>
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="form-check">
                                                                @if($member->belt === "White")
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-white" value="White" checked>
                                                                @else
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-white" value="White">
                                                                @endif
                                                                <label class="form-check-label" for="edit-belt-white">
                                                                    White Belt
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                @if($member->belt === "Blue")
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-blue" value="Blue" checked>
                                                                @else
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-blue" value="Blue">
                                                                @endif
                                                                <label class="form-check-label" for="edit-belt-blue">
                                                                    Blue Belt
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                @if($member->belt === "Purple")
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-purple" value="Purple" checked>
                                                                @else
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-purple" value="Purple">
                                                                @endif
                                                                <label class="form-check-label" for="edit-belt-purple">
                                                                    Purple Belt
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                @if($member->belt === "Brown")
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-brown" value="Brown" checked>
                                                                @else
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-brown" value="Brown">
                                                                @endif
                                                                <label class="form-check-label" for="edit-belt-brown">
                                                                    Brown Belt
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                @if($member->belt === "Black")
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-black" value="Black" checked>
                                                                @else
                                                                    <input class="form-check-input" type="radio" name="edit-belt" id="edit-belt-black" value="Black">
                                                                @endif
                                                                <label class="form-check-label" for="edit-belt-black">
                                                                    Brown Belt
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group row">
                                                    <label for="edit-bio" class="col-md-4 col-sm-4 col-form-label">Biography</label>
                                                    <div class="col-md-8 col-sm-8">
                                                        <textarea class=" form-control" name="edit-bio" id="edit-bio" rows="5" placeholder="Biography...">{{$member->bio}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="edit-awards" class="col-md-4 col-sm-4 col-form-label">Awards</label>
                                                    <div class="col-md-8 col-sm-8">
                                                        <textarea class=" form-control" name="edit-awards" id="edit-awards" rows="5" placeholder="Awards (comma separated)...">{{$member->awards}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4 col-sm-4 col-form-label">Image</div>
                                                    <div class="col-md-8 col-sm-8 custom-file">
                                                        <input type="file" class="custom-file-input pointer" accept=".jpg, .jpeg, .png" name="edit-image" id="edit-image"  onchange="fileSelected(this)">
                                                        @if(is_null($member->image))
                                                            <label class="custom-file-label text-truncate mx-3" for="edit-image">Choose File</label>
                                                        @else
                                                            <label class="custom-file-label text-truncate mx-3" for="edit-image">{{$member->image}}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="edit-order" class="col-md-4 col-sm-4 col-form-label">Order</label>
                                                    <div class="col-md-8 col-sm-8">
                                                        <input type="number" class="form-control" name="edit-order" id="edit-order" value="{{$member->order}}" required> 
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/team.js') }}"></script>
@endsection