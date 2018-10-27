@extends('layouts.app')

@section('content')
<div class="container">
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-4">
            <user-tile @if(Request::get('pw')) :change-pw="true" @endif>

                <template slot="title">{{ Auth::user()->username }} </template>
                <template slot="under-title">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</template>
            </user-tile>
            <div class="tile is-parent">
                <article class="tile is-child notification is-success">
                    <div class="content">
                        <p class="title">Termine</p>
                        <p class="subtitle">With even more content</p>
                        <div class="content">




                            @for ($i = 0; $i < count($events); $i++)

                                <termin-box title="{{$events[$i]["event"]["attributes"]["title"]}}" @if ($events[$i]["event"]["attributes"]["creator"] == $id) :is-creator="true" @endif>
                                    <template slot="descr">{{$events[$i]["event"]["attributes"]["description"]}}   </template>
                                </termin-box>
                                <br>
                            @endfor


                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="tile is-parent">

            <article class="tile is-child notification is-danger">
                <p class="title">Stundenplan</p>
                <p class="subtitle">Heute ist der {{$time}}</p>
                <div class="content">
                    <div class="tile is-ancestor">
                        @for ($i = 0; $i < 5; $i++)
                        <div class="tile is-vertical is-1.5">
                            <div class="tile">
                                <div class="tile is-parent is-vertical">
                                    <article class="tile is-child notification is-primary">
                                        <p class="title">Vertical...</p>
                                        <p class="subtitle">Top tile</p>

                                    </article>
                                    <article class="tile is-child notification is-warning">
                                        <p class="title">...tiles</p>
                                        <p class="subtitle">Bottom tile</p>
                                    </article>

                                </div>
                            </div>
                        </div>
                        @endfor


                    </div>
                </div>
            </article>
        </div>

    </div>
</div>
@endsection
