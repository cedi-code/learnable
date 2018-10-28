@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="panel-heading">Change Event: {{ $event->title }}</div>

        <div class="notification">
            <form class="form-horizontal" method="POST" action="/events/edit/{{$event->id}}">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $event->id }}">

                <b-field label="Typ">
                    <b-select name="type" placeholder="Select a type" value="{{$event->type}}" expanded required>
                        @foreach ($types as $key=>$type)
                            <option value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach
                    </b-select>
                </b-field>

                <div class="form-group{{ $errors->has('lesson') ? ' has-error' : '' }}">
                    <b-field label="Lesson"
                             type="{{ $errors->has('lesson') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('lesson') ? $errors->first('lesson') : '' }}"

                    >
                        <b-input id="lesson" placeholder="1" type="text" name="lesson" value="{{$event->lesson}}" required  readonly></b-input>
                    </b-field>

                </div>

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <b-field label="Title"
                             type="{{ $errors->has('title') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('title') ? $errors->first('title') : '' }}"

                    >
                        <b-input maxlength="40" id="title" placeholder="Prüfung" type="text" name="title" value="{{$event->title}}" required ></b-input>
                    </b-field>

                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <b-field label="Description"
                             type="{{ $errors->has('description') ? ' is-danger' : '' }}"
                             message="{{ $errors->has('description') ? $errors->first('description') : '' }}">
                        <b-input maxlength="255" name="description" type="textarea" value="{{$event->description}}"></b-input>
                    </b-field>
                </div>

                <tag-user :users="{{collect($users)  }}" :tags="{{collect($members)  }}"></tag-user>

                <!-- <b-collapse class="panel" :open="false" >
                    <div slot="trigger" class="panel-heading">
                        <strong>Mitglieder</strong>
                    </div>
                    <div class="panel-block">
                        <group-box  :content="{{collect($members)  }}" ></group-box>
                    </div>
                </b-collapse> -->

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