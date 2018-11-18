@extends('layouts.app')

@section('content')

        <div class="notification has-background-primary lessonBox">
            <article class="media w100" >
            <figure class="media-left">
                <a href="/lessons/{{$number-1}}">
                    <button class="button is-dark">
                        <b-icon pack="fas" icon="arrow-left"></b-icon>
                        <span>Woche {{$number-1}}</span>
                    </button>
                </a>
            </figure>
                <div class="media-content">
                </div>
            <figure class="media-right">
                <a  href="/lessons/{{$number+1}}">
                    <button class="button is-dark">
                        <b-icon pack="fas" icon="arrow-right"></b-icon>
                        <span>Woche {{$number+1}}</span>
                    </button>
                </a>
            </figure>
            </article>


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


@endsection