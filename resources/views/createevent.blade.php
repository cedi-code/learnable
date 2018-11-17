@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="panel-heading">Create Event</div>

        <div class="notification">
            <form class="form-horizontal" method="POST" action="/events/create">
                {{ csrf_field() }}


                <b-field label="Typ">
                    <b-select name="type" placeholder="Select a type" value="{{old('type')}}" expanded required>
                        @foreach ($types as $key=>$type)
                            <option value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach
                    </b-select>
                </b-field>

                <div class="form-group{{ $errors->has('lesson') ? ' has-error' : '' }}">
                    <lesson-picker></lesson-picker>

                </div>

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <b-field label="Title"
                             type="{{ $errors->has('title') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('title') ? $errors->first('title') : '' }}"

                    >
                        <b-input maxlength="40" id="title" placeholder="Prüfung" type="text" name="title" value="{{old('title')}}" required ></b-input>
                    </b-field>

                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <b-field label="Description"
                             type="{{ $errors->has('description') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('description') ? $errors->first('description') : '' }}">
                        <b-input maxlength="255" name="description" type="textarea" value="{{old('description')}}"></b-input>
                    </b-field>
                </div>

                <tag-user :users="{{collect($users)  }}" :tags="{{collect([])  }}" ></tag-user>


                <br>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="button is-primary">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection