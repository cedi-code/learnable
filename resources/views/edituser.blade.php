@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 5rem">

        <div class="panel-heading">Change User: {{ $user->first_name  }} {{ $user->last_name}}</div>

        <div class="notification">
            <form class="form-horizontal" method="POST" action="{{$user->id}}">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $user->id }}">

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <b-field label="Username"
                             type="{{ $errors->has('username') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('username') ? $errors->first('first_name') : '' }}"

                    >
                        <b-input id="username" placeholder="s100" type="text" name="username" value="{{ $user->username }}" required autofocus></b-input>
                    </b-field>

                </div>

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <b-field label="First Name"
                             type="{{ $errors->has('first_name') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}"

                    >
                        <b-input id="first_name" placeholder="max" type="text" name="first_name" value="{{ $user->first_name }}" required ></b-input>
                    </b-field>

                </div>

                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <b-field label="First Name"
                             type="{{ $errors->has('last_name') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}"

                    >
                        <b-input id="last_name" placeholder="mustermann" type="text" name="last_name" value="{{ $user->last_name }}" required ></b-input>
                    </b-field>

                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <!-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> -->
                    <b-field label="E-Mail Adress"
                             type="{{ $errors->has('email') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('email') ? $errors->first('email') : '' }}"

                    >
                        <b-input placeholder="example@bwdbern.ch" id="email" name="email" value="{{ $user->email }}" type="email" required></b-input>
                    </b-field>
                </div>


                <br>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="button is-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection