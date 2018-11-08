@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="notification">
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
                                <p class="subtitle"></p>
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


@endsection