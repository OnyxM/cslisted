@extends('layouts.user')
@section('user.content')
<!-- END SIDEBAR & CONTENT -->
<div class="col-sm-9 py-2">
    <h2>Chat</h2>
    <div class="content-page">
        <div id="app">
            <chat :user="{{ auth()->user() }}" :conversations="{{ $conversations }}"></chat>
        </div>
    </div>
</div>
@endsection

@section("javascripts")
<script src="{{ asset('js/app.js?ver=0.0.4')  }}"></script>
@endsection