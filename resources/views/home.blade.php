@extends('layouts.app')

@section('content')
<div class="container">
            <user-tile @if(Request::get('pw')) :change-pw="true" @endif>

                <template slot="title">{{ Auth::user()->username }} </template>
                <template slot="under-title">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</template>
            </user-tile>
            <article class="tile is-child notification is-success">
                    <div class="content">
                        <p class="title">Termine</p>
                        <p class="subtitle">With even more content</p>
                        <div class="content">


                            @for ($i = 0; $i < count($events); $i++)

                                <termin-box title="{{$events[$i]["event"]["attributes"]["title"]}}" @if ($events[$i]["event"]["attributes"]["creator"] == $id) :is-creator="true" :id="{{$events[$i]["event"]["attributes"]["id"]}}" @endif>
                                    <template slot="descr">{{$events[$i]["event"]["attributes"]["description"]}}   </template>
                                </termin-box>
                                <br>
                            @endfor
                        </div>
                    </div>
                </article>
                <article class="tile is-child notification is-danger">
                <p class="title">Stundenplan</p>
                <p class="subtitle">Heute ist der {{$time}}</p>
                <div class="content">

                    <div class="tile is-ancestor">

                            <div class="columns is-mobile">
                                @for ($i = 0; $i < sizeof($weeks); $i++)
                                <div class="column is-narrow">
                                    @for($d = 0; $d < sizeof($weeks[$i]); $d++)
                                        <div class="box lesson @if($weeks[$i][$d]["duration"] == 2) duration2 @else duration1 @endif">
                                            <p class="title is-5">{{$weeks[$i][$d]["course"]}}</p>
                                            <p class="subtitle"></p>
                                        </div>

                                    @endfor
                                </div>
                                @endfor
                            </div>



                    </div>
                </div>
            </article>

</div>
@endsection
