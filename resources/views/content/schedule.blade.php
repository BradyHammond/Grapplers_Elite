@extends('layouts.template')

@section('meta')
@endsection

@section('title', "Grapplers Elite - Schedule")

@section('stylesheets')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12 col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Calendar</h3>
                <h6 class="card-subtitle mb-2 text-muted">See what's coming up!</h6>
                <div class="calendar" id="calendar"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12">
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Classes</h3>
                <h6 class="card-subtitle mb-2 text-muted"></h6>  
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge primary"><em class="fa fa-thumbtack"></em>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h5 class="timeline-title mt-2">Coming Soon</h5>
                            </div>
                            <div class="timeline-body">
                                <p>We are in the middle of migrating to a new scheduling software. When that process is finished, our schedule will be available here.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script>
$('#calendar').datepicker({
    });
</script>
@endsection