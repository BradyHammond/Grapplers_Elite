@extends('layouts.template')

@section('angular', "ng-app=tournament")

@section('meta')
@endsection

@section('title', "Grapplers Elite - Tournaments")

@section('stylesheets')
<link href="{{ asset('css/tournaments.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <div class="card mb-3">
            <div class="card-body" ng-controller="tournamentController">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-7 pr-0">
                        <h3 class="card-title">Tournaments</h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-5">
                        <div class="float-right">
                            <button type="button" id="filter" class="btn-primary btn-sm pointer filter"><em class=" fas fa-filter"></em></button>
                            @if(Auth::check())
                                <button type="button" id="add" class="btn-primary btn-sm ml-1 pointer" data-toggle="modal" data-target="#add-menu"><em class="fas fa-plus"></em></button>
                            @endif
                        </div>
                    </div>
                </div>
                @if(Auth::check())
                    <div class="modal fade" id="add-menu" tabindex="-1" role="dialog" aria-labelledby="add-menu-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="add-menu-label">Add New Tournament</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/tournaments/add">
                                        @method('POST')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="input-name" class="col-md-4 col-sm-4 col-form-label">Event Name</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input type="text" class="form-control" name="input-name" id="input-name" placeholder="Event Name" required> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-url" class="col-md-4 col-sm-4 col-form-label">Event Website</label>
                                            <div class="input-group col-md-8 col-sm-8">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">https://</div>
                                                </div>
                                                <input type="text" class="form-control" name="input-url" id="input-url" placeholder="www.example.com" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-date" class="col-md-4 col-sm-4 col-form-label">Event Date</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input type="date" class="form-control" name="input-date" id="input-date" placeholder="Event Date" required> 
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">Event Type</legend>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-type" id="input-gi" value="gi-only" checked>
                                                        <label class="form-check-label" for="input-gi">
                                                            Gi Only
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-type" id="input-nogi" value="ng-only">
                                                        <label class="form-check-label" for="input-nogi">
                                                            No Gi Only
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-type" id="input-gi&nogi" value="gi&nogi">
                                                        <label class="form-check-label" for="input-gi&nogi">
                                                            Gi & No Gi
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">Event Age</legend>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-age" id="input-kids" value="kids-only" checked>
                                                        <label class="form-check-label" for="input-kids">
                                                            Kids Only
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-age" id="input-adults" value="adults-only">
                                                        <label class="form-check-label" for="input-adults">
                                                            Adults Only
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-age" id="input-kids&adults" value="kids&adults">
                                                        <label class="form-check-label" for="input-kids&adults">
                                                            Kids & Adults
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-md-4 col-sm-4 pt-0">Event Gender</legend>
                                                <div class="col-md-8 col-sm-8">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-gender" id="input-male" value="m-only" checked>
                                                        <label class="form-check-label" for="input-male">
                                                            Male Only
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-gender" id="input-female" value="f-only">
                                                        <label class="form-check-label" for="input-female">
                                                            Female Only
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="input-gender" id="input-male&female" value="male&female">
                                                        <label class="form-check-label" for="input-male&female">
                                                            Male & Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <label for="input-price" class="col-md-4 col-sm-4 col-form-label">Event Price</label>
                                            <div class="input-group col-md-8 col-sm-8">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">$</div>
                                                </div>
                                                <input type="number" step="0.01" class="form-control" name="input-price" id="input-price" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-location" class="col-md-4 col-sm-4 col-form-label">Event Location</label>
                                            <div class="col-md-8 col-sm-8">
                                                <input type="text" class="form-control" name="input-location" id="input-location" placeholder="Event Location"> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-notes" class="col-md-4 col-sm-4 col-form-label">Event Notes</label>
                                            <div class="col-md-8 col-sm-8">
                                                <textarea class=" form-control" name="input-notes" id="input-notes" rows="5" placeholder="Event Notes"></textarea>
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
                <div id="filter-menu" class="p-5 bg-light hidden">
                    <form>
                        <div class="filter-group">
                            <!--<h5>Filter by Date</h5>
                            <div class="mb-3 calendar" id="calendar"></div>-->
                            <h5>Filter by Type</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="gi" ng-model="options.type" value="gi-only">
                                <label class="form-check-label" for="gi">
                                    Gi Only
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="nogi" ng-model="options.type" value="ng-only">
                                <label class="form-check-label" for="nogi">
                                    No Gi Only
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="gi&nogi" ng-model="options.type" value="gi&nogi">
                                <label class="form-check-label" for="gi&nogi">
                                    Gi & No Gi
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="type" id="alltypes" ng-model="options.type" value="" ng-checked="true">
                                <label class="form-check-label" for="alltypes">
                                    Show All
                                </label>
                            </div>
                            <h5>Filter by Age</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="age" id="kids" ng-model="options.age" value="kids-only">
                                <label class="form-check-label" for="kids">
                                    Kids Only
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="age" id="adults" ng-model="options.age" value="adults-only">
                                <label class="form-check-label" for="adults">
                                    Adults Only
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="age" id="kids&adults" ng-model="options.age" value="kids&adults">
                                <label class="form-check-label" for="kids&adults">
                                    Kids & Adults
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="age" id="allages" value="" ng-model="options.age" ng-checked="true">
                                <label class="form-check-label" for="allages">
                                    Show All
                                </label>
                            </div>
                            <h5>Filter by Gender</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" ng-model="options.gender" value="m-only">
                                <label class="form-check-label" for="male">
                                    Male Only
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" ng-model="options.gender" value="f-only">
                                <label class="form-check-label" for="female">
                                    Female Only
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="gender" id="allgenders" value="" ng-model="options.gender" ng-checked="true">
                                <label class="form-check-label" for="allgenders">
                                    Show All
                                </label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button type="button" class="btn btn-light btn-square filter">Close <em class="fas fa-times"></em></button>
                    </div>
                </div>
                <div class="loader" ng-show="loading"></div>
                <table id="tournament-table" class="table text-center hidden">
                    <thead>
                        <tr>
                        <th></th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Type</th>
                        <th class="hide-col" scope="col">Age</th>
                        <th class="hide-col" scope="col">Gender</th>
                        </tr>
                    </thead>
                    <tbody ng-repeat="tournament in tournaments | orderBy: 'date' | filter:options">
                        <tr>
                            <td class="expand-table arrow" ng-click="expandTable($event)"><em class="fas fa-2x fa-caret-right pointer"></em></td>
                            <td class="align-middle" scope="col"><a href="<%tournament.url%>"><%tournament.name%></a></td>
                            <td class="align-middle" scope="col"><%tournament.date | date : "MMM d, y" %></td>
                            <td class="align-middle" scope="col" ng-if="tournament.type=='ng-only'">No Gi Only</td>
                            <td class="align-middle" scope="col" ng-if="tournament.type=='gi-only'">Gi Only</td>
                            <td class="align-middle" scope="col" ng-if="tournament.type=='gi&nogi'">Gi & No Gi</td>
                            <td class="align-middle hide-col" scope="col" ng-if="tournament.age=='kids-only'">Kids Only</td>
                            <td class="align-middle hide-col" scope="col" ng-if="tournament.age=='adults-only'">Adults Only</td>
                            <td class="align-middle hide-col" scope="col" ng-if="tournament.age=='kids&adults'">Kids & Adults</td>
                            <td class="align-middle hide-col" scope="col" ng-if="tournament.gender=='m-only'">Male Only</td>
                            <td class="align-middle hide-col" scope="col" ng-if="tournament.gender=='f-only'">Female Only</td>
                            <td class="align-middle hide-col" scope="col" ng-if="tournament.gender=='male&female'">Male & Female</td>
                        </tr>
                        <tr class="table-secondary hidden">
                            <td colspan="6">
                                <div class="collapse">
                                    <ul class="text-left">
                                        <li class="show-col"ng-if="tournament.age=='kids-only'"><strong>Age: </strong>Kids Only</li>
                                        <li class="show-col"ng-if="tournament.age=='adults-only'"><strong>Age: </strong>Adults Only</li>
                                        <li class="show-col"ng-if="tournament.age=='kids&adults'"><strong>Age: </strong>Kids & Adults</li>
                                        <li class="show-col" ng-if="tournament.gender=='m-only'"><strong>Gender: </strong>Male Only</li>
                                        <li class="show-col" ng-if="tournament.gender=='f-only'"><strong>Gender: </strong>Female Only</li>
                                        <li class="show-col" ng-if="tournament.gender=='male&female'"><strong>Gender: </strong>Male & Female</li>
                                        <li ng-if="tournament.pricing.includes('.')"><strong>Pricing: </strong>$<%tournament.pricing%></li>
                                        <li ng-if="!tournament.pricing.includes('.')"><strong>Pricing: </strong>$<%tournament.pricing%>.00</li>
                                        <li><strong>Location: </strong><%tournament.location%></li>
                                        <li ng-if="tournament.notes!=''&&tournament.notes!=null"><strong>Notes: </strong><%tournament.notes%></li>
                                        <li ng-if="tournament.notes==''||tournament.notes==null"><strong>Notes: </strong>N/A</li>
                                    </ul>
                                    @if(Auth::check())
                                        <div class="mx-auto">
                                            <button id="edit" class="btn-primary btn-sm ml-1 pointer" data-toggle="modal" data-target="#<%tournament.id%>"><em class="fas fa-pencil-alt"></em></button>
                                            <form method="POST" action="<%getDeleteURL(tournament.id)%>" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" id="delete" class="btn-primary btn-sm pointer"><em class="fas fa-times"></em></button>
                                            </form>
                                        </div>
                                        <div class="modal fade" id="<%tournament.id%>" tabindex="-1" role="dialog" aria-labelledby="<%tournament.id%>-label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="<%tournament.id%>-label">Edit Tournament</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><em class="fas fa-times"></em></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="<%getEditURL(tournament.id)%>" class="text-left">
                                                            @method('POST')
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="input-name" class="col-md-4 col-sm-4 col-form-label">Event Name</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input type="text" class="form-control" name="edit-name" id="edit-name" placeholder="Event Name" value="<%tournament.name%>" required> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="edit-url" class="col-md-4 col-sm-4 col-form-label">Event Website</label>
                                                                <div class="input-group col-md-8 col-sm-8">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">https://</div>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="edit-url" id="edit-url" placeholder="www.example.com" value="<%tournament.url.substring(8)%>" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="input-date" class="col-md-4 col-sm-4 col-form-label">Event Date</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input type="date" class="form-control" name="edit-date" id="edit-date" placeholder="Event Date"  value="<%tournament.date | date : 'yyyy-MM-dd'%>" required> 
                                                                </div>
                                                            </div>
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <legend class="col-form-label col-md-4 col-sm-4 pt-0">Event Type</legend>
                                                                    <div class="col-md-8 col-sm-8">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-type" id="edit-gi" value="gi-only" ng-if="tournament.type=='gi-only'" ng-checked="true" che>
                                                                            <input class="form-check-input" type="radio" name="edit-type" id="edit-gi" value="gi-only" ng-if="tournament.type!='gi-only'">
                                                                            <label class="form-check-label" for="edit-gi">
                                                                                Gi Only
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-type" id="edit-nogi" value="ng-only" ng-if="tournament.type=='ng-only'" ng-checked="true" checked>
                                                                            <input class="form-check-input" type="radio" name="edit-type" id="edit-nogi" value="ng-only" ng-if="tournament.type!='ng-only'">
                                                                            <label class="form-check-label" for="edit-nogi">
                                                                                No Gi Only
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-type" id="edit-gi&nogi" value="gi&nogi" ng-if="tournament.type=='gi&nogi'" ng-checked="true" checked>
                                                                            <input class="form-check-input" type="radio" name="edit-type" id="edit-gi&nogi" value="gi&nogi" ng-if="tournament.type!='gi&nogi'">
                                                                            <label class="form-check-label" for="edit-gi&nogi">
                                                                                Gi & No Gi
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <legend class="col-form-label col-md-4 col-sm-4 pt-0">Event Age</legend>
                                                                    <div class="col-md-8 col-sm-8">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-kids" value="kids-only" ng-if="tournament.age=='kids-only'" ng-checked="true" checked>
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-kids" value="kids-only" ng-if="tournament.age!='kids-only'">
                                                                            <label class="form-check-label" for="edit-kids">
                                                                                Kids Only
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-adults" value="adults-only" ng-if="tournament.age=='adults-only'" ng-checked="true" checked>
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-adults" value="adults-only" ng-if="tournament.age!='adults-only'">
                                                                            <label class="form-check-label" for="edit-adults">
                                                                                Adults Only
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-kids&adults" value="kids&adults" ng-if="tournament.age=='kids&adults'" ng-checked="true" checked>
                                                                            <input class="form-check-input" type="radio" name="edit-age" id="edit-kids&adults" value="kids&adults" ng-if="tournament.age!='kids&adults'">
                                                                            <label class="form-check-label" for="edit-kids&adults">
                                                                                Kids & Adults
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <legend class="col-form-label col-md-4 col-sm-4 pt-0">Event Gender</legend>
                                                                    <div class="col-md-8 col-sm-8">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-gender" id="edit-male" value="m-only" ng-if="tournament.gender=='m-only'" ng-checked="true" checked>
                                                                            <input class="form-check-input" type="radio" name="edit-gender" id="edit-male" value="m-only" ng-if="tournament.gender!='m-only'">
                                                                            <label class="form-check-label" for="edit-male">
                                                                                Male Only
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-gender" id="edit-female" value="f-only" ng-if="tournament.gender=='f-only'" ng-checked="true" checked>
                                                                            <input class="form-check-input" type="radio" name="edit-gender" id="edit-female" value="f-only" ng-if="tournament.gender!='f-only'">
                                                                            <label class="form-check-label" for="edit-female">
                                                                                Female Only
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="edit-gender" id="edit-male&female" value="male&female" ng-if="tournament.gender=='male&female'" ng-checked="true" checked>
                                                                            <input class="form-check-input" type="radio" name="edit-gender" id="edit-male&female" value="male&female" ng-if="tournament.gender!='male&female'">
                                                                            <label class="form-check-label" for="edit-male&female">
                                                                                Male & Female
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="form-group row">
                                                                <label for="input-price" class="col-md-4 col-sm-4 col-form-label">Event Price</label>
                                                                <div class="input-group col-md-8 col-sm-8">
                                                                    <div class="input-group-prepend">
                                                                    <div class="input-group-text">$</div>
                                                                    </div>
                                                                    <input type="number" step="0.01" class="form-control" name="edit-price" id="edit-price" placeholder="0.00" value="<%tournament.pricing%>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="input-location" class="col-md-4 col-sm-4 col-form-label">Event Location</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <input type="text" class="form-control" name="edit-location" id="edit-location" placeholder="Event Location" value="<%tournament.location%>"> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="input-notes" class="col-md-4 col-sm-4 col-form-label">Event Notes</label>
                                                                <div class="col-md-8 col-sm-8">
                                                                    <textarea class=" form-control" name="edit-notes" id="edit-notes" rows="5" placeholder="Event Notes"><%tournament.notes%></textarea>
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
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/angular/angular.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/tournaments.js') }}"></script>
@endsection