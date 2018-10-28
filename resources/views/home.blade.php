@extends('layouts.app')

@section('content')
    <ul id="nav-mobile" class="secondary-color sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <a href="{{url('/home')}}"><span class="white-text name">{{ Auth::user()->username }}</span></a>
                <a href="{{url('/home')}}"><span class="white-text email">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></a>
            </div>
        </li>
        <li class="divider"></li>
        <li class="bold active">
            <a href="{{url('/home')}}" class="waves-effect waves-white white-text">Stundenplan</a>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <div class="collapsible-header waves-effect white-text" style="padding: 0 30px;">Termine</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <a href="{{url('/')}}" class="col s12">Erstellen</a>
                            <a href="{{url('/')}}" class="col s12">Gruppe erstellen</a>
                            <a href="{{url('/')}}" class="col s12">Liste</a>
                        </div>
                    </div>
                </li>
                <li class="bold">
                    <div class="collapsible-header waves-effect white-text" style="padding: 0 30px;">Klassen</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>
        </li>
        <li class="divider"></li>
        <li>
            <ul class="collapsible">
                <li>
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="collapsible-header white-text"><i class="material-icons icon-white">exit_to_app</i>Abmelden</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
@endsection
