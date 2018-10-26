@extends('layouts.app')

@section('content')

<div class="container">
    <div class="notification">
            <table-box :content="{{collect($teachers)  }}"  :is-admin="{{ Auth::user()->is_admin}}" :show-id="false"></table-box>
    </div>
</div>

@endsection
