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
                    <termin-box title="{{$eventsOwner[$i]->title}}" :is-creator="true" :id="{{$eventsOwner[$i]->id}}">
                        <template slot="descr">
                        {{$eventsOwner[$i]->description}}
                        </template>
                        <template slot="eventtype">
                            {{$eventsOwner[$i]->type}}
                        </template>
                        <template slot="lessontype">
                            {{$eventsOwner[$i]->course}}
                        </template>
                        <template slot="date">
                            {{$eventsOwner[$i]->start}}
                        </template>
                        <template slot="creator">
                            {{$eventsOwner[$i]->creator}}
                        </template>
                    </termin-box>

                    <br>
                @endfor
            </div>
            <div class="column">
                <p class="subtitle">Geteilte:</p>
                @for ($i = 0; $i < count($eventsMember); $i++)

                    <termin-box title="{{$eventsMember[$i]["event"]->title}}" :id="{{$eventsMember[$i]["event"]->id}}">
                        <template slot="descr">
                            {{$eventsMember[$i]["event"]->description}}
                        </template>
                        <template slot="eventtype">
                            {{$eventsMember[$i]["event"]->type}}
                        </template>
                        <template slot="lessontype">
                            {{$eventsMember[$i]["event"]->course}}
                        </template>
                        <template slot="date">
                            {{$eventsMember[$i]["event"]->start}}
                        </template>
                        <template slot="creator">
                            {{$eventsMember[$i]["event"]->creator}}
                        </template>
                    </termin-box>
                    <br>
                @endfor
            </div>



            </div>
        </div>

    </div>
@endsection