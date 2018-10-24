@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 5rem">

        <div class="panel-heading">Register</div>

        <div class="notification">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <b-field label="Username"
                             type="{{ $errors->has('username') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('username') ? $errors->first('username') : '' }}"

                    >
                        <b-input id="username" placeholder="s100" type="text" name="username" value="{{ old('username') }}" required autofocus></b-input>
                    </b-field>

                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <!-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> -->
                    <b-field label="E-Mail Adress"
                             type="{{ $errors->has('email') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('email') ? $errors->first('email') : '' }}"

                    >
                        <b-input placeholder="example@bwdbern.ch" id="email" name="email" value="{{ old('email') }}" type="email" required></b-input>
                    </b-field>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <b-field label="Password"
                             type="{{ $errors->has('password') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('password') ?  $errors->first('password') : '' }}"
                    >
                        <b-input  id="password" name="password" type="password"
                                 required>
                        </b-input>
                    </b-field>
                </div>

                <div class="form-group">
                    <b-field label="Confirm Password"
                    >
                        <b-input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </b-input>
                    </b-field>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="button is-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection
