@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - Contact")

@section('stylesheets')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12 col-12">
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">Contact Us</h3>
                <h6 class="card-subtitle mb-2 text-muted">Send us a message.</h6>
                <form class="form-horizontal" action="/contact/send" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-12 control-label no-padding" for="name">Name</label>
                            <div class="col-12 no-padding">
                                <input id="name" name="name" type="text" placeholder="Your Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-12 control-label no-padding" for="email">Email</label>
                            <div class="col-12 no-padding">
                                <input id="email" name="email" type="text" placeholder="Your Email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-12 control-label no-padding" for="subject">Subject</label>
                            <div class="col-12 no-padding">
                                <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-12 control-label no-padding" for="message">Message</label>
                            <div class="col-12 no-padding">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 text-center no-padding">
                                <button type="submit" id="submit" class="btn btn-primary btn-md" disabled>Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Contact Info</h3>
                <h6 class="card-subtitle mb-2 text-muted">Pay us a visit, give us a call, or follow us on social media.</h6>
                <iframe class="border-grey" width="100%" height="413px" src="https://www.google.com/maps/embed/v1/place?q=1231%20North%20Farm%20Lane%20Circle%2C%20Orem%2C%20UT%2084057&key=AIzaSyBAMtEJJJIxn5jj4ihaQN0mBgpwd_iWHHs" allowfullscreen></iframe>
                <div class="text-center">
                    <a href="tel:1-801-636-4136" class="mx-1"><em class="fas fa-phone-square fa-4x"></em></a>
                    <a href="https://www.facebook.com/Grapplers-Elite-92217569640/" class="mx-1"><em class="fab fa-facebook-square fa-4x"></em></a>
                    <a href="https://twitter.com/grapplerselite?lang=en" class="mx-1"><em class="fab fa-twitter-square fa-4x"></em></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection