@extends('layouts.app')

@section('content')

    <div class="container">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="notification">
            <p class="title">Termine</p>
            <div class="columns">
            <div class="column">
                <p class="subtitle">Eigene:</p>
                @for ($i = 0; $i < count($eventsOwner); $i++)

                    <termin-box title="{{$eventsOwner[$i]["attributes"]["title"]}}" :is-creator="true" :id="{{$eventsOwner[$i]["attributes"]["id"]}}">
                        <template slot="descr">
                            {{$eventsOwner[$i]["attributes"]["description"]}}
                            <!--  -->
                        </template>
                    </termin-box>
                    <br>
                @endfor
            </div>
            <div class="column">
                <p class="subtitle">Geteilte:</p>
                @for ($i = 0; $i < count($eventsMember); $i++)

                    <termin-box title="{{$eventsMember[$i]["event"]["attributes"]["title"]}}" :id="{{$eventsMember[$i]["event"]["attributes"]["id"]}}">
                        <template slot="descr">
                            {{$eventsMember[$i]["event"]["attributes"]["description"]}}
                        </template>
                    </termin-box>
                    <br>
                @endfor
            </div>



            </div>
        </div>

    </div>
@endsection