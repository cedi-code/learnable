@extends('layouts.app')

@section('content')

            <div class="container" style="padding-top: 5rem">
                <div class="panel-heading">Login</div>

                <div class="notification">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

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
                                             password-reveal required>
                                    </b-input>
                                </b-field>

                        </div>

                        <br>
                        <div class="form-group">
                                <div class="field">
                                    <b-checkbox {{ old('remember') ? 'checked' : '' }}>Remember me</b-checkbox>
                                </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">

                                <button type="submit" class="button is-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

@endsection
