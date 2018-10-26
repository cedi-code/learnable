@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="notification">
            @for ($i = 0; $i < count($classes); $i++)
                <h1>{{$classes[$i]["title"]}}</h1>
                <table-box :content="{{collect($users) }}" :is-admin="{{ Auth::user()->is_admin}}" ></table-box>
                <br>
            @endfor
        </div>
    </div>


@endsection

