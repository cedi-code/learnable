@extends('layouts.app')

@section('content')
<div class="columns is-gapless">
    <div class="column is-one-third">
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

                            <b-notification :closable="false" type="is-light" class="color: #250F4F">
                                <h3 class="subtitle">{{$events[$i]["event"]["attributes"]["title"]}}</h3>
                                {{$events[$i]["event"]["attributes"]["description"]}}
                            </b-notification>
                           <!-- <termin-box title="{{$events[$i]["event"]["attributes"]["title"]}}" @if ($events[$i]["event"]["attributes"]["creator"] == $id) :is-creator="true" :id="{{$events[$i]["event"]["attributes"]["id"]}}" @endif>
                                <template slot="descr">{{$events[$i]["event"]["attributes"]["description"]}}   </template>
                            </termin-box> -->
                            <br>
                        @endfor
                    </div>
                </div>
            </article>
    </div>
    <div class="column">
        <article class="notification has-background-primary lessonBox2">
            <p class="title">Stundenplan</p>
            <p class="subtitle">Heute ist der {{$time}}</p>
            <div class="content">

                <div class="tile is-ancestor">

                    <div class="columns is-mobile">
                        @for ($i = 0; $i < sizeof($weeks); $i++)
                            <div class="column is-narrow">
                                @php
                                    $d = 0;
                                    $gruuusig = 0;
                                @endphp
                                @for($dd = 0; $dd < 10; $dd++)


                                    @if($dd == $weeks[$i][$d]["start_lesson"])
                                        <div class="box lesson @if($weeks[$i][$d]["duration"] == 2) duration2 @else duration1 @endif">
                                            <p class="title is-5">{{$weeks[$i][$d]["course"]}}</p>

                                            @if( ! empty($weeks[$i][$d]["events"]))
                                                @for($le = 0; $le < sizeof($weeks[$i][$d]["events"]);$le++)
                                                    <b-tag>{{$weeks[$i][$d]["events"][$le]["title"]}}</b-tag>
                                                @endfor
                                            @endif

                                        </div>

                                        @php

                                            if(sizeof($weeks[$i])-1 > $d) {
                                                $d++;
                                            }
                                        @endphp

                                    @elseif($weeks[$i][$gruuusig]["start_lesson"]+ $weeks[$i][$gruuusig]["duration"] < $dd || $dd == 0)
                                        <div class="duration1">

                                        </div>
                                        @php

                                            if($gruuusig != $d) {
                                                $gruuusig = $d;
                                            }
                                        @endphp
                                    @endif


                                @endfor
                            </div>
                        @endfor
                    </div>



                </div>
            </div>
        </article>
    </div>
</div>
@endsection
