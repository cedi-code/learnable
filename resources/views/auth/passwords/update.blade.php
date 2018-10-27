
@extends('layouts.app')

@section('content')

    <div class="container" style="padding-top: 5rem">
        <div class="panel-heading">Passwort Ändern</div>

        <div class="notification">
            <form class="form-horizontal" method="POST" action="{{ route('updatepw') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <b-field label="Password"
                             type="{{ $errors->has('password') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('password') ?  $errors->first('password') : '' }}"
                    >
                        <b-input  id="password" name="password" type="password" minlength="6"
                                  password-reveal required>
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
                    <div class="col-md-8 col-md-offset-4">

                        <button type="submit" class="button is-primary">
                            Change
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection