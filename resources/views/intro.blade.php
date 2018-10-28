@extends('layouts.app')

@section('content')
    <nav class="primary-color-dark">
        <div class="nav-wrapper">
            <a class="brand-logo" href="{{ url('/') }}" >
                <img src="{{ asset('img/axolotlNormal.svg') }}"  width="48"  >
            </a>
            <ul id="nav-mobile-home" class="right hide-on-med-and-down">
                @if(Auth::guest())
                    <li><a href="{{url('/login')}}">Login</a></li>
                @else
                    <li><a href="{{url('/home')}}">Home</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <logo-anim></logo-anim>
@endsection
