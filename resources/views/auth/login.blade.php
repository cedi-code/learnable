@extends('layouts.app')

@section('content')
    <div class="section">
        <main>
            <center>
                <div class="section"></div>
                <h5 class="secondary-text">Melde dich an bei Learnable</h5>
                <div class="section"></div>
                <div class="container">
                    <div class="z-depth-1 grey lighten-5 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                        <form class="col s12" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class='row'>
                                <div class='col s12'>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='input-field primary-input-field col s12'>
                                    <input class='validate black-text' type='email' name='email' id='email' value="{{old('email')}}" />
                                    <label for='email'>Enter your email</label>
                                </div>
                            </div>

                            <div class='row'>
                                <div class='input-field primary-input-field col s12'>
                                    <input class='validate black-text' type='password' name='password' id='password' />
                                    <label for='password'>Enter your password</label>
                                </div>
                                <label style='float: right;'>
                                    <a class='primary-text' href="{{ route('password.request') }}"><b>Forgot Password?</b></a>
                                </label>
                            </div>

                            <br />
                            <center>
                                <div class='row'>
                                    <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect secondary-color'>Login</button>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </center>
        </main>
    </div>

@endsection
