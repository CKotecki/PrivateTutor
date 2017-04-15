@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Events
                        <span class="badge pull-right">@{{ usersInRoom.length }}</span>
                    </div>

                    <chat-log :event="events"></chat-log>
                    <chat-composer v-on:eventsSet="addEvent"></chat-composer>
                </div>
            </div>
        </div>
    </div>
@endsection
